@extends('site.master.master')

@section('title', 'Title do veiculo - SulRifas')

@section('content')

<section class="show">
    <div class="show-img">
        <img src="{{url('assets/img/carro1.png')}}" alt="description">
    </div>

    <div class="show-description">
        <h1>Fazer 250 - 2020</h1>

        <div class="description-green">
            <div class="ganhador"><span class="ganhador-title">Ganhador</span><span class="user">Bruno Hoffmann</span><span class="cota">Cota: 829</span></div>

            <div class="description-bottom">
                <div class="valor"><span class="valor-title">valor</span><span>R$ 25,00</span></div>
                <div class="date"><span class="date-title">Sorteio</span><span>18/06/2020</span></div>
            </div>
        </div>
        <div class="year">
            <span>Ano: 2020</span>
            <span>0 km</span>
        </div>

        <p>* Comprando uma centena por R$ 25,00.</p>
        <p>Você concorre a um automóvel Fazer 250cc - 0km 2020.</p>

    </div>
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
