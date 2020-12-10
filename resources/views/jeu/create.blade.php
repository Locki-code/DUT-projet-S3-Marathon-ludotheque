@extends("base")

@section('title', 'Liste des jeux')

@section('content')

    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Ajouter un nouveau jeu
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
            <form name="form-create-jeu" method="post" action="{{ URL::route('jeu_store') }}" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required="">
                    {{ old('description') }}
                </textarea>
                </div>
                <div class="form-group">
                    <label for="description">Theme</label>
                    <select class="form-control" name="theme">
                        @foreach( \App\Models\Theme::all() as $theme)
                            @if (old('theme') == $theme->id)
                                <option value="{{ $theme->id }}" selected>{{ $theme->nom }}</option>
                            @else
                                <option value="{{ $theme->id }}">{{ $theme->nom }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Editeur</label>
                    <select class="form-control" name="editeur">
                        @foreach( \App\Models\Editeur::all() as $editeur)
                            @if (old('editeur') == $editeur->id)
                                <option value="{{ $editeur->id }}" selected>{{ $editeur->nom }}</option>
                            @else
                                <option value="{{ $editeur->id }}">{{ $editeur->nom }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="langue">Langue</label>
                    <select class="form-control" name="langue">
                        @foreach(\App\Models\Jeu::LANGUES as $langue )
                            @if (old('langue') == $langue)
                                <option value="{{ $langue }}" selected>{{ $langue }}</option>
                            @else
                                <option value="{{ $langue }}">{{ $langue }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <select class="form-control" name="age">
                        @foreach(\App\Models\Jeu::AGE as $age )
                            @if (old('age') == $age)
                                <option value="{{ $age }}" selected>{{ $age }}+</option>
                            @else
                                <option value="{{ $age }}">{{ $age }}+</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre_joueurs">Nombre joueurs</label>
                    <select class="form-control" name="nombre_joueurs">
                        @foreach(\App\Models\Jeu::NBJOUEUR as $nbJoueur )
                            @if (old('nombre_joueurs') == $nbJoueur)
                                <option value="{{ $nbJoueur }}" selected>{{ $nbJoueur }}</option>
                            @else
                                <option value="{{ $nbJoueur }}">{{ $nbJoueur }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="duree">Durée</label>
                    <select class="form-control" name="duree">
                        @foreach(\App\Models\Jeu::DUREE as $duree )
                            @if (old('duree') == $duree)
                                <option value="{{ $duree }}" selected>{{ $duree }}</option>
                            @else
                                <option value="{{ $duree }}">{{ $duree }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="duree">Categorie</label>
                    <select class="form-control" name="categorie">
                        @foreach(\App\Models\Jeu::CATEGORY as $categorie )
                            @if (old('categorie') == $categorie)
                                <option value="{{ $categorie }}" selected>{{ $categorie }}</option>
                            @else
                                <option value="{{ $categorie }}">{{ $categorie }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="duree">Mecaniques</label>
                    <hr>

                    @foreach(\App\Models\Mecanique::all() as $mecanique )
                        <div class="form-check form-check-inline">

                            @if(old('avec_mecaniques') !== null && in_array($mecanique->id, old('avec_mecaniques')))
                                <input type="checkbox" class="form-check-input" name="avec_mecaniques[]" value="{{ $mecanique->id }}"
                                       id="mecaniquess_{{ $mecanique->id }}" checked="checked"/>
                            @else
                                <input type="checkbox"class="form-check-input" name="avec_mecaniques[]" value="{{ $mecanique->id }}"
                                       id="mecaniquess_{{ $mecanique->id }}"/>
                            @endif
                            <label class="form-check-label"
                                   for="mecaniquess_{{ $mecanique->id }}">{{ $mecanique->nom }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" id="image" name="image"  class="form-control" >
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
