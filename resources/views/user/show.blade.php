<div class="text-center" style="margin-top: 2rem">
    <h3>Affichage de mes jeux </h3>
    <hr class="mt-2 mb-2">
</div>

<table class="table-auto">
    <tbody>
    @foreach($achat as $ach)
        <tr>
            <td>{{$ach->nom}}</td>
            <td>{{$ach->description}}</td>
            <td>{{$ach->regles}}</td>
            <td>{{$ach->langue}}</td>
            <td><img src="https://i.pravatar.cc/150?u=fake@pravatar.com" class="card-img-top" alt="avatar"></td>
            <td>{{$ach->age}}</td>
            <td>{{$ach->nombre_joueurs}}</td>
            <td>{{$ach->categorie}}</td>
            <td>{{$ach->duree}}</td>
        </tr>

    @endforeach
    </tbody>
</table>
