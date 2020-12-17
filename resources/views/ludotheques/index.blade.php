@extends('base')
<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TROUVER UN NOM</title>
    <link rel="icon" href="./img/logo/icon.jpg"/>
    <link rel="stylesheet" href="{{'css/homepage.css'}}">
    <link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
<script>
    function myFunction() {
        var checkBox = document.getElementById("menu");
        var div = document.getElementById("nav-extented");
        if (checkBox.checked == true){
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
</script>
</body>
</html>
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

    <div class="container-form mx-auto px-4">
        <div class="btn-ajouter-jeu">
            <a href="{{route('ludotheques.create')}}"><button class="text-gray-200 px-2 py-2 rounded-md ">Ajouter un jeu</button></a>
        </div>

        <div class="text-center" style="margin-top: 2rem">
            <h3>Choix de listing</h3>
            <hr class="mt-2 mb-2">
        </div>

        <form action="#" class="form-index" method="GET">
            <div class='w-full md:w-full px-3'>
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

        <form action=# class="form-index" method="GET">
            <div class='w-full md:w-full px-3'>
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

        <form action=# class="form-index" method="GET">
            <div class='w-full md:w-full px-3'>
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


        <div class="text-center" style="margin-top: 2rem">
            <div class="container-tri">
            <h3> Liste des jeux </h3>
                <a href="{{ URL::route('ludotheques.index', $sort)}}"><div style="float: right; margin-top: -25px;">Trié par nom</div> @if ($filter !== null)<i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i> @endif</a>
            </div>
            <hr class="mt-2 mb-2">
        </div>
        <div class="container-jeu">
            @foreach($ludotheques as $ludotheque)
                <div class="item-jeu">
                    <span>{{$ludotheque->nom}}</span>
                    {{--<td>{{$ludotheque->description}}</td>
                    <td>{{$ludotheque->regle}}</td>
                    <td>{{$ludotheque->langue}}</td>--}}
                    <div class="container-img-jeu"><img src="https://i.pravatar.cc/150?u=fake@pravatar.com" class="card-img-top" alt="avatar"></div>
                    {{--<td>{{$ludotheque->age}}</td>
                    <td>{{$ludotheque->nombre_joueurs}}</td>
                    <td>{{$ludotheque->categorie}}</td>
                    <td>{{$ludotheque->duree}}</td>--}}
                    <div class="container-btn-jeu">
                        <div>
                            <a href="{{route('ludotheques.show',[$ludotheque->id, 'action'=>'show'])}}"
                               class="bg-blue-400 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>

                        <div>
                            <a href="{{route('achat_create',[$ludotheque->id])}}"
                               class="bg-blue-400 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-shopping-basket"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
