<div>
    <p class="text-4xl text-bold">{{$jeu->nom}}</p>
    <h6>Achat {{\App\Services\DateService::diff($jeu->achat->date_achat)}} <span> (le {{\App\Services\DateService::dateJour($jeu->achat->date_achat)}})</span>
    </h6>
    <h6>Stockage</h6>
    <p class="text-2xl text-bold">{{$jeu->achat->lieu}}</p>
    <h6>Prix</h6>
    <p class="text-2xl text-bold">{{$jeu->achat->prix}}</p>
    <x-card-jeu :jeu="$jeu"></x-card-jeu>
</div>
