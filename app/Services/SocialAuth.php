<?php


namespace App\Services;


use App\Models\User;
use App\Models\SocialAuth as SocialAuthModel;

class SocialAuth
{
    public function vk($user)
    {
        $socialUserCheck = SocialAuthModel::where('id_in_social', $user->getId())->first();

        if ($socialUserCheck === null) { // если пользователь ранее не заходил через соц. сеть
            $userCheck = User::where('email', $user->getEmail())->first();
            if ($userCheck === null) { // если пользователь еще не зарегистрирован
                $userData = [
                    'id_in_social' => $user->getId(),
                    'email' => $user->getEmail(),
                    'name'=> $user->getName(),
                    'social_slug' => 'vkontakte'
                ];
            } else { // если пользователь уже зарегистрирован
                $userData = [
                    'id_user' => $userCheck->id,
                    'id_in_social' => $user->getId(),
                    'email' => $user->getEmail(),
                    'name'=> $user->getName(),
                    'social_slug' => 'vkontakte'
                ];
                SocialAuthModel::update($userData);
                \Auth::login($userCheck);
            }

            $newUser = new User();
            $newUserData = [
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => ''
            ];
            $newUser->fill($newUserData);
            $newUser->save();

            $userData['id_user'] = $newUser->id;
            SocialAuthModel::create($userData);

            \Auth::login($newUser);
        } else { // если пользователь уже заходил через соц. сеть
            $user = User::find($socialUserCheck->id_user);
            \Auth::login($user);
        }
    }
}
