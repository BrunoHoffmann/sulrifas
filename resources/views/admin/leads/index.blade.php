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
                    <li><a href="" class="text-orange">Bancos</a></li>
                </ul>
            </nav>

            <a href="{{ route('users.create') }}" class="btn btn-orange icon-user ml-1">Criar banco</a>
        </div>
    </header>

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
                </thead>
                <tbody>
                @foreach($leads as $lead)
                <tr>
                    <td>{{$lead->id}}</td>
                    <td>{{$lead->name}}</td>
                    <td>{{$lead->email}}</td>
                    <td>{{$lead->phone}}</td>
                    <td>
                        <a href="{{Route('users.edit', $lead->id)}}" class="btn btn-blue">Editar</a>
                        <a href="{{Route('users.destroy', $lead->id)}}" class="btn btn-red">Deletar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
