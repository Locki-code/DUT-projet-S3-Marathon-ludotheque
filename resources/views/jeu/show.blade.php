@extends("base")

@section('title', 'Détail du jeu')

@section('content')

    <div class="row justify-content-center">
        <div class="col-8 ">
            <div class="card">
                <img src="{{ url($jeu->url_media) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $jeu->nom }}</h5>
                    <p class="card-text">
                    {{ $jeu->description }}
                    <hr>
                    {{ $jeu->theme->nom }}
                    <hr>
                    @foreach ( $jeu->mecaniques as $key => $mecaniques)
                        @if ($key !== 0)
                            &nbsp;-&nbsp;
                        @endif
                        {{ $mecaniques->nom }}
                    @endforeach
                    <hr>
                        {{ $jeu->categorie }}
                    <hr>
                        Age recommandé : {{ $jeu->age }}
                    <hr>
                        {{ $jeu->langue }}
                    <hr>
                        {{ $jeu->theme->nom }}
                    <hr>
                        Edité par {{ $jeu->editeur->nom }}
                    <hr>
                        durée : {{ $jeu->duree }}
                    <hr>
                        Nombre de joueur : {{ $jeu->nombre_joueurs }}
                    </p>
                    <hr><hr>
                        @auth
                        <a type="button" href="{{route('commentaires.create', ['jeu_id'=> $jeu->id])}}">Ajouter un commentaire</a>
                        @endauth
                        <a href="{{ URL::route('jeu_rules', $jeu->id) }}" class="btn btn-primary">Regarder les régles du jeu</a>
                    <hr><hr>
                </div>
            </div>
        </div>
        <div class="col-4 ">
            <div class="card">
                <img src="https://konnect.serene-risc.ca/wp-content/uploads/2019/02/ascending-graph-1173935_960_720-780x520.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Statistique de {{ $jeu->nom }}</h5>
                    <p class="card-text">
                        <strong>Nombre de note/commentaire : </strong>{{ $jeuxInformation->getNbComment() }} <br />
                        <strong>Note Moyenne : </strong>{{ $jeuxInformation->getAverage() }} <br />
                        <strong>Note la plus haute: </strong>{{ $jeuxInformation->getMax() }} <br />
                        <strong>Note la plus basse : </strong>{{ $jeuxInformation->getMin() }} <br />
                        <strong>Nombre de commentaire: </strong>{{ $jeuxInformation->getNbComment() }} / {{ $jeuxInformation->getNbCommentTotal()  }} <br />
                        <strong>Position du jeu dans le théme {{ $jeuxInformation->getRankInTheme() }} sur {{ $jeuxInformation->getNbRankInTheme() }}<br />
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ URL::route('jeu_index') }}" class="btn btn-secondary">Retour à la liste des jeux</a>
@endsection

