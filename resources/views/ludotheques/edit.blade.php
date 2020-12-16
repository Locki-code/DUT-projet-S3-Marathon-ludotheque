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
        <input type="text" class="form-control" id="categorie" name="categorie"
               value="{{ $ludotheque->nom}}">
    </div>
    <div>
        {{-- la description  --}}
        <label for="textarea-input"><strong>Description : </strong></label>
        <textarea name="description" id="description" rows="6" class="form-control"
                  placeholder="Description..">{{ $ludotheque->description }}</textarea>
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
