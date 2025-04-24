<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\TwoFactorChallengeViewResponse;
use Illuminate\Contracts\Support\Responsable;

class TwoFactorChallengeResponse implements TwoFactorChallengeViewResponse
{
    public function toResponse($request)
    {
        return view('auth.two-factor-challenge');
    }
}
