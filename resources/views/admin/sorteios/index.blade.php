@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Sorteios</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Sorteios</a></li>
                </ul>
            </nav>

            <a href="{{ route('sorteios.create') }}" class="btn btn-orange icon-user ml-1">Criar Sorteio</a>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ativo</th>
                    <th>Valor</th>
                    <th>Data Sorteio</th>
                    <th>Ganhador</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sorteios as $sorteio)
                <tr>
                    <td>{{$sorteio->id}}</td>
                    <td>{{$sorteio->name}}</td>
                    <td>{{($sorteio->active) ? 'sim' : 'Não'}}</td>
                    <td>{{$sorteio->value}}</td>
                    <td>{{$sorteio->data_sorteio}}</td>
                    <td>{{$sorteio->ganhador}}</td>
                    <td>
                        <a href="{{Route('cotas.index', $sorteio->id)}}" class="btn btn-green">Cotas</a>
                        <a href="{{Route('sorteios.edit', $sorteio->id)}}" class="btn btn-blue">Editar</a>
                        <a href="{{Route('sorteios.destroy', $sorteio->id)}}" class="btn btn-red">Deletar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
