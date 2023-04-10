@extends('layout')

@section('title')
    Création d'un panier
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
    <form action="{{ route('basket.post') }}" method="POST">
        @csrf
        @method('post')
        <div>
            <label></label>
            <input type="text" name="reference" size="32" />
        </div>
        <div>
            <select name="basket_type">
                @foreach($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->reference }}</option>
                @endforeach
            </select>
        </div>
        <div>
            @foreach($products as $p)
                <label for="{{ $p->id }}">{{ $p->name }}</label>
                <input type="checkbox" name="products[]" id="{{ $p->id }}" value="{{ $p->id }}" />
            @endforeach
        </div>
        <div>
            <input type="submit" value="Ajouter" />
        </div>
    </form>
@endsection