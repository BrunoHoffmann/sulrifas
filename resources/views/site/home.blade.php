@extends('site.master.master')

@section('title', 'Sulrifas - Sorteios de carros e motos')

@section('content')
<main class="principal">
    <div class="back-principal"></div>
    <figure>
        <div class="img">
        <img src="{{ URL('assets/img/carro02.jpg')}}" alt="Carro FORD">
        </div>
        <figcaption>
            <div class="principal-legenda">
                <h1>Ford ka se 1.0 ha b</h1>
                <span>2018</span>
                <a href="{{Route('sorteios.show', 1)}}" class="btn-compra">Comprar rifa</a>
            </div>
            <div class="footer-principal">
                <p>* Comprando uma centena por R$ 50,00 - Você concorre a um automóvel</p>
            </div>
        </figcaption>
    </figure>
</main>

{{-- sorteios --}}
<section class="lista-sorteios">
    <h2 class="titulo02">Sorteios</h2>
    <ul class="flex">
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
                <img src="{{URL('assets/img/moto01.webp')}}" alt="">
                <figcaption>
                    <h3>Lander 250cc</h3>
                    <span class="description">Sorteio dia 27/05/2020</span>
                    <a class="btnn btn-verde" href="">Comprar Rifa  <img class="icon-correto" src="{{ URL('assets/img/correto.png') }}"></a>
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
                <img src="{{URL('assets/img/moto01.webp')}}" alt="">
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
