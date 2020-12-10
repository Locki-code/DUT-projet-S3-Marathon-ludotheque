<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentaireController extends Controller {
    function create($jeu_id) {
        $jeu = Jeu::findOrFail($jeu_id);
        Log::info(sprintf("Create comment for jeu id %d name %s", $jeu->id, $jeu->nom));
        return view('commentaires.create', ['jeu' => $jeu]);
    }

    function store(Request $request) {

        $request->validate(
            [
                'commentaire' => 'required',
                'note' => 'nullable|numeric|between:0,5',
            ],
            [
                'commentaire.required' => 'Le commentaire est requis',
                'note.numeric' => 'La note doit être numérique',
                'note.between' => 'La note doit être comprise entre 0 et 5',
            ]
        );

        $commentaire = new Commentaire();
        $commentaire->commentaire = $request->commentaire;
        $commentaire->note = $request->get('note', null);
        $commentaire->jeu_id = $request->jeu_id;
        $commentaire->user_id = Auth::user()->id;
        $commentaire->save();

        return redirect()->route('jeu_show', ['id' => $request->jeu_id]);

    }
}
