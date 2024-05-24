@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Notificaciones</h1>
            </div>
        </div>

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <br>
                    <br>

                    <div class="row">

                        @include('cliente._sidebar')

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <table class="table table-striped" id="pedidos">
                                    <thead>
                                        <tr>
                                            <th>Mensaje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $valor)
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <a style="color: #000; {{ empty($valor->esta_leido) ? 'font-weight: bold;' : '' }}" href="{{ $valor->url }}?noti_id={{ $valor->id }}">
                                                        {{ $valor->mensaje }}
                                                    </a>
                                                    <div>
                                                        <small>
                                                            {{ date('m-d Y h:i A', strtotime($valor->created_at)) }}
                                                        </small>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float: right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
@endsection
