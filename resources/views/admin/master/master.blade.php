<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">

    <link rel="stylesheet" href="{{url(mix('backend/assets/css/reset.css'))}}"/>
    <link rel="stylesheet" href="{{url(mix('backend/assets/css/libs.css'))}}">
    <link rel="stylesheet" href="{{url(mix('backend/assets/css/boot.css'))}}"/>
    <link rel="stylesheet" href="{{url(mix('backend/assets/css/style.css'))}}"/>
    <link rel="icon" type="image/png" href="assets/images/favicon.png"/>

    @hasSection('css')
        @yield('css')
    @endif

    <title>SulRifas - Sistema de administração</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"></div>

<div class="dash">
    <aside class="dash_sidebar">
        <article class="dash_sidebar_user">
            <img class="dash_sidebar_user_thumb" src="{{url(asset('backend/assets/images/avatar.jpg'))}}" alt="" title=""/>

            <h1 class="dash_sidebar_user_name">
                <a href="">Gustavo Web</a>
            </h1>
        </article>

        <ul class="dash_sidebar_nav">
            <li class="dash_sidebar_nav_item {{isActive('admin.home')}}">
                <a class="icon-tachometer" href="{{route('admin.home')}}">Dashboard</a>
            </li>
            <li class="dash_sidebar_nav_item {{isActive('users')}}">
                <a class="icon-users" href="{{route('users.index')}}">Usuários</a>
            </li>
            <li class="dash_sidebar_nav_item {{isActive('sorteios')}}">
                <a class="icon-users" href="{{route('sorteios.index')}}">Sorteios</a>
            </li>
            <li class="dash_sidebar_nav_item {{isActive('reserva.dados')}}">
                <a class="icon-users" href="{{route('sorteios.index')}}">Dados Reserva</a>
            </li>
            <li class="dash_sidebar_nav_item {{isActive('banks.dados')}}">
                <a class="icon-users" href="{{route('banks.index')}}">Banco</a>
            </li>
            <li class="dash_sidebar_nav_item"><a class="icon-reply" href="{{Route('home')}}">Ver Site</a></li>
            <li class="dash_sidebar_nav_item"><a class="icon-sign-out on_mobile" href="{{route('admin.logout')}}" target="_blank">Sair</a></li>
        </ul>

    </aside>

    <section class="dash_content">

        <div class="dash_userbar">
            <div class="dash_userbar_box">
                <div class="dash_userbar_box_content">
                    <span class="icon-align-justify icon-notext mobile_menu transition btn btn-green"></span>
                    <h1 class="transition">
                        <i class="icon-imob text-orange"></i><a href="">Up<b>Admin</b></a>
                    </h1>
                    <div class="dash_userbar_box_bar no_mobile">
                        <a class="text-red icon-sign-out" href="{{route('admin.logout')}}">Sair</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="dash_content_box">
            @yield('content')
        </div>
    </section>
</div>


<script src="{{ url(mix('backend/assets/js/jquery.js'))}}"></script>
<script src="{{ url(mix('backend/assets/js/libs.js'))}}"></script>
<script src="{{ url(mix('backend/assets/js/scripts.js'))}}"></script>

@hasSection('js')
    @yield('js')
@endif

</body>
</html>
