<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Policies\UserPolicy;

class UserController extends Controller
{

    function profil()
    {
        return view('user.profil');
    }

    function create_achat()
    {
        return view('user.create_achat');
    }

    function achatStore(Request $request)
    {
        Log::info("Avant validate" . $request);
        $request->validate(
            [
                'jeu_id' => 'required',
                'prix' => 'nullable|numeric',
                'lieu' => 'nullable',
                'date_achat' => 'date|required'
            ],
            [
                'jeu_id.required' => 'Le choix du jeu est requis',
                'prix.numeric' => 'La note doit être numérique',
                'date_achat.date' => 'Le format de la date est incorrect',
                'date_achat.required' => 'La date est obligatoire'
            ]
        );
        Log::info($request);
        $user = Auth::user();
        $user->ludo_perso()->attach($request->jeu_id, ['prix' => $request->prix, 'date_achat' => $request->date_achat, 'lieu' => $request->lieu]);
        $user->save();
        return redirect()->route('user.profil');
    }

    function affiche_achat($id)
    {
        $user_id = Auth::user()->id;
        $achat = DB::table('achats')
            ->join('jeux', 'jeux.id', '=', 'jeu_id')
            ->select('jeux.*')
            ->where('achats.user_id', '=', $user_id)
            ->where('jeu_id', '=', $id)
            ->get();

        return view('user.affiche_achat', ['user' => $user_id, 'achat' => $achat]);
    }

    function supprimeAchat(Request $request,$id) {
        if ($request->delete == 'valide') {
            $user = Auth::user();
            $achat = DB::table('achats')
                ->join('jeux', 'jeux.id', '=', 'jeu_id')
                ->select('jeux.*')
                ->where('achats.jeu_id', '=', $id)
                ->where('jeu_id', '=', $id)
                ->get();
            foreach ($achat as $ach)
                $ach -> delete();
        }
        return redirect()->route('user.profil');
    }
}
