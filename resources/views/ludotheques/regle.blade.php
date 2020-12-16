<div class="text-center" style="margin-top: 2rem">
    <hr class="mt-2 mb-2">
</div>
<div>
    {{-- le nom du jeu  --}}
    <p><strong>Nom : </strong>{{$ludotheque->nom}}</p>
</div>
<div>
    {{-- la description  --}}
    <p><strong>Règles : </strong>{{ $ludotheque->regles}}</p>
</div>



<div>
    <a href="{{route('ludotheques.index')}}">Retour à la liste de jeux</a>
</div>

