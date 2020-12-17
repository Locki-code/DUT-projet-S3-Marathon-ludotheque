@extends('base.master')

@section('title', 'Carte d\'un jeu')

@section('content')
    <div class="container mx-auto">
        <x-carte :jeu="$jeu"></x-carte>
    </div>

@endsection
