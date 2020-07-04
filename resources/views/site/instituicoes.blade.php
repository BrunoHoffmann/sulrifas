@extends('site.master.master')

@section('title', 'Instituições')

@section('content')

<section class="instituicoes">
    <h1>Instituições</h1>

    <ul class="listagem-instituicoes flex">
        @foreach($instituicoes as $item)
        @if($item->link) <a href="{{$item->link}}" target="_blank">@endif
        <li {{($item->background) ? 'style=border-color:' . $item->background : ''}}>
            <figure>
                <div class="img" {{($item->background) ? 'style=background:' . $item->background : ''}}>
                    <img src="{{ url('/../storage/app/public/instituicoes/' . $item->name_photo) }}" alt="{{$item->name}}">
                </div>
                <figcaption>
                    <h3>{{$item->name}}</h3>
                    <span>{{$item->cnpj}}</span>
                    <span>{{$item->city}}</span>
                    <span>{{$item->state}}</span>
                </figcaption>
            </figure>
        </li>
        @if($item->link) </a> @endif
        @endforeach
    </ul>
</section>

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
@endsection
