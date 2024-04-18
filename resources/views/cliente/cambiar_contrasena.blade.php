@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Cambiar contraseña</h1>
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
                                @include('layouts._message')
                                <form action="" method="POST">
                                    {{ csrf_field() }}
                                    <label>Contraseña anterior <span style="color: red">*</span></label>
                                    <input type="password" name="contrasena_anterior" class="form-control" required>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nueva contraseña <span style="color: red">*</span></label>
                                            <input type="password" name="contrasena" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Confirmar contraseña <span style="color: red">*</span></label>
                                            <input type="password" name="ccontrasena" class="form-control" required>
                                        </div>
                                    </div>

                                    <button type="submit" style="width: 200px;"
                                        class="btn btn-outline-primary-2 btn-order btn-block">
                                        Actualizar contraseña
                                    </button>
                                </form>
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
