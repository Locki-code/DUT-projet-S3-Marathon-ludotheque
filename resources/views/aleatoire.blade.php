@extends('base')

@section('content')
    <main class="flex-1 bg-gray-200 dark:bg-gray-900 overflow-y-auto transition duration-500 ease-in-out w-">
        <div class="px-24 py-12 text-gray-700 dark:text-gray-500 transition duration-500 ease-in-out">
            <div class="text-center" style="margin-top: 2rem">
                <h3>Cinq jeux aléatoires</h3>
                <hr class="mt-2 mb-2">
            <div class=" border dark:border-gray-700 transition duration-500 ease-in-out"></div>
            <div class="flex flex-col mt-2">
                @foreach($ludotheques as $ludotheque)
                    <x-carte :jeu="$ludotheque"></x-carte>
                @endforeach
            </div>
                <div class="text-center" style="margin-top: 2rem">
                    <h3>Les cinq meilleurs jeux</h3>
                    <hr class="mt-2 mb-2">
            <div class=" border dark:border-gray-700 transition duration-500 ease-in-out"></div>
            <div class="flex flex-col mt-2">
                @foreach($cinqMeilleurs as $jeu)
                    <x-carte :jeu="$jeu"></x-carte>
                @endforeach
            </div>
        </div>
    </main>

@endsection
