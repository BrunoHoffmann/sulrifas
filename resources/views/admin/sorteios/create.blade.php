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

            <form class="app_form" action="{{route('sorteios.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="nav_tabs_content">
                    <div id="data">
                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Nome do veículo:</span>
                                <input type="text" name="name" placeholder="Nome do veículo" value="{{old('name')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Ano do veículo:</span>
                                <input type="number" name="year" placeholder="ex: 2010" value="{{old('year')}}"/>
                            </label>
                        </div>

                        <label class="label">
                            <span class="legend">*Descrição do veículo: </span>
                            <textarea name="description" id="summary-ckeditor" cols="30" rows="5">{{old('description')}}</textarea>
                            <label class="label">
                                <span class="legend">*Km:</span>
                                <input type="text" name="km" placeholder="ex: 0" value="{{old('km')}}"/>
                            </label>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Data do sorteio:</span>
                                <input type="date" name="data_sorteio" value="{{old('data_sorteio')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Data da liberação:</span>
                                <input type="date" name="data_liberar" value="{{old('data_liberar')}}">
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Número de cotas:</span>
                                <input type="number" name="cotas" placeholder="ex: 100" value="{{old('cotas')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Valor do número:</span>
                                <input type="text" name="value" placeholder="R$ 00,00" value="{{old('value')}}"/>
                            </label>

                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Foto de capa:</span>
                                <input type="file" name="file_capa">
                            </label>

                            <label class="label">
                                <span class="legend">*Fotos do veículo</span>
                                <input type="file" name="file_photos[]" multiple>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Ativar:</span>
                                <select name="active" id="active">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">*Status:</span>
                                <select name="status" id="status">
                                    <option value="comprar">Comprar</option>
                                    <option value="em breve">Em breve</option>
                                    <option value="ver resultado">Ver Resultado</option>
                                </select>
                            </label>
                        </div>

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

