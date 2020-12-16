<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Ludotheque;

class LudothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index() {
        $ludotheques = Jeu::all();
        return view('ludotheques.index', ['ludotheques' => $ludotheques]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $themes = Theme::All();
        $editeurs = Editeur::All();

        return view('ludotheques.create', ['themes'=> $themes, 'editeurs' => $editeurs,]);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'theme_id' => 'required',
                'editeur_id' => 'required',
            ]
        );

        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $ludotheque = new Jeu;

        $user_id = Auth::user()->id;
        $ludotheque->user_id = $user_id;
        $ludotheque->nom = $request->nom;
        $ludotheque->description = $request->description;
        $ludotheque->theme_id = $request->theme_id;
        $ludotheque->editeur_id = $request->editeur_id;

        // insertion de l'enregistrement dans la base de données
        $ludotheque->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/ludotheques');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        $action = $request->query('action', 'show');
        $ludotheque = Jeu::find($id);
        return view('ludotheques.show', ['ludotheque' => $ludotheque, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $ludotheque = Jeu::find($id);
        return view('ludotheques.edit', ['ludotheque' => $ludotheque]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $ludotheque = Jeu::find($id);

        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'theme_id' => 'required',
                'editeur_id' => 'required',
            ]
        );
        $ludotheque->nom = $request->nom;
        $ludotheque->description = $request->description;
        $ludotheque->theme_id = $request->theme_id;
        $ludotheque->editeur_id = $request->editeur_id;

        $ludotheque->save();

        return redirect('/ludotheques');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        if ($request->delete == 'valider') {
            $ludotheque = Jeu::find($id);
            $ludotheque->delete();
        }
        return redirect()->route('ludotheques.index');
    }

    public function regle($id){
        $ludotheque = Jeu::find($id);
        return view('regle', ['ludotheque' => $ludotheque]);
    }
}
