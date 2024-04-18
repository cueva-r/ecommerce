@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Editar perfil</h1>
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
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nombres <span style="color: red">*</span></label>
                                            <input type="text" value="{{ $getRecord->name }}" name="nombres" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Apellidos <span style="color: red">*</span></label>
                                            <input type="text" value="{{ $getRecord->apellidos }}" name="apellidos" class="form-control" required>
                                        </div>
                                    </div>

                                    <label>Correo electrónico <span style="color: red">*</span></label>
                                    <input type="email" value="{{ $getRecord->email }}" name="email" class="form-control" readonly>

                                    <label>Nombre de compañía (Opcional)</label>
                                    <input type="text" value="{{ $getRecord->nombre_compania }}" name="nombre_compania" class="form-control">

                                    <label>País <span style="color: red">*</span></label>
                                    <input type="text" value="{{ $getRecord->pais }}" name="pais" class="form-control" required>

                                    <label>Dirección <span style="color: red">*</span></label>
                                    <input type="text" value="{{ $getRecord->primera_direccion }}" class="form-control" name="primera_direccion"
                                        placeholder="Número de casa y nombre de la calle" required>
                                    <input type="text" value="{{ $getRecord->segunda_direccion }}" class="form-control" name="segunda_direccion"
                                        placeholder="Apartamentos, suite, unidad etc..." required>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Ciudad <span style="color: red">*</span></label>
                                            <input type="text" value="{{ $getRecord->ciudad }}" name="ciudad" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Distrito <span style="color: red">*</span></label>
                                            <input type="text" value="{{ $getRecord->distrito }}" name="distrito" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Código postal <span style="color: red">*</span></label>
                                            <input type="text" value="{{ $getRecord->codigo_postal }}" name="codigo_postal" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Teléfono <span style="color: red">*</span></label>
                                            <input type="tel" value="{{ $getRecord->telefono }}" name="telefono" class="form-control" required>
                                        </div>
                                    </div>

                                    <button type="submit" style="width: 100px;"
                                        class="btn btn-outline-primary-2 btn-order btn-block">
                                        Actualizar
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
