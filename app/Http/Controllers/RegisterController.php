<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request) {
        if (Auth::check()) {
            return redirect()->to(route('user.private'));
        }

        if(User::where('login', $request->login)->exists()) {
            return redirect()->to(route('user.registration'))->withErrors([
                'loginError' => 'User exists'
            ]);
        }

        $user = User::create($request);
        if($user){
            auth()->login($user);
            return redirect()->to(route('user.private'));
        }

        return redirect()->to(route('user.registration'))->withErrors([
            'formError' => 'Failed to register'
        ]);
    }
}
