<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\LudothequeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/enonce', function () {
    return view('enonce.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/ludotheques/show/{id}', [LudothequeController::class, 'show'])->name('ludotheques.show');

Route::get('/ludotheques/rules/{id}', [LudothequeController::class, 'rules'])->name('ludotheques.rules');

Route::get('/ludotheques/create', [LudothequeController::class, 'create'])->name('ludotheques.create');

Route::post('/ludotheques/create', [LudothequeController::class, 'store'])->name('ludotheques.store')->middleware('auth');

Route::get('/ludotheques/{sort?}', [LudothequeController::class, 'index'])->name('ludotheques.index');

//Route::get('/ludotheques/random',[LudothequeController::Class,'random']) -> name('random');

Route::middleware(['auth'])->get('/dashboard', [\App\Http\Controllers\HomeController::class, 'cinqAleatoires'])->name('dashboard');

Route::get('/ludotheques/regle/{id}', [LudothequeController::class, 'regle']);

Route::get('commentaires/create/{id}', [CommentaireController::Class,'create'])->name('commentaire_create');

Route::post('commentaires/create', [CommentaireController::Class,'store'])->name('commentaire_store');


