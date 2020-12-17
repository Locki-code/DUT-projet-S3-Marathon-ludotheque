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

<form method="POST" action="{{ URL::route('commentaire_store') }}">
    {!! csrf_field() !!}
    <input type="hidden" name="jeu_id" value="{{$jeu_id}}">
    <div class="text-center" style="margin-top: 2rem">
        <h3>Ajout d'un commentaire</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- la note du jeu  --}}
        <label for="note"><strong>Note : </strong></label>
        <input type="number" min="0" max="5" name="note" id="note"
               value="{{ old('note') }}">
    </div>

    <div>
        {{-- la description  --}}
        <label for="textarea-input"><strong>Description :</strong></label>
        <textarea name="commentaire" id="commentaire" rows="6" class="form-control"
                  placeholder="Description..">{{ old('commentaire') }}</textarea>
    </div>

    <div>
        <button class="btn btn-success" type="submit">Valider</button>
    </div>
</form>
