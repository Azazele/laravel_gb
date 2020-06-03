<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'metaTitle' => 'Все профили - Админ панель',
            'profiles' => User::query()->paginate(10)
        ];
        return view('admin.profiles', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        $data = [
            'metaTitle' => 'Редактировать профиль - Админ панель',
            'profile' => $profile
        ];

        return view('admin.editProfile',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {
        $profile->fill($request->all());
        $profile->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $profile)
    {
        $profile->delete();
        return back();
    }
}
