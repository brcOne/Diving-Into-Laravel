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

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('votre_email@exemple.com', 'Destinataire')->subject('Nouveau message de contact');
        });

        return redirect('/')->with('success', 'Votre message a bien été envoyé.');
    }
}
