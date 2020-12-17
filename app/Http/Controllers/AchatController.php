<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\User;
use App\Models\Jeu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchatController extends Controller
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
        return view('achats.create',['jeu_id' => $id]);
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
                'date_achat' => 'required',
                'lieu'=> 'required',
                'prix'=> 'required',
            ]
        );

        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $achat = new Achat();

        $user_id = Auth::user()->id;
        $achat->user_id = $user_id;
        $achat->date_achat = $request->date_achat;
        $achat->lieu = $request->lieu;
        $achat->prix = $request->prix;
        $achat->jeu_id = $request->jeu_id;

        // insertion de l'enregistrement dans la base de données
        $achat->save();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Achat $achat)
    {
        $this->authorize('delete',$achat);

        if($request->delete == 'valide') {
            $achat->delete();
            return redirect()->route('ludotheques.index');
        }
        return redirect()->route('ludotheques.index');
    }
}
