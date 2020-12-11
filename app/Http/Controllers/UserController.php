<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller {
    function profil() {
        return view('users.profile');
    }

    function createAchat() {
        return view('users.create_achat');
    }

    function achatStore(Request $request) {
        Log::info("Avant validate".$request);
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
        return redirect()->route('users.profile');
    }
}
