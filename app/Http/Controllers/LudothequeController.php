<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Theme;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\User;
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
    public function index($sort = null) {
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
            $ludotheque = Jeu::All();
            $sort = true;
        }
        return view('ludotheques.index', ['ludotheques' => $ludotheque, 'sort' => intval($sort), 'filter' => $filter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $themes = Theme::All();
        $editeurs = Editeur::All();

        return view('ludotheques.create', ['themes'=> $themes, 'editeurs' => $editeurs]);
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

    /*
App\Models\Commentaire::where(function($query){
    $query->select('avg(note)','jeu_id')
        ->groupBy('jeu_id')
        ->having('avg(note)','>=',function ($quer){
            $quer->where('jeu_id',$ludotheque->id)
                ->avg('note');
        });
})->count()
*/

    public function show(Request $request, $id) {
        $action = $request->query('action', 'show');
        $ludotheque = Jeu::find($id);

        $commentaires = DB::table('commentaires')
            ->select()
            ->where('jeu_id','=',$id)
            ->get();
        $classement = Commentaire::select('avg(note)','jeu_id')->groupBy('jeu_id');

        return view('ludotheques.show', ['ludotheque' => $ludotheque, 'action' => $action,'commentaires'=>$commentaires]);
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
