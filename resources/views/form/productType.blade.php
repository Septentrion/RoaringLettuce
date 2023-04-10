@extends('layout')

@section('title')
    Ajout d'un type de produit
@endsection

@section('errors')
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
@endsection

@section('main')
<form action="{{ route('product_type.post') }}" method="POST">
    @csrf
    @method('post')
    <div>
        <label for="name" autofocus>Nom du type de produit</label>
        <input type="text" name="name" size="32" value="{{ old('name') }}" />
    </div>
    <div>
        <label for="description">Description du type de produit</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
    </div>
    <div>
        <input type="submit" value="Ajouter" />
    </div>
</form>
@endsection