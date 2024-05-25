@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Configuración del SMTP</h1>
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
                                        <label>Sitio web <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->name }}" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Mailer <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->mail_mailer }}" name="mail_mailer">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Host <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->mail_host }}" name="mail_host">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Port <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->mail_port }}" name="mail_port">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Username <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->mail_username }}" name="mail_username">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Password <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->mail_password }}" name="mail_password">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Encryption <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->mail_encryption }}" name="mail_encryption">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail From Adress <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->mail_from_address }}" name="mail_from_address">
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
