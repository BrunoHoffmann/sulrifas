@extends('admin.master.master')


@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Novo Sorteio</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="">Sorteios</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Novo Sorteio</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="nav">

            @if($errors->all() or $error ?? '')
                @foreach($errors->all() as $error)
                    <div class="message message-orange">
                        <p class="icon-asterisk">{{$error}}</p>
                    </div>
                @endforeach
                <div class="message message-orange">
                    <p class="icon-asterisk">{{$error}}</p>
                </div>
            @endif

            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#data" class="nav_tabs_item_link active">Dados do sorteio</a>
                </li>
            </ul>

            <form class="app_form" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="nav_tabs_content">
                    <div id="data">
                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Nome do veículo:</span>
                                <input type="text" name="name" placeholder="Nome do veículo" value=""/>
                            </label>

                            <label class="label">
                                <span class="legend">*Ano do veículo:</span>
                                <input type="number" name="ano" placeholder="Digite o ano do veículo" value=""/>
                            </label>
                        </div>

                        <label class="label">
                            <span class="legend">*Descrição do veículo:</span>
                            <textarea name="content" id="content" cols="30" rows="5"></textarea>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Data do sorteio:</span>
                                <input type="date" name="data_sorteio" placeholder="Digite a data do sorteio" value=""/>
                            </label>

                            <label class="label">
                                <span class="legend">*Número de Reservas:</span>
                                <input type="number" name="number_reservations" placeholder="Número de reservas" value=""/>
                            </label>
                        </div>

                        <label class="label">
                            <span class="legend">*Valor do número:</span>
                            <input type="text" name="valor" placeholder="R$ 00,00" value=""/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Foto de capa:</span>
                                <input type="file" name="file_capa">
                            </label>

                            <label class="label">
                                <span class="legend">*Fotos do veículo</span>
                                <input type="file" name="file_photos">
                            </label>
                        </div>

                        <label class="label">
                            <span class="legend">*Ativar:</span>
                            <select name="ativo" id="ativo">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </label>


                    <div class="text-right mt-2">
                        <a href="{{route('sorteios.index')}}" class="btn btn-large btn-red">Cancelar
                        </a>
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Criar Sorteio</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
