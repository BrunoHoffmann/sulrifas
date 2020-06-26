@extends('site.master.master')

@section('title', 'Todos os sorteios')

@section('content')

<section class="sorteios">
    <ul class="filtros">
        <li><a href="{{Route('sorteios')}}">Todos</a></li>
        <li><a href="{{Route('sorteios.search', 'comprar')}}">Abertos</a></li>
        <li><a href="{{Route('sorteios.search', 'encerrado')}}">Encerrados</a></li>
        <li><a href="{{Route('sorteios.search', 'breve')}}">Em Breve</a></li>
    </ul>
    <ul class="flex">
        @if(isset($sorteios))
        @foreach($sorteios as $sorteio)
        <li>
            <figure>
                @if($sorteio->status == 'ver resultado')<span class="lista-notify">Encerrado</span>@endif
                <img src="{{ url('/../storage/app/public/capas/' . $sorteio->capa) }}" alt="{{$sorteio->name}}" class="capa">
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
