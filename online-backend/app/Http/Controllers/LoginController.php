<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function store() {
        $token = auth()->attempt(request(['email', 'password']));
        if(!$token) {
            return response()->json([
                'message' => 'Podaci nisu validni'
            ], 400);
        } else {
            return response()->json([
                'message' => 'Uspesno ste se ulogoval',
            ]);
        }
        
        
    }
}
