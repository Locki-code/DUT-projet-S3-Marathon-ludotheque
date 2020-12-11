@extends('base')

@section('title','Création d\'un commentaire')

@section('content')
    <h2 class="mb-4">Suppression d'un jeu dans ma ludothèque personnelle</h2>

    <x-achat-jeu :jeu="$jeu" :user="Auth::user()"></x-achat-jeu>
    <div class="flex items-center justify-end mt-4 top-auto">
        <form action="{{route('users.supprimeAchat',$jeu->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" name="delete" value="annule"
                    class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Annule
            </button>
            <button type="submit" name="delete" value="valide"
                    class=" bg-white text-red-500 px-2 py-2 rounded-md ">Valide
            </button>
        </form>
    </div>


@endsection
