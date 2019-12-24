<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function store() {
        var_dump('test');

        $token = auth()->attempt(request(['email', 'password']));
        var_dump($token);
        if(!$token) {
            return response()->json([
                'message' => 'MRS'
            ]);
        } else {
            return response()->json([
                'message' => 'Okey'
            ]);
        }
        
        
    }
}
