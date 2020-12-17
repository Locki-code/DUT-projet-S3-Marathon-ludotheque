@extends('base')
@section('content')

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

<form method="POST" action="{{ URL::route('achat_store') }}">
    {!! csrf_field() !!}
    <input type="hidden" name="jeu_id" value="{{$jeu_id}}">
    <div class="text-center" style="margin-top: 2rem">
        <h3>Ajout d'un jeu dans votre collection</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- la date d'achat --}}
        <label for="date_achat"><strong>Date de l'achat : </strong></label>
        <input type="datetime" name="date_achat" id="date_achat"
               value="{{ old('date_achat') }}" >
    </div>

    <div>
        {{-- le lieu d'achat du jeu  --}}
        <label for="lieu"><strong>Lieu de l'achat : </strong></label>
        <input type="text" name="lieu" id="lieu"
               value="{{ old('lieu') }}">
    </div>

    <div>
        {{-- le prix du jeu  --}}
        <label for="prix"><strong>Prix de l'achat : </strong></label>
        <input type="number" min="0.00" step="0.01" name="prix" id="prix"
               value="{{ old('prix') }}">
    </div>

    <div>
        <button class="btn btn-success" type="submit">Valider</button>
    </div>
</form>
@endsection

