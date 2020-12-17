<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Services\JeuxInformation;
use Illuminate\Http\Request;
use App\Models\Jeu;

class HomeController extends Controller
{
    function carte(){
        $jeu = Jeu::find(1);
        return view('carte', ['jeu'=>$jeu]);
    }

    /*function best($nb){
        $avg=[];
        foreach(Commentaire::all() as $jeu){
            $jeuNote=new JeuxInformation();
            $jeuNote = $jeu->calculate();
            $avg[]=['avg'=>$jeuNote->getAverage(),'id'=>$jeu->jeu_id];
        }
        krsort($avg,'avg');
        $res = array_slice($avg,0,$nb);
        return $res;
    }*/

    function cinqAleatoiresEtMeilleurs() {
        $ludotheque_ids = Jeu::all()->pluck('id');
        $faker = \Faker\Factory::create();
        $ids = $faker->randomElements($ludotheque_ids->toArray(), 5);
        $ludotheques = [];
        foreach ($ids as $id) {
            $ludotheques[] = Jeu::find($id);
        }

        $avg=[];
        foreach(Jeu::all() as $jeu){
            $jeuNote=new JeuxInformation();
            $jeuNote->setJeu($jeu);
            $jeuNote->calculate();
            $avg[$jeu->id]=$jeuNote->getAverage();
        }
        arsort($avg);
        array_slice($avg,0,5);
        $x=5;
        $y=0;
        $best = [];
        foreach ($avg as $key => $avg) {
            while($y<$x){
                $best[] = Jeu::find($key);
                $y++;
            }
        }
        //dd($best);
        //die();
        return view('aleatoire', ['ludotheques' => $ludotheques,'cinqMeilleurs'=>$best]);
    }

}
