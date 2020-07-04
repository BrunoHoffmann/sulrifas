@extends('admin.master.master')


@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Editar Instituição</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="">Instituições</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Editar Instituição</a></li>
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

            <form class="app_form" action="{{route('instituicoes.update', $instituicoes->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method("PUT")
                <div class="nav_tabs_content">
                    <div id="data">
                        <label class="label">
                            <span class="legend">*Nome da Instituição:</span>
                            <input type="text" name="name" placeholder="ex: Vale Doce" value="{{$instituicoes->name}}"/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*CNPJ</span>
                                <input type="text" name="cnpj" placeholder="ex: Jose Pedro" value="{{$instituicoes->cnpj}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Cidade:</span>
                                <input type="text" name="city" placeholder="ex: Rio do Sul" value="{{$instituicoes->city}}"/>
                            </label>
                        </div>


                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Estado:</span>
                                <select name="state" id="state">
                                    <option value="Acre" {{($instituicoes->state == 'Acre') ? 'selected' : ''}}>Acre</option>
                                    <option value="Alagoas" {{($instituicoes->state == 'Alagoas') ? 'selected' : ''}}>Alagoas</option>
                                    <option value="Amapá" {{($instituicoes->state == 'Amapá') ? 'selected' : ''}}>Amapá</option>
                                    <option value="Amazonas" {{($instituicoes->state == 'Amazonas') ? 'selected' : ''}}>Amazonas</option>
                                    <option value="Bahia" {{($instituicoes->state == 'Bahia') ? 'selected' : ''}}>Bahia</option>
                                    <option value="Ceará" {{($instituicoes->state == 'Ceará') ? 'selected' : ''}}>Ceará</option>
                                    <option value="Distrito Federal" {{($instituicoes->state == 'Distrito Federal') ? 'selected' : ''}}>Distrito Federal</option>
                                    <option value="Espírito Santo" {{($instituicoes->state == 'Espírito Santo') ? 'selected' : ''}}>Espírito Santo</option>
                                    <option value="Goiás" {{($instituicoes->state == 'Goiás') ? 'selected' : ''}}>Goiás</option>
                                    <option value="Maranhão" {{($instituicoes->state == 'Maranhão') ? 'selected' : ''}}>Maranhão</option>
                                    <option value="Mato Grosso" {{($instituicoes->state == 'Maranhão') ? 'selected' : ''}}>Mato Grosso</option>
                                    <option value="Mato Grosso do Sul" {{($instituicoes->state == 'Mato Grosso do Sul') ? 'selected' : ''}}>Mato Grosso do Sul</option>
                                    <option value="Minas Gerais" {{($instituicoes->state == 'Minas Gerais') ? 'selected' : ''}}>Minas Gerais</option>
                                    <option value="Pará" {{($instituicoes->state == 'Pará') ? 'selected' : ''}}>Pará</option>
                                    <option value="Paraíba" {{($instituicoes->state == 'Paraíba') ? 'selected' : ''}}>Paraíba</option>
                                    <option value="Pernambuco" {{($instituicoes->state == 'Pernambuco') ? 'selected' : ''}}>Pernambuco</option>
                                    <option value="Piauí" {{($instituicoes->state == 'Piauí') ? 'selected' : ''}}>Piauí</option>
                                    <option value="Rio de Janeiro" {{($instituicoes->state == 'Rio de Janeiro') ? 'selected' : ''}}>Rio de Janeiro</option>
                                    <option value="Rio Grande do Sul" {{($instituicoes->state == 'Rio Grande do Sul') ? 'selected' : ''}}>Rio Grande do Sul</option>
                                    <option value="Rondônia" {{($instituicoes->state == 'Rondônia') ? 'selected' : ''}}>Rondônia</option>
                                    <option value="Santa Catarina" {{($instituicoes->state == 'Santa Catarina') ? 'selected' : ''}}>Santa Catarina</option>
                                    <option value="São Paulo" {{($instituicoes->state == 'São Paulo') ? 'selected' : ''}}>São Paulo</option>
                                    <option value="Sergipe" {{($instituicoes->state == 'Sergipe') ? 'selected' : ''}}>Sergipe</option>
                                    <option value="Tocantins" {{($instituicoes->state == 'Tocantins') ? 'selected' : ''}}>Tocantins</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">Cor de fundo</span>
                                <input type="color" name="background">
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Link do site</span>
                                <input type="text" name="link" placeholder="ex: www.site.com.br" value="{{$instituicoes->link ?? ''}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Ativar Instituição:</span>
                                <select name="active" id="active">
                                    <option value="1">Sim</option>
                                    <option value="0" {{($instituicoes->active == '0') ? 'selected' : ''}}>Não</option>
                                </select>
                            </label>
                        </div>

                        <label class="label">
                            <span class="legend">*Logo da Instituição:</span>
                            <input type="file" name="photo_name">
                            @if(isset($instituicoes->name_photo))
                                <img style="max-height: 100px;" src="{{ url('/../storage/app/public/instituicoes/' . $instituicoes->name_photo) }}" alt="Capa" class="logo">
                            @endif
                        </label>

                    <div class="text-right mt-2">
                        <a href="{{route('instituicoes.index')}}" class="btn btn-large btn-red">Cancelar
                        </a>
                        <button class="btn btn-large btn-blue icon-check-square-o" type="submit">Editar Instituição</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
