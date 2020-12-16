<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeu;

class HomeController extends Controller
{
    function carte(){
        $jeu = Jeu::find(1);
        return view('carte', ['jeu'=>$jeu]);
    }
}
