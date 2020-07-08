@extends('site.master.master')

@section('content')
{{-- slide --}}
<section class="showItem flex">
    <div class="show-img">
        {{-- slide --}}
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($imgs as $index => $img)
                <div class="carousel-item {{($index == 0) ? 'active' : ''}}">
                    <img src="{{ url('/../storage/app/public/imagensSorteio/' . $img) }}" alt="{{$sorteio->name}}" class="logo">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          {{-- fim slide --}}
    </div>

    <div class="show-description">
        <h1>{{$sorteio->name}}</h1>

        <div class="description-green">
            <div class="description-winner">
                <h2>Ganhador</h2>
                <span>{{$winner->name}}</span>
                <span>Cota: {{$winner->number}}</span>
            </div>
            <div class="description-bottom">
                <div class="valor"><span class="valor-title">valor</span><span>{{number_format($sorteio->value, 2, ',', '.')}}</span></div>
                <div class="date"><span class="date-title">Sorteio</span><span>{{$sorteio->data_sorteio}}</span></div>
            </div>
        </div>
        <div class="year">
            <span>Ano: {{$sorteio->year}}</span>
            <span>{{$sorteio->km}} km</span>
        </div>

        <p>{!! $sorteio->description !!}</p>

    </div>
</section>
{{-- fim sorteio --}}



{{-- beneficios --}}
<section class="grid-beneficios">
    <div class="beneficios flex">
    <div class="options">
        <div>
            <h3><img src="{{ URL('assets/img/icon/search.png') }}" alt="Busca sorteios"> ESCOLHA O SORTEIO</h3>
        </div>
        <p>Escolha o prêmio que gostaria de concorrer, verifique a descrição, regulamento do sorteio e fotos em caso de dúvidas entre em contato com o administrador</p>
    </div>

    <div class="options">
        <div>
            <h3><img src="{{URL('assets/img/icon/correto.png')}}" alt="Selecione seu número"> SELECIONE SEUS NÚMEROS</h3>
        </div>
        <p>Você pode escolher quantos números desejar!</p>
        <p>Mais números, mais chances de ganhar</p>
    </div>

    <div class="options">
        <div>
            <h3><img src="{{URL('assets/img/icon/dinheiro.png')}}" alt="Faça o pagamento"> FAÇA O PAGAMENTO</h3>
        </div>
        <p>Faça o pagamento em umas das contas exibidas.</p>
        <p>Envie o comprovante ao administrador via whatsapp.</p>
    </div>

    <div class="options">
        <div>
            <h3><img src="{{URL('assets/img/icon/estrela.png')}}" alt="Tenha sorte no sorteio"> AGUARDE O SORTEIO</h3>
        </div>
        <p>Aguarde o sorteio pela Loteria Federal</p>
        <p>Cruze os dedos</p>
        <p>Você pode ser o próximo sorteado</p>
    </div>
</div>
</section>
{{-- Fim beneficios --}}

@endsection





