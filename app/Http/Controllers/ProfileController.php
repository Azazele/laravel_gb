<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $user = \Auth::user();
        return view('auth.profile', ['name' => $user->name]);
    }
}
