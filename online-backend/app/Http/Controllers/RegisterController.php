<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request) {

        $user = new User();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->url = '';
        $user->role = 'USER';

        $user->save();

        auth()->login($user);

        
    }
}
