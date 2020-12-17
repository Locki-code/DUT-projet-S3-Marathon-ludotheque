<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Smartphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Policies\CommentairePolicy;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('commentaires.create',['jeu_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'commentaire' => 'required',
                'note'=> 'required',
            ]
        );

        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $commentaire = new Commentaire();

        $user_id = Auth::user()->id;
        $commentaire->user_id = $user_id;
        $commentaire->commentaire = $request->commentaire;
        $commentaire->note = $request->note;
        $commentaire->jeu_id = $request->jeu_id;

        // insertion de l'enregistrement dans la base de données
        $commentaire->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/ludotheques');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Commentaire $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Commentaire $commentaire) {
        $this->authorize('delete', $commentaire);
        if ($request->delete == 'valide') {
            $commentaire->delete();
            return redirect()->route('smartphones.index');
        }
        return redirect()->route('smartphones.show', $smartphone->id);
    }

    public function afficheCommentaire($id) {
        $user = Auth::user();
        $commentaires = Commentaire::find($id);
        return view('commentaires.afficheCommentaire',['commentaire'=>$commentaires]);
    }

    public function supprimeCommentaire(Request $request,$id) {
        if($request->delete == 'valide') {
            $user = Auth::user()->id;
            $commentaire = Commentaire::find($id);
            if($user === $commentaire->user_id )
                $commentaire->delete();
        }

        return redirect()->route('ludotheques.index');
    }
}
