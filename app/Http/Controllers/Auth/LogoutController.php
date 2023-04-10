<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function destroy(Request $request)
    {
        /*
         * Déconnexion de l'utilisateur
         */
        Auth::logout();

        /*
         * Nettoyage de la session après déconnexion
         */
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
