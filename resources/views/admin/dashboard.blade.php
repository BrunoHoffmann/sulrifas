@extends('admin.master.master')

@section('content')
<div style="flex-basis: 100%;">
    <section class="dash_content_app">
        <header class="dash_content_app_header">
            <h2 class="icon-tachometer">Dashboard</h2>
        </header>

        <div class="dash_content_app_box">
            <section class="app_dash_home_stats">
                <article class="control radius">
                    <h4 class="icon-hourglass">Sorteios</h4>
                    <p><b>Sorteios em Aberto:</b> {{$sorteiosAberto}}   </p>
                    <p><b>Sorteios Finalizados:</b> {{$sorteiosFinalizados}}</p>
                    <p><b>Total de Sorteios:</b> {{$sorteiosTotal}}</p>
                </article>

                <article class="blog radius">
                    <h4 class="icon-money">Faturamento</h4>
                    <p><b>Faturamento deste Mês:</b> {{$faturamentoMes}}</p>
                    <p><b>Faturamento Total:</b> {{$faturamentoTotal}}</p>
                </article>

                <article class="users radius">
                    <h4 class="icon-bar-chart">Lead</h4>
                    <p><b>Total de Leads:</b> {{$leads}}</p>
                </article>
            </section>
        </div>
    </section>
</div>
@endsection
