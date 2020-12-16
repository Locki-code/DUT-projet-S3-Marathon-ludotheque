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

    function cinqAleatoires() {
        $ludotheque_ids = Jeu::all()->pluck('id');
        $faker = \Faker\Factory::create();
        $ids = $faker->randomElements($ludotheque_ids->toArray(), 5);
        $ludotheques = [];
        foreach ($ids as $id) {
            $ludotheques[] = Jeu::find($id);
        }
        return view('aleatoire', ['ludotheques' => $ludotheques]);
    }

}
