@extends('site.layout')

@section('title', 'Todos os sorteios')

@section('content')

<ul class="filtros">
    <li><a href="">Todos</a></li>
    <li><a href="">Abertos</a></li>
    <li><a href="">Encerrados</a></li>
    <li><a href="">Em Breve</a></li>
</ul>

<section class="sorteios">
    <h2>Sorteios</h2>
    <ul>
        <li>
            <figure>
                <span class="lista-notify">Encerrado</span>
                <img src="{{URL('assets/img/carro1.png')}}" alt="">
                <figcaption>
                    <h3>Lander 250cc</h3>
                    <span class="description">Sorteio dia 27/05/2020</span>
                    <a class="btnn btn-vermelho" href="">Ver Resultado  <img class="icon-correto" src="{{ URL('assets/img/correto.png') }}"></a>
                </figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <span class="lista-notify">Encerrado</span>
                <img src="{{URL('assets/img/moto01.webp')}}" alt="">
                <figcaption>
                    <h3>Lander 250cc</h3>
                    <span class="description">Sorteio dia 27/05/2020</span>
                    <a class="btnn btn-vermelho" href="">Ver Resultado  <img class="icon-correto" src="{{ URL('assets/img/correto.png') }}"></a>
                </figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <img src="{{URL('assets/img/moto02.jpg')}}" alt="">
                <figcaption>
                    <h3>Lander 250cc</h3>
                    <span class="description">Sorteio dia 27/05/2020</span>
                    <a class="btnn btn-verde" href="">Comprar Rifa  <img class="icon-correto" src="{{ URL('assets/img/correto.png') }}"></a>
                </figcaption>
            </figure>
        </li>
    </ul>
</section>

@endsection