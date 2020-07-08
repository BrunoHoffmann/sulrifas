@extends('site.master.master')

@section('content')
@if(isset($ultimo))

<main class="principal">
    <div class="back-principal"></div>
<!-- Carrosel start-->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        @foreach($ultimo as $index => $item)
        <div class="carousel-item {{($index == 0) ? 'active' : ''}}">
            <figure>
                <div class="img">
                    <img src="{{ url('/../storage/app/public/capas/' . $item->capa) }}" alt="{{$item->name}}" class="logo">
                </div>
                <figcaption>
                    <div class="principal-legenda">
                        <h1>{{$item->name}}</h1>
                        <span>{{$item->year}}</span>
                        <a href="{{Route('sorteios.show', $item->slug)}}" class="btn-compra">Comprar rifa</a>
                    </div>
                </figcaption>
            </figure>
        </div>
        @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
<!-- Carrosel end-->

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
