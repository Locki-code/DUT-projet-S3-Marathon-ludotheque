@extends('base.master')
@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mx-auto px-4">
        <div class="flex justify-end">
            <a href="{{route('ludotheques.create')}}"><button class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Ajouter un jeu</button></a>
        </div>
        <div class="flex justify-end">
            <a href="{{ URL::route('ludotheques.index', $sort) }}">Trié par nom @if ($filter !== null)<i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i> @endif</a>
        </div>

        <div class="text-center" style="margin-top: 2rem">
            <h3>Choix de listing</h3>
            <hr class="mt-2 mb-2">
        </div>

        <form action="#" method="GET">
            <div class='w-full md:w-full px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Editeur : </label>
                <div class="flex-shrink w-full inline-block relative">
                    <select name="editeur_id"  value="{{ old('editeur_id') }}"
                            class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                        <option value="">Choisir ...</option>
                        @foreach($editeurs as $ed)
                            <option value="{{$ed -> id}}" @if($ed == old('editeur_id')) selected @endif>{{$ed -> nom}}</option>
                            {{DB::table('editeurs')->select('id')->where('id',$ed->id)->get()}};
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Valider</button>
            </div>
        </form>

        <form action=# method="GET">
            <div class='w-full md:w-full px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Thème : </label>
                <div class="flex-shrink w-full inline-block relative">
                    <select name="theme_id"  value="{{ old('theme_id') }}"
                            class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                        <option value="">Choisir ...</option>
                        @foreach($themes as $th)
                            <option value="{{$th -> id}}" @if($th == old('theme_id')) selected @endif>{{$th -> nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Valider</button>
            </div>
        </form>

        <form action=# method="GET">
            <div class='w-full md:w-full px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Mecanique : </label>
                <div class="flex-shrink w-full inline-block relative">
                    <select name="mecanique_id"  value="{{ old('mecanique_id') }}"
                            class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                        <option value="">Choisir ...</option>
                        @foreach($mecaniques as $mec)
                            <option value="{{$mec -> id}}" @if($mec == old('mecanique_id')) selected @endif>{{$mec -> nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Valider</button>
            </div>
        </form>


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
