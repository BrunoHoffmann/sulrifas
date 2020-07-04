@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Instituições</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Instituições</a></li>
                </ul>
            </nav>

            <a href="{{ route('instituicoes.create') }}" class="btn btn-orange icon-user ml-1">Criar Instituição</a>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Link</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($instituicoes as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->cnpj}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->state}}</td>
                    <td>{{ ($item->active == '1') ? 'Sim' : 'Não'  }}</td>
                    <td>
                        <a href="{{Route('instituicoes.edit', $item->id)}}" class="btn btn-blue">Editar</a>
                        <a href="{{Route('instituicoes.destroy', $item->id)}}" class="btn btn-red">Deletar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
