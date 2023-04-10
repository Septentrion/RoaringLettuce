@extends('layout')

@section('title')
    Enregistrement
@endsection

@section('errors')
@if ($errors->any())
    <section>
        <h3>Erreurs</h3>
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </section>
@endif
@endsection

@section('main')
    <h2>Register</h2>

    <form action="{{ route('register.post') }}" method="POST" >
    @csrf
    <div>
        <label for="first_name">Prénom</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" autofocus />
    </div>
    <div>
        <label for="last_name">Prénom</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" autofocus />
    </div>
    <div>
        <label for="email">Courriel</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" />
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" value="{{ old('password') }}" />
    </div>
    <div>
        <label for="password_confirmation">Confirmation de Mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" />
    </div>
    <div>
        <label for="address">Adresse</label>
        <input type="text" name="address" id="address" value="{{ old('address') }}" />
    </div>
    <div>
        <label for="city">Ville</label>
        <input type="text" name="city" id="city" value="{{ old('city') }}" />
    </div>
    <div>
        <label for="postal_code">Code postal</label>
        <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" />
    </div>
    <div>
        <label for="phone">Téléphone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" />
    </div>
    <div>
        <label for="client">Client</label>
        <input type="radio" id="client" value="1" />
        <label for="producteur">Producteur</label>
        <input type="radio" id="producteur" value="2" />
    </div>
    <div>
        <input type="submit" name="submit" value="Envoyer" />
    </div>
</form>
@endsection