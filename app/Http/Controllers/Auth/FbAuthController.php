<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAuth as SocialAuthService;
use App\Models\SocialAuth;
use App\Models\User;
use Illuminate\Http\Request;

class FbAuthController extends Controller
{
    public function fbRedirect()
    {
        if(!\Auth::check()) {
            return \Socialite::with('facebook')->redirect();
        }
        return redirect('/');
    }

    public function fbAuth()
    {
        $user = \Socialite::driver('facebook')->user();
        dump($user);
        /*$socialAuthService = new SocialAuthService;
        $socialAuthService->fb($user);
        return redirect('/');*/

    }
}
