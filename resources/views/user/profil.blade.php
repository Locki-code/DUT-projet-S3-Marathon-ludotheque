@extends('base')
    {{--
        from https://www.codeply.com/go/5Lu0E8graQ/bootstrap-4-user-profile-template
    --}}

@section('content')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profil" data-toggle="tab" class="nav-link active">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#achats" data-toggle="tab" class="nav-link">Achats</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#commentaires" data-toggle="tab" class="nav-link">Commentaires</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profil">
                        <h5 class="mb-3">Profil Utilisateur</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Nom</h6>
                                <p>
                                    {{Auth::user()->name}}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6>Adresse Mail</h6>
                                <p>
                                    {{Auth::user()->email}}
                                </p>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="achats">
                        <h2 class="mb-4">Liste des jeux dans ma ludothèque personnelle</h2>
                        <a href="{{route('user.achat')}}">Ajouter un achat</a>
                        @foreach(Auth::user()->ludo_perso as $jeu)
                            <x-achat-jeu :jeu="$jeu" :user="Auth::user()"></x-achat-jeu>

                                                        <p class="text-4xl text-bold">{{$jeu->nom}}</p>
                                                        <h6>Achat {{\App\Services\DateService::diff($jeu->achat->date_achat)}} <span> (le {{\App\Services\DateService::dateJour($jeu->achat->date_achat)}})</span>
                                                        </h6>
                                                        <h6>Stockage</h6>
                                                        <p class="text-2xl text-bold">{{$jeu->achat->lieu}}</p>
                                                        <h6>Prix</h6>
                                                        <p class="text-2xl text-bold">{{$jeu->achat->prix}}</p>
                                                        <x-carte :jeu="$jeu"></x-carte>

                            <a type="button" href="{{route('user.affiche_achat', $jeu->id)}}">Supprimer le jeu</a>
                        @endforeach
                    </div>
                    <div class="tab-pane" id="commentaires">
                        @foreach(Auth::user()->commentaires as $commentaire)
                            <p class="text-4xl text-bold">{{$commentaire->jeu->nom}}</p>
                            <h6>Ajouté {{\App\Services\DateService::diff($commentaire->date_com)}} <span> (le {{\App\Services\DateService::dateJour($commentaire->date_com)}})</span>
                            </h6>
                            <p>{{$commentaire->commentaire}}</p>
                            <p>{{$commentaire->note}}</p>
                            <p><a type="button" href="">Modifier</a>
                                <button type="submit" value="valide" name="delete">Supprimer</button> </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-1 text-center">
                <img src="{{url('./images/defaultprofile.svg')}}" class="mx-auto img-fluid img-circle d-block"
                     alt="avatar">
                {{--
                                <h6 class="mt-2">Upload a different photo</h6>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control">Choose file</span>
                                </label>
                --}}
            </div>
        </div>
    </div>

