@extends("base")

@section('title', 'Liste des jeux')

@section('content')

    <h1 class="text-center">Tous les jeux de la super ludotheque de l'IUT de Lens</h1>
    <div class="row">
        <div class="col-2 text-left">
            @auth
                <a class="btn btn-success" href="{{ URL::route('jeu_create') }}">Ajouter un jeu</a>
            @endauth
        </div>
        <div class="col-4 text-left">

            <div class="form-inline">
                <label for="description">Theme</label>
                <select class="form-control" name="theme"
                        onchange="window.location= '{{ URL::route('jeu_index', 'theme') }}/'+this.options[this.selectedIndex].value ">
                    @foreach( \App\Models\Theme::all() as $theme)
                        @if ($filter === 'theme' && $sort == $theme->id)
                            <option value="{{ $theme->id }}" selected>{{ $theme->nom }}</option>
                        @else
                            <option value="{{ $theme->id }}">{{ $theme->nom }}</option>
                        @endif
                    @endforeach
                </select>
                @if ($filter === 'theme')
                    <a href="{{ URL::route('jeu_index', ['filter' => 'name', 'sort' => null]) }}">Réinit</a>
                @endif
            </div>
        </div>
        <div class="col-6 text-right">
            @if ($filter === 'name')
                <a href="{{ URL::route('jeu_index', ['filter' => 'name', 'sort' =>$sort]) }}">Trié par
                    nom <i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i></a>
            @endif
        </div>
        @if ($filter !== 'name')
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <h4 class="text-center">Il y a {{ count($jeux) }} @if (count($jeux) > 1) Résultats @else
                            Résultat @endif</h4>
                </div>
            </div>
        @endif
    </div>
    <div class="row ">
        @foreach ($jeux as $jeu)
            <div class="col-4">
                <div class="card">
                    <img src="{{url($jeu->url_media)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jeu->nom }}</h5>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($jeu->description, 50, $end='...') }}<br/>
                        <hr>
                        {{ $jeu->theme->nom }}
                        <hr>
                        durée : {{ $jeu->duree }}
                        <hr>
                        Nombre de joueur : {{ $jeu->nombre_joueurs }}

                        <a href="{{ URL::route('jeu_show', $jeu->id) }}" class="btn btn-primary">Plus d'info</a>
                    </div>
                </div>
            </div>

    @endforeach


@endsection
