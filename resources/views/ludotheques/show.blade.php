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


<div>
    {{--La note moyenne de ce jeu--}}
    <p><strong>La note moyenne de ce jeu : </strong>{{App\Models\Commentaire::where('jeu_id',$ludotheque->id)->avg('note')}}</p>
</div>
<div>
    {{--La note la plus haute de ce jeu--}}
    <p><strong>La note la plus haute de ce jeu : </strong>{{App\Models\Commentaire::where('jeu_id',$ludotheque->id)->max('note')}}</p>
</div>
<div>
    {{--La note la plus basse de ce jeu--}}
    <p><strong>La note la plus basse de ce jeu : </strong>{{App\Models\Commentaire::where('jeu_id',$ludotheque->id)->min('note')}}</p>
</div>
<div>
    {{--Le nombre de commentaires sur ce jeu--}}
    <p><strong>Le nombre de commentaires sur ce jeu : </strong>{{App\Models\Commentaire::where('jeu_id',$ludotheque->id)->count('note')}}</p>
</div>
<div>
    {{--Le nombre de commentaires total pour tous les jeux--}}
    <p><strong>Le nombre de commentaires total pour tous les jeux : </strong>{{App\Models\Commentaire::all()->count('*')}}</p>
</div>

<div>
    {{--Le classement de ce jeu dans l'ensemble des jeux ayant le même thème--}}
    <p><strong>Le classement de ce jeu dans l'ensemble des jeux ayant le même thème : </strong>
        {{--$classement->where('note','>=',function($query){
    $query->select('note')->where('jeu_id',$ludotheque->id)->get();})->count()--}}
    </p>
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
@endif
    <div>
        <a href="{{route('ludotheques.index')}}">Retour à la liste de jeux</a>
    </div>
<table class="table-auto">
    <thead>
    <tr>
        <th>Note: </th>
        <th>Commentaire : </th>
        <th>Posté le :</th>
    </tr>
    </thead>
    <tbody>
    @foreach($commentaires as $com)
        <tr>
            <td>{{$com->note}}</td>
            <td>{{$com->commentaire}}</td>
            <td>{{$com->date_com}}</td>
        </tr>

    @endforeach


    <div>
        <a href="{{route('commentaire_create',[ 'id' => $ludotheque->id, 'action'=>'create'])}}">Ajouter un commentaire</a>
    </div>





