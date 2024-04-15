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

                                <p>Hello <span class="font-weight-normal text-dark">User</span> (not <span
                                        class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>)
                                    <br>
                                    From your account dashboard you can view your <a href="#tab-orders"
                                        class="tab-trigger-link link-underline">recent orders</a>, manage your <a
                                        href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>,
                                    and <a href="#tab-account" class="tab-trigger-link">edit your password and account
                                        details</a>.
                                </p>
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
