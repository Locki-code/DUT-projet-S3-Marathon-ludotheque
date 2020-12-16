@extends('base.master')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-end">
            <a href="{{route('ludotheques.create')}}"><button class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Ajouter un jeu</button></a>
        </div>
        <h1>Liste des jeux</h1>
        <table class="table-auto">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Photo</th>
                <th>Durée</th>
                <th>Nombre de joueurs</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ludotheques as $ludotheque)
                <tr>
                    <td>{{$ludotheque->nom}}</td>
                    <td><img src="https://i.pravatar.cc/150?u=fake@pravatar.com" class="card-img-top" alt="avatar"></td>
                    <td>{{$ludotheque->duree}}</td>
                    <td>{{$ludotheque->nombre_joueur}}</td>


                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
