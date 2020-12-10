@extends('base')

@section('title','Création d\'un commentaire')

@section('content')
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            <p class="text-center text-2xl">Ajouter un commentaire au jeu "{{$jeu->nom}}"</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <form action="{{route('commentaires.store')}}" method="POST">
                @csrf
                <input type="hidden" name="jeu_id", value="{{$jeu->id}}">
                <div class="form-group">
                    <label for="commentaire">Commentaire</label>
                    <textarea cols="80" rows="4" name="commentaire" class="form-control" required> {{ old('commentaire') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <input name="note" class="form-control" placeholder="Note entre 0 et 5" value="{{ old('note') }}">

                </div>
                <button type="submit" class="btn btn-primary">Valide</button>
            </form>
        </div>
@endsection
