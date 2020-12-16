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
                <th>Description</th>
                <th>Thème</th>
                <th>Editeur</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ludotheques as $ludotheque)
                <tr>
                    <td>{{$ludotheque->nom}}</td>
                    <td>{{$ludotheque->description}}</td>
                    <td>{{$ludotheque->theme}}</td>
                    <td>{{$ludotheque->editeur}}</td>

                    <td>
                        @can('delete',$ludotheque)
                            <a href="{{route('ludotheques.show',[$ludotheque->id, 'action'=>'show'])}}"
                               class="bg-blue-400 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                        @else
                            <a href="{{route('ludotheques.show',[$ludotheque->id, 'action'=>'show'])}}"
                               class="bg-red-400 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
