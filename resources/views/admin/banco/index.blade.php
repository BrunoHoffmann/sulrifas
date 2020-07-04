@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Bancos</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Bancos</a></li>
                </ul>
            </nav>

            <a href="{{ route('banks.create') }}" class="btn btn-orange icon-user ml-1">Criar banco</a>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Titular</th>
                    <th>CPF</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banks as $bank)
                <tr>
                    <td>{{$bank->id}}</td>
                    <td>{{$bank->name}}</td>
                    <td>{{$bank->holder}}</td>
                    <td>{{$bank->cpf}}</td>
                    <td>{{ ($bank->active == '1') ? 'Sim' : 'Não'  }}</td>
                    <td>
                        <a href="{{Route('banks.edit', $bank->id)}}" class="btn btn-blue">Editar</a>
                        <a href="{{Route('banks.destroy', $bank->id)}}" class="btn btn-red">Deletar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
