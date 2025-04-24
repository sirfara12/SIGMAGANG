<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

class TwoFactorController extends Controller
{
    public function enable(Request $request)
    {
        $user = $request->user();
        $user->enableTwoFactorAuthentication();

        return redirect()->route('two-factor.index');
    }

    public function showChallenge(Request $request)
    {
        return view('auth.two-factor-challenge');
    }


public function verify(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $request->validate([
        'code' => 'required|numeric|digits:6',
    ]);

    $user = $request->user();

    if ($user->verifyTwoFactorAuthentication($request->input('code'))) {
        Log::info('Two-factor authentication passed', ['user_id' => $user->id]);
        return redirect()->intended();
    }

    Log::warning('Two-factor authentication failed', ['user_id' => $user->id]);
    return back()->withErrors(['code' => 'Invalid code']);
}

    
}
