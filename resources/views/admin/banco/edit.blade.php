@extends('admin.master.master')


@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Novo Banco</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="">Bancos</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Novo Banco</a></li>
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
                    <a href="#data" class="nav_tabs_item_link active">Dados do Banco</a>
                </li>
            </ul>

            <form class="app_form" action="{{route('banks.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="nav_tabs_content">
                    <div id="data">
                        <label class="label">
                            <span class="legend">*Nome do Banco:</span>
                            <input type="text" name="name" placeholder="ex: NuConta" value=""/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Titular</span>
                                <input type="text" name="holder" placeholder="ex: Jose Pedro" value="{{old('holder')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Ativar Titular:</span>
                                <select name="holder_active" id="holder_active">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*CPF</span>
                                <input type="text" name="cpf" placeholder="ex: xxx.xxx.xxx-xx" value="{{old('cpf')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Ativar CPF:</span>
                                <select name="cpf_active" id="cpf_active">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Agência</span>
                                <input type="text" name="agency" placeholder="ex: xxxx" value="{{old('agency')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Ativar Agência:</span>
                                <select name="agency_active" id="agency_active">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Conta</span>
                                <input type="text" name="account" placeholder="ex: xxxxxxxx" value="{{old('account')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Ativar Conta:</span>
                                <select name="account_active" id="account_active">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Operation</span>
                                <input type="text" name="operation" placeholder="ex: xxx" value="{{old('operation')}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Ativar Agência:</span>
                                <select name="operation_active" id="operation_active">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Tipo de Conta</span>
                                <input type="text" name="type" list="type" placeholder="ex: Poupança" value="{{old('type')}}">
                                <datalist id="type">
                                    @foreach($type as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </datalist>
                            </label>

                            <label class="label">
                                <span class="legend">Ativar Tipo de conta:</span>
                                <select name="type_active" id="type_active">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </label>
                        </div>

                        <label class="label">
                            <span class="legend">*Ativar Banco:</span>
                            <select name="active" id="active">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </label>


                    <div class="text-right mt-2">
                        <a href="{{route('banks.index')}}" class="btn btn-large btn-red">Cancelar
                        </a>
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Criar Banco</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
