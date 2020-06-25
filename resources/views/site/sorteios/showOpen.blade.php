@extends('site.master.master')

@section('title', 'Title do veiculo - SulRifas')

@section('content')

<section class="showItem flex">
    <div class="show-img">
        <img src="{{url('assets/img/carro1.png')}}" alt="description">
    </div>

    <div class="show-description">
        <h1>{{$sorteio->name}}</h1>

        <div class="description-green">
            <div class="description-bottom">
                <div class="valor"><span class="valor-title">valor</span><span>{{number_format($sorteio->value, 2, ',', '.')}}</span></div>
                <div class="date"><span class="date-title">Sorteio</span><span>{{date('d-m-Y', strtotime($sorteio->data_sorteio))}}</span></div>
            </div>
        </div>
        <div class="year">
            <span>Ano: {{$sorteio->year}}</span>
            <span>{{$sorteio->km}} km</span>
        </div>

        <p>{{$sorteio->description}}</p>

        <div class="encerra">
            <span class="encerra-title">Encerra em</span>
            <div class="encerra-time">
                <div>
                    <span class="value">00</span>
                    <span class="title">Dia</span>
                </div>
                <div>
                    <span class="value">00</span>
                    <span class="title">horas</span>
                </div>
                <div>
                    <span class="value">00</span>
                    <span class="title">Minutos</span>
                </div>
                <div>
                    <span class="value">00</span>
                    <span class="title">Segundos</span>
                </div>
            </div>
        </div>
    </div>
</section>


@if($sorteio->status == 'comprar')
<section class="cotas">
    <h1>Cotas</h1>
    <p>Clique e selecione quantas cotas desejar</p>

    <ul class="filter-cotas">
        <li class="livre"><a href="">Livre (999)</a></li>
        <li class="reservado"><a href="">Reservado (999)</a></li>
        <li class="pago"><a href="">Pago (999)</a></li>
    </ul>

    <a href="" class="btn btn-vermelho">Ver meus números</a>

    <div class="number-cotas">
        <ul>
            @foreach($cotas as $cota)
            <li>
                <a href="" class="number {{$cota->status}}" @if($cota->status != 'livre') data-toggle="modal" data-target="#exampleModal" data-whatever="{{$cota->id}}" @endif >{{$cota->number}}</a>
                <span class="description">{{$cota->status}} - {{$cota->nome}}</span>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endif

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


{{-- Model --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('sorteios.reservar', $slug, $sorteio->id)}}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
              </div>
              <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="phone" class="form-control" name="phone" id="phone" aria-describedby="emailHelp" placeholder="Digite seu telefone">
            </div>
            <input type="submit" value="Reservar" class="btn btn-primary">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>




<script>

</script>

@endsection



