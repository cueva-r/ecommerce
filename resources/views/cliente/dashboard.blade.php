@extends('layouts.app')

@section('style')
    <style>
        .box-btn{
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
        }
    </style>
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Dashboard</h1>
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
                                <div class="row">
                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px; font-weight: bold;">{{ $totalPedidosCliente }}</div>
                                            <div style="font-weight: 16px;">Pedidos totales</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px; font-weight: bold;">{{ $totalPedidosHoyCliente }}</div>
                                            <div style="font-weight: 16px;">Pedidos de hoy</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px; font-weight: bold;">s/. {{ number_format($cantidadTotalCliente, 2) }}</div>
                                            <div style="font-weight: 16px;">Cantidad total</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px; font-weight: bold;">s/. {{ number_format($cantidadTotalHoyCliente, 2) }}</div>
                                            <div style="font-weight: 16px;">Cantidad total hoy</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px; font-weight: bold;"> {{ $estadoPedidoClientePendiente }} </div>
                                            <div style="font-weight: 16px;">Pedidos pendientes</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px; font-weight: bold;">{{ $estadoPedidoClienteEnProgreso }}</div>
                                            <div style="font-weight: 16px;">Pedidos en progreso</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px; font-weight: bold;">{{ $estadoPedidoClienteCompletado }}</div>
                                            <div style="font-weight: 16px;">Pedidos completados</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px; font-weight: bold;">{{ $estadoPedidoClienteCancelado }}</div>
                                            <div style="font-weight: 16px;">Pedidos cancelados</div>
                                        </div>
                                    </div>
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
