<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/boostrap.min.css')}}"> 

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> 
</head>
<body>
    {{-- header start --}}
    <header>
                                
    </header>
    {{-- header end --}}


    {{-- conteudo start --}}
    <div>
        @yield('content')
    </div>
    {{-- conteudo end --}}


    
    {{-- footer strat --}}
    <footer class="footer">
        
    </footer>
    <!--/ footer end  -->




    <!-- JS Bootstrap -->
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- JS MANUAL -->
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>