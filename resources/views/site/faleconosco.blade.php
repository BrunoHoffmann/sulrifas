@extends('site.master.master')

@section('content')

<section class="contato">
    <h2>Olá, olha como é fácil entrar em contato conosco...</h2>
    <p>Logo a baixo iremos disponibilizar alguns botões com links para os nossos contatos referente a cada sorteio é só clicar no botão.</p>
    <div class="links-contato">
        <a href="" class="btn-whatsapp"><img src="{{ URL('assets/img/icon/whatsapp.png') }}">Chat do Whatsapp</a><br>
    </div>
    <a href="" class="btn-instagram"><img src="{{ URL('assets/img/icon/instagram-logo.png') }}" alt="Instagram">Nosso Instagram</a>
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
