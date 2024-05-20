@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Configuración del sistema de inicio</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('layouts._message')
                        <div class="card card-primary">
                            <form action="" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Productos en tedencia título <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->productos_tendencia_titulo }}" name="productos_tendencia_titulo">
                                    </div>

                                    <div class="form-group">
                                        <label>Comprar por categorías título <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->comprar_por_categorias_titulo }}"
                                            name="comprar_por_categorias_titulo">
                                    </div>

                                    <div class="form-group">
                                        <label>Recién agregados título <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->recien_agregados_tiutlo }}"
                                            name="recien_agregados_tiutlo">
                                    </div>

                                    <div class="form-group">
                                        <label>De nuestro blog título <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->nuestro_blog_titulo }}" name="nuestro_blog_titulo">
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Pago y entrega título <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->pago_entrega_titulo }}" name="pago_entrega_titulo">
                                    </div>

                                    <div class="form-group">
                                        <label>Pago y entrega descripción <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->pago_entrega_descripcion }}"
                                            name="pago_entrega_descripcion">
                                    </div>

                                    <div class="form-group">
                                        <label>Pago y entrega imágen <span style="color: red;">*</span></label>
                                        <input type="file" class="form-control" name="pago_entrega_imagen">
                                        @if (!empty($getRecord->getPagoImagen()))
                                            <br>
                                            <div class="col-lg-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <img src="{{ $getRecord->getPagoImagen() }}" style="width: 200px;">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Reembolso de vuelta título <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->reembolso_titulo }}" name="reembolso_titulo">
                                    </div>

                                    <div class="form-group">
                                        <label>Reembolso de vuelta descripción <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->reembolso_descripcion }}"
                                            name="reembolso_descripcion">
                                    </div>

                                    <div class="form-group">
                                        <label>Reembolso de vuelta imágen <span style="color: red;">*</span></label>
                                        <input type="file" class="form-control" name="reembolso_imagen">
                                        @if (!empty($getRecord->getReembolsoImagen()))
                                            <br>
                                            <div class="col-lg-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <img src="{{ $getRecord->getReembolsoImagen() }}" style="width: 200px;">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Soporte de calidad título <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->soporte_titulo }}" name="soporte_titulo">
                                    </div>

                                    <div class="form-group">
                                        <label>Soporte de calidad descripción <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->soporte_descripcion }}"
                                            name="soporte_descripcion">
                                    </div>

                                    <div class="form-group">
                                        <label>Soporte de calidad imágen <span style="color: red;">*</span></label>
                                        <input type="file" class="form-control" name="soporte_imagen">
                                        @if (!empty($getRecord->getSoporteImagen()))
                                            <br>
                                            <div class="col-lg-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <img src="{{ $getRecord->getSoporteImagen() }}" style="width: 200px;">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Registrese título <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->signup_titulo }}" name="signup_titulo">
                                    </div>

                                    <div class="form-group">
                                        <label>Registrese descripción <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ $getRecord->signup_descripcion }}"
                                            name="signup_descripcion">
                                    </div>

                                    <div class="form-group">
                                        <label>Registrese imágen <span style="color: red;">*</span></label>
                                        <input type="file" class="form-control" name="signup_imagen">
                                        @if (!empty($getRecord->getSignupImagen()))
                                            <br>
                                            <div class="col-lg-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <img src="{{ $getRecord->getSignupImagen() }}" style="width: 200px;">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
