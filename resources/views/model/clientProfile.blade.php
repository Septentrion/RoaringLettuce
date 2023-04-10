@extends('layout')

@section('title')
    Profil du client : {{ $client->type->first_name.' '.$client->type->last_name }}
@endsection

@section('main')
   <section class="profile">
       <header>
           <h2>Profil Client</h2>
       </header>
       <section class="personal">
           <h3>{{ $client->type->first_name.' '.$client->type->last_name }}</h3>
           <p>Email : {{ $client->type->email }}</p>
           <p>Téléphone : {{ $client->type->phone }}</p>
           <p>Adresse : {{ $client->type->address }}</p>
           <p>ville : {{ $client->type->postal_code.' — '.$client->type->city }}</p>
           @foreach($client->adhesions as $adh)
               <article>
                   <h3>Abonnement du {{ $adh->start_date->format('d m Y') }} au {{ $adh->end_date->format('d m Y') }}</h3>
                   <p class="basket-type">{{ $adh->basketType->name }} ({{-- $adh->basketType->producer->type->mast_name --}})</p>
               </article>
           @endforeach
       </section>
    </section>
@endsection
