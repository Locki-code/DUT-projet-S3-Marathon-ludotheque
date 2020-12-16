<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Marathon 2020')</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
<!--Container-->
<div class="mx-auto bg-grey-400">

<!--Container-->
    <main role="main" class="container">
            @yield('content')
    </main>

    {{-- ajoute les scripts javascript pour bootstrap --}}
    @section('scripts')
        <script src="{{ asset('js/app.js')}}"></script>
@show

</body>
</html>
