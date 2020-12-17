<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="iut Lens">
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <link rel="icon" href="./img/logo/icon.jpg"/>
    <link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">

    <title>@yield('title', 'Jeux')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

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
    <!-- Bootstrap core CSS -->
{{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
--}}

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body style="padding-top: 0px; background-color : #f7ba2a;">

@section('navbar')
    <!-- 	 HEADER		 -->
    <div class="header">
        <a href="{{ URL::route('home') }}" class="logo">Les Gens <span>cool</span> </a>
        <nav>
            <a class="nav-item" href="{{ URL::route('dashboard') }}">dashboard</a>
            <a class="nav-item" href="{{ URL::route('ludotheques.index') }}">jeux</a>
        </nav>
        <div class="header-right">
            <ul>
                @guest
            <a class="header-connexion" href="{{ URL::route('login') }}">Se connecter</a>
                @endguest

            @guest
                <li class="couleur-nom"><a class="btn btn-success" href="{{ URL::route('login') }}">Login</a></li>
            @endguest
            @auth
                    <li class="couleur-nom"><!-- Authentication --><span>{{ Auth::user()->name }}</span>
                @endguest
                @auth
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
                </li>
            @endauth

            </ul>
        </div>
        <input id="menu" type="checkbox" onclick="myFunction()">
        <label for="menu"><div for="menu" class="btn"></div></label>
    </div>

    <div id="nav-extented" style="display: none;">
        <div class="mobile-nav">
            <div class="menu-extended">
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Catégorie</a></li>
                    <li><a href="#">Jeux</a></li>
                    <li><a href="#" style="font-weight: bold;">Se connecter / S'inscrire</a></li>
                </ul>
            </div>
        </div>
    </div>
@show


<main role="main" class="container">

    <div class="starter-template" style="padding-top: 40px;">

        @yield('content')

    </div>

</main>

@section('js')
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
@show

@section('footer')

    <footer>
        <div class="container">
            <div class="line">
                <ul>
                    <li><h4>MON COMPTE</h4></li>
                    <li><a href="{{'user/profil'}}">Profil</a></li>
                </ul>
                <ul>
                    <li><h4>DASHBOARD</h4></li>
                    <li><a href="{{'/dashboard'}}">Cinq jeux aléatoires</a></li>
                    <li><a href="{{'/dashboard'}}?#meilleur">Cinq meilleurs jeux</a></li>
                </ul>
            </div>
            <div class="line">
                <ul>
                    <li><h4>JEU</h4></li>
                    <li><a href="{{'ludotheques/create'}}">Ajouter un jeu dans la base</a></li>
                    <li><a href="{{'user/achat'}}">Ajouter d'un jeu collection personnelle</a></li>
                    <li><a href="{{'ludotheques'}}">Choix de listing </a></li>
                    <li><a href="{{'ludotheques'}}?#liste_jeu">Liste des jeux</a></li>
                </ul>
            </div>
        </div>
        <div class="social-media">
            <a href="#"><img src="{{asset('img/trello.png')}}"></a>
            <a href="#"><img src="{{asset('img/gitlab.png')}}"></a>
        </div>

        <span id="divider"></span>

        <p class="mention">PROJET MARATHON<span> 2020</span>, IUT Lens</p>
        <p class="sub-mention">@Les Gens Cool</p>

    </footer>
@show
</body>
</html>
