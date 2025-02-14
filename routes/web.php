<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\TrajetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Home');
});
Route::get('/rechercher-trajets', [TrajetController::class, 'afficherFormulaireRecherche']);
Route::get('/traiter-recherche-trajets', [TrajetController::class, 'rechercherVoyages']);



//cart



Route::post('/cart/add', [CartController::class,'addToCart'])->name('cart.add');

Route::get('cart', [CartController::class,'cart']);

Route::patch('update-cart', [CartController::class,'updatec']);

Route::delete('remove-from-cart', [CartController::class,'removec']);


Route::get('/saisie-voyageurs', [CartController::class,'saisievoyageurs']);

Route::post('/valider', [CartController::class,'valider'])->name('valider');




