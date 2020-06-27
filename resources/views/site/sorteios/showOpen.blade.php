@extends('site.master.master')

@section('title', 'Title do veiculo - SulRifas')

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
            <div class="description-bottom">
                <div class="valor"><span class="valor-title">valor</span><span>{{number_format($sorteio->value, 2, ',', '.')}}</span></div>
                <div class="date"><span class="date-title">{{$sorteio->status == 'em breve' ? 'Libera' : 'Sorteio'}}</span><span>{{date('d-m-Y', strtotime($data))}}</span></div>
            </div>
        </div>
        <div class="year">
            <span>Ano: {{$sorteio->year}}</span>
            <span>{{$sorteio->km}} km</span>
        </div>

        <p>{{$sorteio->description}}</p>

    </div>
</section>
{{-- fim sorteio --}}

  {{-- cotas --}}
@if($sorteio->status == 'comprar')
<section class="cotas">
    <h1>Cotas</h1>
    <p>Clique e selecione quantas cotas desejar</p>

    <ul class="filter-cotas">
        <li class="livre"><a href="{{Route('sorteios.filter', ['slug' => $slug, 'filter' => 'livre'])}}">Livre ({{$livre}})</a></li>
        <li class="reservado"><a href="{{Route('sorteios.filter', ['slug' => $slug, 'filter' => 'reservado'])}}">Reservado ({{$reservado}})</a></li>
        <li class="pago"><a href="{{Route('sorteios.filter', ['slug' => $slug, 'filter' => 'pago'])}}">Pago ({{$pago}})</a></li>
    </ul>

    <a href="{{Route('sorteios.filter', ['slug' => $slug, 'filter' => 'todos'])}}" class="btn btn-vermelho">Todos</a>

    <div class="number-cotas">
        <ul>
            @foreach($cotas as $cota)
            <li>
                <a href="" id="{{$cota->id}}" class="number {{$cota->status}}"
                        @if($cota->status == 'livre')
                        data-toggle="modal" data-target="#reserva" data-whatever="{{$cota->id}}" data-some-id="{{$cota->id}}"
                        @endif >
                    {{$cota->number}}
                </a>
                <span class="description">{{$cota->status}} <span class="description-name">{{$cota->nome}}</span></span>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endif
{{-- Fim Cotas --}}



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

{{-- Model Bank --}}
@if($activeBank)
<div class="modal fade" id="banco" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Bancos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <p>Você tem 12 horas para fazer o depósito, caso não faça até lá, o número voltará a estar livre!</p>
        @if(!empty($banks[0]))
            @foreach($banks as $bank)
                <div class="bank">
                    <h3>{{$bank->name}}</h3>
                    <p>Títular: Bruno Hoffmann</p>
                    <p>CPF: 012.131.959-85</p>
                    <p>Agência: 0001</p>
                    <p>Conta: 115152521</p>
                    <p>Tipo: Conta Corrente</p>
                </div>
            @endforeach
        @else
            <p>Sem bancos cadastrados</p>
        @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
@endif

{{-- Model form reserva --}}
<div class="modal fade" id="reserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

            <input type="text" name="cota" class="form-control" id="cota" style="display: none;">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
              </div>
              <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="phone" class="form-control" name="phone" id="phone" placeholder="Digite seu telefone">
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

@endsection
@section('js')

<script>
    const btn = document.querySelectorAll('.livre');
    btn.forEach(function(item) {
        item.addEventListener('click', function() {
            document.getElementById('cota').value = item.getAttribute('id');
        });
    });

    $('#banco').modal('show');
</script>
@endsection




