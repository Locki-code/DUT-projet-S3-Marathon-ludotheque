<div class="text-center" style="margin-top: 2rem">
    @if($action == 'delete')
        <h3>Suppression d'un jeu</h3>
    @else
        <h3>Affichage d'un jeu</h3>
    @endif
    <hr class="mt-2 mb-2">
</div>
<div>
    {{-- le nom du jeu  --}}
    <p><strong>Nom : </strong>{{$ludotheque->nom}}</p>
</div>
<div>
    {{-- la description  --}}
    <p><strong>Description : </strong>{{ $ludotheque->description}}</p>
</div>
<div>
    {{-- le thème  --}}
    <p><strong>Thème : </strong>{{$ludotheque->theme}}</p>
</div>
<div>
    {{-- l'éditeur du jeu  --}}
    <p><strong>Editeur : </strong>{{$ludotheque->editeur}}</p>
</div>

@if($action == 'delete')
    <form action="{{route('ludotheques.destroy',$ludotheque->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="text-center">
            <button type="submit" name="delete" value="valide">Valider</button>
            <button type="submit" name="delete" value="annule">Annuler</button>
        </div>
    </form>
@else
    <div>
        <a href="{{route('ludotheques.index')}}">Retour à la liste de jeux</a>
    </div>
@endif
