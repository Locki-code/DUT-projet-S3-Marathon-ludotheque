@extends('base')

@section('title','Création d\'un commentaire')

@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            <p class="text-center text-2xl">Ajouter un jeu dans ma ludothèque</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form action="{{route('users.achatStore')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="date_achat">Date</label>
                    <input type="date" class="form-control" id="date_achat" name="date_achat"
                           aria-describedby="dateHelp">
                    <small id="dateHelp" class="form-text text-muted">date d'achat.</small>
                </div>

                <div class="form-group">
                    <label for="jeu">Jeu</label>
                    <select id="jeu" class="form-control" name="jeu_id">
                        <option selected>Choose...</option>
                        @foreach(\App\Services\UserService::jeuxNotInLudo() as $jeu)
                            <option value="{{$jeu->id}}">{{$jeu->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" id="prix" name="prix" aria-describedby="prixHelp">
                    <small id="prixHelp" class="form-text text-muted">prix d'achat.</small>
                </div>
                <div class="form-group">
                    <label for="prix">Lieu</label>
                    <input type="text" class="form-control" id="lieu" name="lieu" aria-describedby="lieuHelp">
                    <small id="lieuHelp" class="form-text text-muted">lieu de stockage.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
