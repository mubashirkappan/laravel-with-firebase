<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;

class LoginController extends Controller
{
    public $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
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
            'displayName' => $request->input('name') ? $request->input('name') : '',
            'disabled' => false,
        ];
        // $reg = Firebase::auth()->createUserWithEmailAndPassword($email, $password);
        $postRef = $this->database->getReference('users')->push($userProperties);
        $reg = Firebase::auth()->createUser($userProperties);
        if ($reg) {
            return to_route('users')->with('msg', 'Successfully registred');
        } else {
            return to_route('users')->with('msg', 'failed');
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
    public function list()
    {
        $reference = $this->database->getReference('users');

        $data = $reference->getValue();
        $numberOfData = $reference->getSnapshot()->numChildren();
        return view('users', compact('data', 'numberOfData'));

    }
    public function classList()
    {
        $reference = $this->database->getReference('classes');

        $data = $reference->getValue();
        $numberOfData = $reference->getSnapshot()->numChildren();

        return view('classes', compact('data', 'numberOfData'));
    }
    public function addClass()
    {
        $reference = $this->database->getReference('contacts');

        $data = $reference->getValue();
        return view('add_class',compact('data'));
    }
    public function doAddClass(Request $request)
    {
        $classData = [
            'class' => $request->input('className'),
            'contact' => $request->input('contact'),
        ];
        $postRef = $this->database->getReference('classes')->push($classData);
        return to_route('class.list')->with('msg', 'successfully added');


    }

}
