@extends('admin.master.master')


@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Nova Reserva</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="">Reserva</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Nova Reserva</a></li>
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

            <form class="app_form" action="{{route('cotas.store.reserva', ['id_sorteio' => $id_sorteio, 'id' => $id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="nav_tabs_content">
                    <div id="data">
                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Lead:</span>
                                    <select name="lead" id="lead" class="search js-example-basic-single" data-live-search="true">
                                        @foreach($leads as $item)
                                            <option value="{{$item->id}}">{{$item->name}} - {{$item->email}} - {{$item->phone}}</option>
                                        @endforeach
                                    </select>
                            </label>
                            <div class="text-right mt-2">
                                <a href="{{route('cotas.index', $id_sorteio)}}" class="btn btn-large btn-red">Cancelar
                                </a>
                                <button class="btn btn-large btn-green icon-check-square-o" type="submit">Reserva</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section("js")
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection
