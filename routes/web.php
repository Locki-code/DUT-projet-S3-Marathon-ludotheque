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

Route::resource('ludotheques', LudothequeController::Class);

Route::get('/carte',[\App\Http\Controllers\HomeController::class,'carte']);

Route::resource('ludotheques', LudothequeController::Class);

Route::get('/ludotheques/random',[LudothequeController::Class,'random']) -> name('random');

Route::get('commentaires/create/{id}', [CommentaireController::Class,'create'])->name('commentaire_create');

Route::post('commentaires/create', [CommentaireController::Class,'store'])->name('commentaire_store');


