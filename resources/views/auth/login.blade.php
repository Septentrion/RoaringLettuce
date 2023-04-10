@extends('layout')

@section('title')
    Connexion
@endsection

@section('errors')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

@section('main')
<form class="" method="POST" action="{{ route('login.post') }}">
    @csrf

    <div class="form-group">
        <label for="email" class="">E-Mail</label>
        <div class="">
            <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="">Password</label>
        <div class="">
            <input id="password" type="password" class="" name="password" required>
        </div>
    </div>

    <div class="form-group">
        <div class="">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="">
            <button type="submit" class="btn">
                Login
            </button>
        </div>
    </div>
</form>
@endsection