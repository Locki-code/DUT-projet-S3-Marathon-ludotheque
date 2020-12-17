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
    {{-- la photo  --}}
    <p><strong>Photo  : </strong><img src="https://i.pravatar.cc/150?u=fake@pravatar.com" class="card-img-top" alt="avatar"></p>
</div>


<div>
    {{-- le thème  --}}
    <p><strong>Thème : </strong>{{$ludotheque->theme->nom}}</p>
</div>
<div>
    {{-- la catégorie  --}}
    <p><strong>Catégorie: </strong>{{$ludotheque->categorie}}</p>
</div>
<div>
    {{-- la langue  --}}
    <p><strong>Langue : </strong>{{$ludotheque->langue}}</p>
</div>
<div>
    {{-- l'éditeur  --}}
    <p><strong>Editeur : </strong>{{$ludotheque->editeur->nom}}</p>
</div>
<div>
    {{-- le nombre de joueur --}}
    <p><strong>Nombre de joueurs : </strong>{{$ludotheque->nombre_joueur}}</p>
</div>
<div>
    {{-- la durée --}}
    <p><strong>Durée : </strong>{{$ludotheque->duree}}</p>
</div>
<div>
    {{-- prix moyen du jeu  --}}
    <p><strong>Prix moyen : </strong>{{$prixMoy = DB::table('achats')->join('jeux', 'jeu_id', '=', 'id')->select('prix')->where('id', $ludotheque->id)->avg('prix')}}</p>
</div>
<div>
    {{-- prix le plus haut du jeu  --}}
    <p><strong>Prix le plus haut du jeu : </strong>{{$prixMax = DB::table('achats')->join('jeux', 'jeu_id', '=', 'id')->select('prix')->where('id', $ludotheque->id)->max('prix')}}</p>
</div>
<div>
    {{-- prix le plus bas du jeu  --}}
    <p><strong>Prix le plus bas du jeu : </strong>{{$prixMin = DB::table('achats')->join('jeux', 'jeu_id', '=', 'id')->select('prix')->where('id', $ludotheque->id)->min('prix')}}</p>
</div>
<div>
    {{-- nombre d'urilisateurs qui possèdent le jeu --}}
    <p><strong>Nombre d'utilisateurs qui possèdent le jeu : </strong>{{$nbUtiJeu = DB::table('achats')->join('jeux', 'jeu_id', '=', 'id')->select('prix')->where('id', $ludotheque->id)->count('prix')}}</p>
</div>
</div>
<div>
    {{-- nombre d'utilisateurs sur le site  --}}
    <p><strong>Nombre total d'utilisateurs sur le site : </strong>{{$prixMin = DB::table('users')->select('id')->count('id')}}</p>
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
