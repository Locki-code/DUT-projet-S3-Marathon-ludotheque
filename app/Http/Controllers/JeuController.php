<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class JeuController extends Controller
{
    /**
     * List All Jeu
     *
     * @return \Illuminate\View\View
     */
    public function index($filter = 'name', $sort = null)
    {

        if($filter === 'name'){
            if($sort || $sort === null){
                $jeux = Jeu::all()->sortBy('nom');
                $sort = 0;
            } else{
                $jeux = Jeu::all()->sortByDesc('nom');
                $sort = 1;
            }
        } else{

            $jeux = Jeu::all();
            $tabJeux = [];

            switch($filter){
                case 'theme':
                    foreach($jeux as $jeu){
                        if($jeu->theme->id == $sort){
                            $tabJeux[] = $jeu;
                        }
                    }
                    break;
                case 'editeur':
                    foreach($jeux as $jeu){
                        if($jeu->editeur->id == $sort){
                            $tabJeux[] = $jeu;
                        }
                    }
            }
            $jeux = $tabJeux;
        }

        return view('jeu.index', ['jeux' => $jeux, 'sort' => $sort, 'filter' => $filter]);
    }

    /**
     * Show Jeu.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $jeux = Jeu::all();

        $jeu = $jeux->find($id);

        return view('jeu.show', ['jeu' => $jeu]);
    }

    /**
     * Show rules .
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function rules($id)
    {
        $jeux = Jeu::all();

        $jeu = $jeux->find($id);

        return view('jeu.rules', ['jeu' => $jeu]);
    }

    /**
     * Show the form to create a new jeu.
     *
     * @return Response
     */
    public function create()
    {
        return view('jeu.create');
    }

    /**
     * Store a new Jeu.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nom' => 'required|unique:jeux',
                'description' => 'required',
                'theme' => 'required',
                'editeur' => 'required',
                'langue' => 'required',
                'age' => 'required',
                'image' => 'file|max:500000',
            ],
            [
                'nom.required' => 'Le nom est requis',
                'nom.unique' => 'Le nom doit être unique',
                'description.required' => 'La description est requise',
                'theme.required' => 'Le théme est requis',
                'editeur.required' => 'L\'editeur est requis',
                'langue.required' => 'la langues est requise',
                'age.required' => 'l\'age est requise',
                'image.file' => 'Poids max 500Ko',
            ]
        );

        $jeu = new Jeu();
        $jeu->nom = $request->nom;
        $jeu->description = $request->description;
        $jeu->theme_id = $request->theme;
        $jeu->user_id = Auth::user()->id;
        $jeu->editeur_id = $request->editeur;
        $jeu->url_media = 'https://picsum.photos/seed/'.$jeu->nom.'/200/200';
        $jeu->langue = $request->langue;
        $jeu->age = $request->age;
        $jeu->nombre_joueurs = $request->nombre_joueurs;
        $jeu->duree = $request->duree;
        $jeu->categorie = $request->categorie;

        if($request->file('image') !== null){

            $file = $request->file('image');


            $extension = $file->getClientOriginalExtension();

            // File upload location
            $location = public_path().'/imagesjeux/';

            $filename = uniqid().'.'.$extension;

            // Upload file
            $file->move($location, $filename);

            $jeu->url_media = '/imagesjeux/'.$filename;

        }


        $jeu->save();

        $jeu->mecaniques()->attach($request->avec_mecaniques);

        $jeu->save();


        return Redirect::route('jeu_index');
    }
}
