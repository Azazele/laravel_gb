<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAuth as SocialAuthService;
use App\Models\SocialAuth;
use App\Models\User;
use Illuminate\Http\Request;

class VkAuthController extends Controller
{
    public function vkRedirect()
    {
        if(!\Auth::check()) {
            return \Socialite::with('vkontakte')->redirect();
        }
        return redirect('/');
    }

    public function vkAuth()
    {
        $user = \Socialite::driver('vkontakte')->user();
        $socialAuthService = new SocialAuthService;
        $socialAuthService->vk($user);
        return redirect('/');

    }
}
