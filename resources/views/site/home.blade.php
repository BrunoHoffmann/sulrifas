@extends('site.master.master')

@section('title', 'Sulrifas - Sorteios de carros e motos')

@section('content')
@if(isset($ultimo))
<main class="principal">
    <div class="back-principal"></div>
    <figure>
        <div class="img">
            <img src="{{ url('/../storage/app/public/capas/' . $ultimo->capa) }}" alt="{{$ultimo->name}}" class="logo">
        </div>
        <figcaption>
            <div class="principal-legenda">
                <h1>{{$ultimo->name}}</h1>
                <span>{{$ultimo->year}}</span>
                <a href="{{Route('sorteios.show', $ultimo->slug)}}" class="btn-compra">Comprar rifa</a>
            </div>
        </figcaption>
    </figure>
</main>
@else
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
@endif

{{-- sorteios --}}
<section class="lista-sorteios">
    <h2 class="titulo02">Sorteios</h2>
    <ul class="flex">
        @if(isset($sorteios))
        @foreach($sorteios as $sorteio)
        <li>
            <figure>
                @if($sorteio->status == 'ver resultado')<span class="lista-notify">Encerrado</span>@endif
                <img src="{{ url('/../storage/app/public/capas/' . $sorteio->capa) }}" alt="{{$sorteio->name}}" class="logo">
                <figcaption>
                    <h3>{{$sorteio->name}}</h3>
                    <span class="description">Sorteio dia {{$sorteio->data_sorteio}}</span>
                <a class="btnn btn-{{($sorteio->status == 'comprar') ? 'verde' : (($sorteio->status == 'em breve') ? 'azul' : 'vermelho' ) }}" href="{{Route('sorteios.show', $sorteio->slug)}}">{{$sorteio->status}}<img class="icon-correto" src="{{ URL('assets/img/correto.png') }}"></a>
                </figcaption>
            </figure>
        </li>
        @endforeach
        @else
            <p>Sem sorteios no momento</p>
        @endif
    </ul>
</section>

@endsection
