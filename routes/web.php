<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketTypeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * ---------------------
 * Pages statiques
 * La route est seulement liée à une vue
 * ---------------------
 */
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/', function () {
    return view('about');
})->name('about');

/*
 * ---------------------
 * Pages publiques
 * ---------------------
 */

Route::prefix('product-type')->group(function () {
    Route::get('/', [ProductTypeController::class, 'index']);
    Route::get('/{product-type}', [ProductTypeController::class, 'show']);
    });

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show']);
});

Route::prefix('basket-type')->group(function () {
    Route::get('/', [BasketTypeController::class, 'index']);
    Route::get('/{basket-type}', [BasketTypeController::class, 'show']);
});

Route::prefix('producer')->group(function () {
    Route::get('/', [ProducerController::class, 'index'])
        ->name('producer.list');
    Route::get('/{producer}', [ProducerController::class, 'show'])
        ->name('producer.show');
    });

Route::prefix('client')->group(function () {
    Route::get('/', [ClientController::class, 'index'])
        ->name('client.list');
    Route::get('/{client}', [ClientController::class, 'show'])
        ->name('client.show');
});

/*
 * Routes pour la création de panier
 * Deux syntaxes différentes pour la gestion du droit d'accès
 * 1. avec la méthode `middleware`
 * 2. avec la méthode (utilitaire) `can`
 * Les deux se réfèrent au `Gate` défini dans la classe `AuthServiceProvider`
 */
Route::get('/basket/new', [BasketController::class, 'create'])
    ->name('basket.create')
    ->middleware('auth', 'can:create.basket');
Route::post('/basket', [BasketController::class, 'store'])
    ->name('basket.post')
    ->can('create.basket');

Route::get('/product-type/new', [ProductTypeController::class, 'create'])
    ->name('product_type.create');
Route::post('/product-type', [ProductTypeController::class, 'store'])
    ->name('product_type.post');

/*
 * ---------------------
 * Authentification
 * ---------------------
 */
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.post');


Route::get('/login', [LoginController::class, 'login'])
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login.post');
Route::get('/logout', [LogoutController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

/*
 * ---------------------
 * Authentification multi-rôle
 * ---------------------
 */

//Route::get('/producer/login', [ProducerLoginController::class,'@showLoginForm'])
//    ->name('producer.login');
//Route::post('/producer/login', [ProducerLoginController::class, 'login'])
//    ->name('producer.login.post');
//Route::post('/producer/logout', [ProducerLoginController::class, 'logout'])
//    ->name('producer.logout');
////Admin Home page after login
///
//Route::group(['middleware'=>'producer'], function() {
//    Route::get('/producer/home', [HomeController::class, 'index'])->name('producer.home');
//});