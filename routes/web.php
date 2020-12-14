<?php

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
})->name('home');

Route::middleware(['auth'])->get('/dashboard', [HomeController::class, 'cinqAleatoires'])->name('dashboard');

//Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/jeux/show/{id}', [JeuController::class, 'show'])->name('jeu_show');

Route::get('/jeux/rules/{id}', [JeuController::class, 'rules'])->name('jeu_rules');

Route::get('/jeux/create', [JeuController::class, 'create'])->name('jeu_create');

Route::post('/jeux/create', [JeuController::class, 'store'])->name('jeu_store')->middleware('auth');

Route::get('/jeux/{filter?}/{sort?}', [JeuController::class, 'index'])
    ->where('filter', '[a-z]+')
    ->name('jeu_index');

Route::prefix('commentaires')->middleware('auth')->group(function () {
    Route::get('/create/{jeu_id}', [\App\Http\Controllers\CommentaireController::class, 'create'])
        ->where('jeu_id', '[0-9]+')
        ->name('commentaires.create');
    Route::post('/store', [\App\Http\Controllers\CommentaireController::class, 'store'])->name('commentaires.store');
});


Route::get('/enonce', function () {
    return view('enonce.index');
});

Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profil'])->name('users.profile');
    Route::get('/achat', [UserController::class, 'createAchat'])->name('users.achat');
    Route::post('/achat', [UserController::class, 'achatStore'])->name('users.achatStore');
    Route::get('/achat/supprime/{id}', [UserController::class, 'afficheAchat'])->name('users.afficheAchat');
    Route::delete('/achat/{id}', [UserController::class, 'supprimeAchat'])->name('users.supprimeAchat');
});
