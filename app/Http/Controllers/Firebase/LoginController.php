<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $userProperties = [
            'email' => $request->input('email'),
            'emailVerified' => false,
            'password' => $request->input('password'),
            'displayName' => $request->input('name'),
            'disabled' => false,
        ];
        // $reg = Firebase::auth()->createUserWithEmailAndPassword($email, $password);
        $reg = Firebase::auth()->createUser($userProperties);
        if ($reg) {
            return to_route('welcome')->with('msg', 'Successfully registred');
        } else {
            return to_route('welcome')->with('msg', 'failed');
        }

    }

    public function doLogin(Request $request)
    {
        $fir = Firebase::auth();
        $email = $request->input('email');
        $password = $request->input('password');
        $login = $fir->signInWithEmailAndPassword($email, $password);
        $data = $login->data();
        if ($login) {
            return to_route('welcome')->with('msg', 'Successfully login');
        } else {
            $data = $login->data();

            return to_route('welcome')->with('msg', 'failed');
        }
    }
}
