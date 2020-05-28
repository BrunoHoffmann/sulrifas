@extends('site.layout')

@section('title', 'Sulrifas')

@section('content')

<main class="principal">
    <figure>
        <img src="{{ URL('assets/img/carro1.jpeg')}}" alt="Carro FORD">
        {{-- <img src="{{ URL('assets/img/icon/instagram-logo.png') }}" alt="Instagram"> --}}
        <figcaption>
            <div class="principal-legenda">
                <span>ford</span>
                <h1>Ford ka se 1.0 ha b</h1>
                <span>2018</span>
                <a href="{{ asset('/') }}" class="btn-compra">Comprar rifa</a>
            </div>
            <div class="footer-principal">
                <p>* Comprando uma centena por R$ 50,00 - Você concorre a um automóvel</p>
                <h3>Edição popular</h3>
            </div>
        </figcaption>
    </figure>
</main>

@endsection