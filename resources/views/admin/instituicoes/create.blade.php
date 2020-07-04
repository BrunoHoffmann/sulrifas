@extends('admin.master.master')


@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Nova Instituição</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="">Instituições</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Nova Instituição</a></li>
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
                    <a href="#data" class="nav_tabs_item_link active">Dados da instituição</a>
                </li>
            </ul>

            <form class="app_form" action="{{route('instituicoes.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="nav_tabs_content">
                    <div id="data">

                        <label class="label">
                            <span class="legend">*Nome da Instituição:</span>
                            <input type="text" name="name" placeholder="ex: Vale Doce" value="{{old('name')}}"/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*CNPJ</span>
                                <input type="text" name="cnpj" placeholder="ex: Jose Pedro" value="{{old('cnpj')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Cidade:</span>
                                <input type="text" name="city" placeholder="ex: Rio do Sul" value="{{old('city')}}"/>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Estado:</span>
                                <select name="state" id="state">
                                    <option value="Acre">Acre</option>
                                    <option value="Alagoas">Alagoas</option>
                                    <option value="Amapá">Amapá</option>
                                    <option value="Amazonas">Amazonas</option>
                                    <option value="Bahia">Bahia</option>
                                    <option value="Ceará">Ceará</option>
                                    <option value="Distrito Federal">Distrito Federal</option>
                                    <option value="Espírito Santo">Espírito Santo</option>
                                    <option value="Goiás">Goiás</option>
                                    <option value="Maranhão">Maranhão</option>
                                    <option value="Mato Grosso">Mato Grosso</option>
                                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                    <option value="Minas Gerais">Minas Gerais</option>
                                    <option value="Pará">Pará</option>
                                    <option value="Paraíba">Paraíba</option>
                                    <option value="Pernambuco">Pernambuco</option>
                                    <option value="Piauí">Piauí</option>
                                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                                    <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                    <option value="Rondônia">Rondônia</option>
                                    <option value="Santa Catarina">Santa Catarina</option>
                                    <option value="São Paulo">São Paulo</option>
                                    <option value="Sergipe">Sergipe</option>
                                    <option value="Tocantins">Tocantins</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">Cor de fundo</span>
                                <input type="color" name="background">
                            </label>
                        </div>

                        <label class="label">
                            <span class="legend">*Logo da Instituição:</span>
                            <input type="file" name="photo_name">
                        </label>


                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Link do site</span>
                                <input type="text" name="link" placeholder="ex: www.site.com.br" value="{{old('link')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Ativar Instituição:</span>
                                <select name="active" id="active">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </label>
                        </div>

                    <div class="text-right mt-2">
                        <a href="{{route('instituicoes.index')}}" class="btn btn-large btn-red">Cancelar
                        </a>
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Criar Instituição</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
