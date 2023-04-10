@extends('layout')

@section('title')
    Profil du producteur : {{ $producer->type->first_name.' '.$producer->type->last_name }}
@endsection

@section('main')
   <section class="profile">
       <header>
           <h2>Profil Client</h2>
       </header>
       <section class="personal">
           <h3>{{ $producer->type->first_name.' '.$producer->type->last_name }}</h3>
           <p>Email : {{ $producer->type->email }}</p>
           <p>Téléphone : {{ $producer->type->phone }}</p>
           <p>Adresse : {{ $producer->type->address }}</p>
           <p>ville : {{ $producer->type->postal_code.' — '.$producer->type->city }}</p>
           @foreach($producer->basketTypes as $type)
               <article>
                   <h3>Type de panier : {{ $type->name }}</h3>
                   <p>Disponible en {{ $type->season }}</p>
                   <p>Contient :</p>
                   <ul>
                       @foreach($type->productTypes as $productType)
                           <li>{{ $productType->pivot->quantity }} {{ $productType->name }}</li>
                       @endforeach
                   </ul>
               </article>
           @endforeach
       </section>
    </section>
@endsection
