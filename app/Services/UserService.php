<?php

namespace App\Services;


use App\Models\Jeu;
use Illuminate\Support\Facades\Auth;

class UserService {
    static function jeuxNotInLudo() {
        return Jeu::whereNotIn('id', Auth::user()->ludo_perso()->pluck('id'))->get();
    }


}
