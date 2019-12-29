<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request) {

        $termsAndConditional = $request->input('acceptedTerms');
        if (!$termsAndConditional) {
            return response()->json(['You must accept terms and conditionals'], 400);
        }

        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');

        if ($password != $confirmPassword) {
            return response()->json(['Password must match'], 400);
        }

        $user = new User();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->url = $request->input('url');
        $user->role = 'USER';
    
        try {
            $user->save();
        } catch (Exception $e) {
            return response()->json(['Email is already taken!'], 400);
        }

        auth()->login($user);
    }
}
