@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Cotas</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Sorteios</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dash_content_app_box">
        <a href="{{route('sorteios.index')}}" class="btn btn-large btn-red">Cancelar
        </a>
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Número</th>
                    <th>status</th>
                    <th>Comprador</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cotas as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->number}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->leadName}}</td>
                    <td>
                        <a href="{{Route('cotas.livre',['id_sorteio' => $id_sorteio, 'id' => $item->id])}}" class="btn btn-white">Livre</a>
                        <a href="{{Route('cotas.reservar', ['id_sorteio' => $id_sorteio, 'id' => $item->id])}}" class="btn btn-blue">Reservar</a>
                        <a href="{{Route('cotas.pago', ['id_sorteio' => $id_sorteio, 'id' => $item->id])}}" class="btn btn-green">Pago</a>
                        <a href="{{Route('cotas.ganhador', ['id_sorteio' => $id_sorteio, 'id' => $item->id])}}" class="btn btn-yellow">Ganhador</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
