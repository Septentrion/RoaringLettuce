@extends('layout')

@section('title')
    Liste des types de producteurs
@endsection

@section('main')
   <section>
        <ul>
            @foreach($producers as $p)
                {{--
                    Pour afficher le nom du producteur, il faut passer par l'association polymorphe.
                    `type` est une propriété virtuelle qui correspond à la méthode `type()` de la classe
                --}}
                <li>
                    <a href="{{ route('producer.show', ['producer' => $p->id]) }}">{{ $p->type->first_name.' '.$p->type->last_name }}</a>
                </li>
            @endforeach
        </ul>
    </section>
@endsection