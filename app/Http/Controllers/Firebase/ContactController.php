<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class ContactController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        dd('home');
    }

    public function home()
    {
        $reference = $this->database->getReference('contacts');

        $data = $reference->getValue();
        $numberOfData = $reference->getSnapshot()->numChildren();

        return view('contact', compact('data', 'numberOfData'));
    }

    public function edit($key)
    {
        $reference = $this->database->getReference('contacts')->getChild($key)->getValue();
        if ($reference) {
            return view('contact_edit', compact('reference', 'key'));
        } else {
            return to_route('welcome')->with('msg', 'Contact id is wrong');
        }
    }

    public function delete($key)
    {
        $postRef = $this->database->getReference("contacts/$key")->set('null');
        if ($postRef) {
            return to_route('welcome')->with('msg', 'successfully deleted');
        } else {
            return to_route('welcome')->with('msg', 'Contact id is wrong');
        }
    }

    public function view()
    {
        return view('contact_create');
    }

    public function store(Request $request)
    {
        $postData = [
            'fName' => $request->fName,
            'message' => $request->message,
            'email' => $request->email,
        ];
        $postRef = $this->database->getReference('contacts')->push($postData);

        return to_route('welcome')->with('msg', 'successfully added');
    }

    public function update(Request $request)
    {
        $postData = [
            'fName' => $request->fName,
            'message' => $request->message,
            'email' => $request->email,
        ];
        $postRef = $this->database->getReference("contacts/$request->id")->update($postData);
        if ($postRef) {
            return to_route('welcome')->with('msg', 'successfully updated');
        } else {
            return to_route('welcome')->with('msg', 'Contact id is wrong');
        }
    }
}
