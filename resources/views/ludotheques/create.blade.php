@extends('base')
{{--
   messages d'erreurs dans la saisie du formulaire.
--}}


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--
     formulaire de saisie d'une tâche
     la fonction 'route' utilise un nom de route
     'csrf_field' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
  --}}
@section('content')
<form action="{{route('ludotheques.store')}}" class="form-tot" method="POST">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Ajout d'un jeu</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- le nom du jeu  --}}
        <label for="nom"><strong>Nom : </strong></label>
        <input type="text" name="nom" id="nom"
               value="{{ old('nom') }}">
    </div>

    <div>
        {{-- la description  --}}
        <label for="textarea-input"><strong>Description : </strong></label>
        <textarea name="description" id="description" rows="6" class="form-control"
                  placeholder="Description..">{{ old('description') }}</textarea>
    </div>

    <div>
        {{-- les règles  --}}
        <label for="textarea-input"><strong>Règle : </strong></label>
        <textarea name="regle" id="regle" rows="6" class="form-control"
                  placeholder="regle..">{{ old('regle') }}</textarea>
    </div>

    <div class="form-index">
        {{-- la langue du jeu  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Langue : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="langue"  value="{{ old('langue') }}"
                    class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                <option value="">Choisir ...</option>
                <option value="Fr" > Fr </option>
                <option value="En" > En </option>
                <option value="Es" > Es </option>
                <option value="De" > De </option>
            </select>
        </div>
    </div>

    <div>
        {{-- l'url_media  --}}
        <label for="url_media"><strong>Url media : </strong></label>
        <input type="text" name="url_media" id="url_media"
               value="{{ old('url_media') }}">
    </div>

    <div class="form-index">
        {{-- l'age pour jouer  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Age : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="age"  value="{{ old('age') }}"
                    class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                <option value="">Choisir ...</option>
                <option value="" > 4+ </option>
                <option value="" > 8+ </option>
                <option value="" > 12+ </option>
                <option value="" > 16+ </option>
                <option value="" > 18+ </option>
            </select>
        </div>
    </div>

    <div class="form-index">
        {{-- nombre de joueurs  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Nombre de joueurs : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="nombre_joueurs"  value="{{ old('nombre_joueurs') }}"
                    class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                <option value="">Choisir ...</option>
                <option value="" > 1 </option>
                <option value="" > 2 </option>
                <option value="" > 3 </option>
                <option value="" > 4 </option>
                <option value="" > 5 </option>
                <option value="" > 6 </option>
                <option value="" > 7 </option>
                <option value="" > 8 </option>
                <option value="" > 9 </option>
                <option value="" > 10 </option>
                <option value="" > 11 </option>
                <option value="" > 12 </option>
                <option value="" > 13+ </option>
            </select>
        </div>
    </div>

    <div class="form-index">
        {{-- la catégorie  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Catégorie : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="categorie"  value="{{ old('categorie') }}"
                    class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                <option value="">Choisir ...</option>
                <option value="" > Réflexion </option>
                <option value="" > Stratégie </option>
                <option value="" > Sport </option>
                <option value="" > Infiltration </option>
                <option value="" > Horreur </option>
                <option value="" > Action </option>
                <option value="" > Jeux de rôle </option>
            </select>
        </div>
    </div>

    <div class="form-index">
        {{-- la durée  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Durée : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="duree"  value="{{ old('duree') }}"
                    class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                <option value="">Choisir ...</option>
                <option value="" > 5minutes </option>
                <option value="" > 10minutes </option>
                <option value="" > 15minutes </option>
                <option value="" > 30minutes </option>
                <option value="" > 1heure </option>
                <option value="" > 2heures </option>
                <option value="" > 3heures ou plus </option>
            </select>
        </div>
    </div>

    <div class="form-index">
        {{-- le thème  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Thème : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="theme_id"  value="{{ old('theme_id') }}"
                    class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                <option value="">Choisir ...</option>
                @foreach($themes as $th)
                    <option value="{{$th -> id}}" @if($th == old('theme_id')) selected @endif>{{$th -> nom}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-index">
        {{-- l'éditeur'  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Editeur : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="editeur_id"  value="{{ old('editeur_id') }}"
                    class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                <option value="">Choisir ...</option>
                @foreach($editeurs as $ed)
                    <option value="{{$ed -> id}}" @if($ed == old('editeur_id')) selected @endif>{{$ed -> nom}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valider</button>
    </div>
</form>
@endsection
