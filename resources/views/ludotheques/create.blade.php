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

<form action="{{route('ludotheques.store')}}" method="POST">
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
        <label for="textarea-input"><strong>Description :</strong></label>
        <textarea name="description" id="description" rows="6" class="form-control"
                  placeholder="Description..">{{ old('description') }}</textarea>
    </div>
    <div class='w-full md:w-full px-3 mb-6'>
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
    <div class='w-full md:w-full px-3 mb-6'>
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
