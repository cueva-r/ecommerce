@extends('layouts.app')

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $getPage->titulo }}</li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('{{ $getPage->getImagen() }}')">
            <h1 class="page-title text-white">{{ $getPage->titulo }}</h1>
        </div>
    </div>

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-0">
                    {!! $getPage->descripcion !!}
                </div>
            </div>

            <div class="mb-5"></div>
        </div>
    </div>
</main>
@endsection

