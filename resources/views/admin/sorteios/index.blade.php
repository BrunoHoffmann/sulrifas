@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Filtro</h2>

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
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Jetta TSI 2018</td>
                    <td>Sim</td>
                    <td>120,00</td>
                    <td>13/06/2020</td>
                    <td>
                        <a href="{{Route('sorteios.edit', 1)}}" class="btn btn-blue">Editar</a>
                        <a href="{{Route('sorteios.destroy', 1)}}" class="btn btn-red">Deletar</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
