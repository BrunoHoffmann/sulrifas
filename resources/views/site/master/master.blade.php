<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- SEO -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!!$head ?? ''!!}


    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/geral.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">

    @yield("css")
</head>
<body>
    {{-- header start --}}
    <header id="cabecalho">

        {{-- MENU START --}}
        <nav id="menu" class="menu-mobile">
            <div class="menu-grid">
                <div class="logo_icon">
                    <img class="icon-menu" src="{{URL('assets/img/icon/icon-menu.png')}}" alt="Icon menu">

                    <a href="{{ Route('home')}}"><img class="logo" src="{{ URL('assets/img/logo.png') }}" alt="Logo sulrifa"></a>
                </div>
                <ul>
                    <li><a href="{{ asset('/') }}">Inicio</a></li>
                    <li><a href="{{ asset('sorteios') }}">Sorteios</a></li>
                    <li><a href="{{ asset('instituicoes') }}">Instituições</a></li>
                    <li><a href="{{ asset('faleconosco') }}">Falar Conosco</a></li>
                    <li><a href="{{ asset('dashboard') }}">Login</a></li>
                </ul>
            </div>
        </nav>

        {{-- MENU END --}}

    </header>
    {{-- header end --}}


    {{-- conteudo start --}}
    <div id="conteudo">
        @yield('content')
    </div>
    {{-- conteudo end --}}



    {{-- footer strat --}}
    <footer id="footer">
        <div class="footer">
            <p>Copyrights © 2020 Todos os direitos reservados.</p>
            <div class="sociais">
                <ul>
                    <li><a href="#"><img src="{{ URL('assets/img/icon/instagram-logo.png') }}" alt="Instagram"></a></li>
                </ul>
                <p>email@empresa.com.br</p>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->




    <!-- JS Bootstrap -->
    <script src="{{asset('assets/bootstrap/js/jquery.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- JS MANUAL -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    @yield('js')
</body>
</html>
