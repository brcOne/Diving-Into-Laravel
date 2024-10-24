<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('emails.contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::raw("Nom: {$data['name']}\nEmail: {$data['email']}\nMessage: {$data['message']}", function ($message) use ($data) {
            $message->to('amv.0280@gmail.com')
                    ->subject('Nouveau message de contact');
        });

        return redirect('/contact')->with('success', 'Votre message a bien été envoyé.');
    }
}
