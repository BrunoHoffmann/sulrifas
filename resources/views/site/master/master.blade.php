<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/geral.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
</head>
<body>
    {{-- header start --}}
    <header id="cabecalho">
        <div class="topo-cabecalho">
            <div class="topo-cabecalho-left">
                <div>
                    <p>CNPJ: 36.985.896/0001-52</p>
                </div>

                <div>
                    <p>FILANTROPIA PREMIÁVEL REGULAMENTADA NA LEI FEDERAL Nº 13.019/14 ART. 84 B, 84 C</p>
                </div>
            </div>
            <div class="topo-icon">
                <li><a href="{{ asset('/') }}"><span>Instagram</span><img src="{{ URL('assets/img/icon/instagram-logo.png') }}" alt="Instagram"></a></li>
            </div>
        </div>

        {{-- MENU START --}}
        <nav id="menu" class="menu-mobile">
            <div class="menu-grid">
                <div class="logo_icon">
                    <img class="icon-menu" src="{{URL('assets/img/icon/icon-menu.png')}}" alt="Icon menu">

                    <img class="logo" src="{{ URL('assets/img/logo.png') }}" alt="Logo sulrifa">
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
</body>
</html>
