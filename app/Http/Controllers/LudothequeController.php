<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Mecanique;
use App\Models\Theme;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\User;
use App\Services\JeuxInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Achat;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class LudothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($sort = null, Request $request) {
        $jeuByEditeur=null;
        if($request -> has('editeur_id'))
            $jeuByEditeur=$request->editeur_id;
        $editeurs=Editeur::all();

        $jeuByTheme=null;
        if($request -> has('theme_id'))
            $jeuByTheme=$request->theme_id;
        $themes=Theme::all();

        $jeuByMecanique=null;
        if($request -> has('mecanique_id'))
            $jeuByMecanique=$request->mecanique_id;
        $mecaniques=Mecanique::all();

        $filter = null;
        if($sort !== null){
            if($sort){
                $ludotheque = Jeu::All()->sortBy('nom');
            } else{
                $ludotheque = Jeu::All()->sortByDesc('nom');
            }
            $sort = !$sort;
            $filter = true;
        } else{

            if($jeuByEditeur==null) {
                $ludotheque = Jeu::All();
            }
            else {
                $ludotheque = Editeur::find($jeuByEditeur)->jeux;
            }

            if($jeuByTheme==null) {
                $ludotheque = Jeu::All();
            }
            else {
                $ludotheque = Theme::find($jeuByTheme)->jeux;
            }

            if($jeuByMecanique==null) {
                $ludotheque = Jeu::All();
            }
            else {
                $ludotheque = Mecanique::find($jeuByMecanique)->jeux;
            }
            $sort = true;
        }

        return view('ludotheques.index', ['ludotheques' => $ludotheque, 'sort' => intval($sort), 'filter' => $filter, 'editeurs' => $editeurs, 'themes' => $themes, 'mecaniques' => $mecaniques]);
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
                'regle'  => 'required',
                'langue'  => 'required',
                'url_media'  => 'required',
                'age'  => 'required',
                'nombre_joueurs' => 'required',
                'categorie' => 'required',
                'duree'  => 'required',
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
        $ludotheque->regle = $request->regle;
        $ludotheque->langue = $request->langue;
        $ludotheque->url_media = $request->url_media;
        $ludotheque->age = $request->age;
        $ludotheque->nombre_joueurs = $request->nombre_joueurs;
        $ludotheque->categorie = $request->categorie;
        $ludotheque->duree = $request->duree;
        $ludotheque->theme_id = $request->theme_id;
        $ludotheque->editeur_id = $request->editeur_id;
        $editeurs=Editeur::all();
        $themes=Theme::all();

        // insertion de l'enregistrement dans la base de données
        $ludotheque->save();

        // redirection vers la page qui affiche la liste des tâches
        //return view('ludotheques.store',['editeurs' => $editeurs],['themes' => $themes]);
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
        $commentaires = DB::table('commentaires')
            ->select()
            ->where('jeu_id','=',$id)
            ->orderBy('date_com', 'desc')
            ->get();

        $jeuxInformation = new JeuxInformation;
        $jeuxInformation->setJeu($ludotheque);
        $jeuxInformation->calculate();

        return view('ludotheques.show', ['ludotheque' => $ludotheque, 'action' => $action,'commentaires'=>$commentaires,'jeuxInformation' => $jeuxInformation]);
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
                'regle'  => 'required',
                'langue'  => 'required',
                'url_media'  => 'required',
                'age'  => 'required',
                'nombre_joueurs' => 'required',
                'categorie' => 'required',
                'duree'  => 'required',
                'theme_id' => 'required',
                'editeur_id' => 'required',
            ]
        );

        $ludotheque->nom = $request->nom;
        $ludotheque->description = $request->description;
        $ludotheque->regle = $request->regle;
        $ludotheque->langue = $request->langue;
        $ludotheque->url_media = $request->url_media;
        $ludotheque->age = $request->age;
        $ludotheque->nombre_joueurs = $request->nombre_joueurs;
        $ludotheque->categorie = $request->categorie;
        $ludotheque->duree = $request->duree;
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
        $jeux = Jeu::all();
        $jeu = $jeux->find($id);
        return view('ludotheques.regle', ['ludotheque' => $jeu]);
    }


}


