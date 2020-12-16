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
    {{-- les règles  --}}
    <p><strong>Règle : </strong>{{$ludotheque->regle}}</p>
</div>
<div>
    {{-- la langue  --}}
    <p><strong>Langue : </strong>{{$ludotheque->langue}}</p>
</div>
<div>
    {{-- l'url media  --}}
    <p><strong>Photo  : </strong><img src="https://i.pravatar.cc/150?u=fake@pravatar.com" class="card-img-top" alt="avatar"></p>
</div>
<div>
    {{-- l'age pour jouer  --}}
    <p><strong>Age : </strong>{{$ludotheque->age}}</p>
</div>
<div>
    {{-- nombre_joueurs  --}}
    <p><strong>Nombre de joueurs : </strong>{{$ludotheque->nombre_joueurs}}</p>
</div>
<div>
    {{-- la catégorie  --}}
    <p><strong>Catégorie: </strong>{{$ludotheque->categorie}}</p>
</div>
<div>
    {{-- durée  --}}
    <p><strong>Durée : </strong>{{$ludotheque->duree}}</p>
</div>
<div>
    {{-- le thème  --}}
    <p><strong>Thème : </strong>{{$ludotheque->theme->nom}}</p>
</div>
<div>
    {{-- l'éditeur --}}
    <p><strong>Editeur : </strong>{{$ludotheque->editeur->nom}}</p>
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
