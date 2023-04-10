<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\Client;
use App\Models\Producer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
       if (! Gate::allows('register.profile')) {
            return redirect(route('product_type.create'));
        }

        return view('auth.register');
    }

    public function store(StoreRegisterRequest $request)
    {
        /*
         * Validation implicite
         */

        $user = new User();
        $user->fill($request->safe()->only(['first_name', 'last_name', 'email', 'phone', 'address', 'city', 'postal_code']));
        $user->password = Hash::make($request->password);
        $user->save();

        /*
         * Gestion de l'association polymorphe
         */
        if ($request->type == 1) {
            $client = Client::create(['id' => $user->id]);
        } else {
            $client = Producer::create(['id' => $user->id]);
        }

        /*
         * L'association est établie entre les entités
         * `type` est la fonction définie dans l'entité « enfant » relative à son « parent »
         */
        $client->type()->save($user);

        /*
         * Une fois le compte créé, le nouvel utilisateur est directement connecté.
         */
        Auth::login($user);

        /*
         * `intended` garde la trace de la page précédente qui a (éventuellement) conduit l'utilisateur sur la page de login de de création de compte.
         * L'utilisateur un fois inscrit sera automatiquement redirigé vers cette page (si elle existe).
         */
        return redirect()
            ->intended(route('producer.list'));
    }
}
