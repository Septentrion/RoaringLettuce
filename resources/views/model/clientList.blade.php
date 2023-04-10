@extends('layout')

@section('title')
    Liste des clients
@endsection

@section('main')
   <section>
        <ul>
            @foreach($clients as $c)
                {{--
                    Pour afficher le nom du client, il faut passer par l'association polymorphe.
                    `type` est une propriété virtuelle qui correspond à la méthode `type()` de la classe
                --}}
                <li>
                    <a href="{{ route('client.show', ['client' => $c->id]) }}">{{ $c->type->first_name.' '.$c->type->last_name }}</a>
                </li>
            @endforeach
        </ul>
    </section>
@endsection