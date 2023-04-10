@extends('layout')

@section('title')
    Liste des types de produits
@endsection

@section('main')
   <section>
        <ul>
            @foreach($types as $t)
                <li>{{ $t->name }}</li>
            @endforeach
        </ul>
    </section>
@endsection