<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        /** @var User $model */
        $model = User::query()
            ->where('email', $request->email)
            ->firstOrFail();

        if(!$model){
            return back()->with('error', 'Email is incorrect');
        }

        if (!Hash::check($request->get('password'), $model->password)) {
            return back()->with('error', 'Password is incorrect');
        }

//        Auth::guard('admin')->login($model);
        auth()->login($model);
        $request->session()->regenerate();

        return response()
            ->redirectToRoute('producer.list')
            ->with('success', 'Welcome ' . $model->name . '!');
    }
}
