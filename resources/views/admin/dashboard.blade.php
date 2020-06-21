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
                    <h4 class="icon-users">Clientes</h4>
                    <p><b>Locadores:</b> 100</p>
                    <p><b>Locatários:</b> 100</p>
                    <p><b>Time:</b> 3</p>
                </article>

                <article class="blog radius">
                    <h4 class="icon-home">Imóveis</h4>
                    <p><b>Disponíveis:</b> 100</p>
                    <p><b>Locados:</b> 100</p>
                    <p><b>Total:</b> 200</p>
                </article>

                <article class="users radius">
                    <h4 class="icon-file-text">Contratos</h4>
                    <p><b>Oficializados:</b> 455</p>
                </article>
            </section>
        </div>
    </section>
</div>
@endsection
