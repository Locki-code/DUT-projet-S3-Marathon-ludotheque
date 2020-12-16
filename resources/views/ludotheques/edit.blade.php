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
     la fonction 'route' utilise un nom de route.
     '@csrf' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
     '@method('PUT') précise à Laravel que la requête doit être traitée
      avec une commande PUT du protocole HTTP.
  --}}

<form action="{{route('ludotheques.update',$ludotheque->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Modification d'un jeu</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- le nom du jeu  --}}
        <label for="nom"><strong>Nom : </strong></label>
        <input type="text" class="form-control" id="nom" name="nom"
               value="{{ $ludotheque->nom}}">
    </div>
    <div>
        {{-- la description  --}}
        <label for="textarea-input"><strong>Description : </strong></label>
        <textarea name="description" id="description" rows="6" class="form-control"
                  placeholder="Description..">{{ $ludotheque->description }}</textarea>
    </div>

    <div class='w-full md:w-full px-3 mb-6'>
        {{-- la langue du jeu  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Langue : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="langue"  value="{{ $ludotheque->langue }}"
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
        {{-- url_media  --}}
        <label for="url_media"><strong>Url_media : </strong></label>
        <input type="text" class="form-control" id="url_media" name="url_media"
               value="{{ $ludotheque->url_media }}">
    </div>
    <div class='w-full md:w-full px-3 mb-6'>
        {{-- l'age pour jouer  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Age : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="age"  value="{{ $ludotheque->age }}"
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

    <div class='w-full md:w-full px-3 mb-6'>
        {{-- nombre de joueurs  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Nombre de joueurs : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="nombre_joueurs"  value="{{ $ludotheque->nombre_joueurs }}"
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

    <div class='w-full md:w-full px-3 mb-6'>
        {{-- la catégorie  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Catégorie : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="categorie"  value="{{ $ludotheque->categorie }}"
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

    <div class='w-full md:w-full px-3 mb-6'>
        {{-- la durée  --}}
        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Durée : </label>
        <div class="flex-shrink w-full inline-block relative">
            <select name="duree"  value="{{ $ludotheque->duree }}"
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
    <div>
        {{-- le thème  --}}
        <label for="theme"><strong>Thème : </strong></label>
        <input type="text" class="form-control" id="theme" name="theme"
               value="{{ $ludotheque->theme}}">
    </div>
    <div>
        {{-- l'éditeur du jeu  --}}
        <label for="editeur"><strong>Editeur : </strong></label>
        <input type="text" class="form-control" id="editeur" name="editeur"
               value="{{ $ludotheque->editeur}}">
    </div>

    <div>
        <button class="btn btn-success" type="submit">Valider</button>
    </div>


</form>
