@extends('base.master')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-end">
            <a href="{{route('ludotheques.create')}}"><button class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Ajouter un jeu</button></a>
        </div>
        <div class="flex justify-end">
            <a href="{{ URL::route('ludotheques.index', $sort) }}">Trié par nom @if ($filter !== null)<i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i> @endif</a>        </div>
        <h1>Liste des jeux</h1>
        <table class="table-auto">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Photo</th>
                {{--<th>Durée</th>
                <th>Nombre de joueurs</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($ludotheques as $ludotheque)
                <tr>
                    <td>{{$ludotheque->nom}}</td>
                    {{--<td>{{$ludotheque->description}}</td>
                    <td>{{$ludotheque->regle}}</td>
                    <td>{{$ludotheque->langue}}</td>--}}
                    <td><img src="https://i.pravatar.cc/150?u=fake@pravatar.com" class="card-img-top" alt="avatar"></td>
                    {{--<td>{{$ludotheque->age}}</td>
                    <td>{{$ludotheque->nombre_joueurs}}</td>
                    <td>{{$ludotheque->categorie}}</td>
                    <td>{{$ludotheque->duree}}</td>--}}

                    <td>
                            <a href="{{route('ludotheques.show',[$ludotheque->id, 'action'=>'show'])}}"
                               class="bg-blue-400 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
