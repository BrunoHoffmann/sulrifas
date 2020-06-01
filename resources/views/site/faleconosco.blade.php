@extends('site.layout')

@section('title', 'Fale conosco')

@section('content')

<section class="contato">
    <h2>Olá, olha como é fácil entrar em contato conosco...</h2>
    <p>Logo a baixo iremos disponibilizar alguns botões com links para os nossos contatos referente a cada sorteio é só clicar no botão.</p>
    <div class="links-contato">
        <a href="" class="btn-whatsapp"><img src="{{ URL('assets/img/icon/whatsapp.png') }}">Chat do Whatsapp</a><br>
    </div>
    <a href="" class="btn-instagram"><img src="{{ URL('assets/img/icon/instagram-logo.png') }}" alt="Instagram">Nosso Instagram</a>
</section>

<section class="beneficios">
    <div class="options">
        <div>
            <img src="" alt="">
            <h3>ESCOLHA O SORTEIO</h3>
        </div>
        <p>Escolha o prêmio que gostaria de concorrer, verifique a descrição, regulamento do sorteio e fotos em caso de dúvidas entre em contato com o administrador</p>
    </div>

    <div class="options">
        <div>
            <img src="" alt="">
            <h3>SELECIONE SEUS NÚMEROS</h3>
        </div>
        <p>Você pode escolher quantos números desejar!
            Mais números, mais chances de ganhar</p>
    </div>

    <div class="options">
        <div>
            <img src="" alt="">
            <h3>FAÇA O PAGAMENTO</h3>
        </div>
        <p>Faça o pagamento em umas das contas exibidas.
            Envie o comprovante ao administrador via whatsapp.</p>
    </div>

    <div class="options">
        <div>
            <img src="" alt="">
            <h3>AGUARDE O SORTEIO</h3>
        </div>
        <p>Aguarde o sorteio pela Loteria Federal
            Cruze os dedos
            Você pode ser o próximo sorteado</p>
    </div>

</section>

@endsection
