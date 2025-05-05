<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        $token = $user->createToken('default-token')->plainTextToken;

        if ($request->wantsJson()) {
            return response()->json([
                'token' => $token,
                'user' => $user,
            ]);
        }
        session()->flash('auth_token', $token);
        return redirect()->intended('/dashboard')->with('token',$token);
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();
        Auth::guard('web')->logout();
        $user->tokens->each(function ($token) {
            $token->delete(); 
        });
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
