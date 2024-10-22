@extends('layouts.app')
@section('content')
<h2>Contact us</h2>
<form method="POST" action="{{ route('contact.create') }}">
    @csrf
    <div>
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="message">Message :</label>
        <textarea name="message" id="message"></textarea>
    </div>
    <button type="submit">Envoyer</button>
</form>
@endsection