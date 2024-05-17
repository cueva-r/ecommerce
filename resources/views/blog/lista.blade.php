@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{ $getPage->getImagen() }}')">
            <div class="container">
                <h1 class="page-title">{{ $getPage->titulo }}</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item active"><a href="{{ url('blog') }}">{{ $getPage->titulo }}</a></li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="entry-container max-col-2" data-layout="fitRows">
                            @foreach ($getBlog as $valor)
                                <div class="entry-item col-sm-6">
                                    <article class="entry entry-grid">
                                        <figure class="entry-media">
                                            <a href="{{ url('blog/' . $valor->slug) }}">
                                                <img src="{{ $valor->getImagen() }}"
                                                    style="height: 300px; width: 100%; object-fit: cover;"
                                                    alt="{{ $valor->titulo }}">
                                            </a>
                                        </figure>

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <span class="meta-separator">|</span>
                                                <a
                                                    href="javascript:;">{{ date('M d, Y', strtotime($valor->created_at)) }}</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">0 Commentarios</a>
                                            </div>

                                            <h2 class="entry-title">
                                                <a href="{{ url('blog/' . $valor->slug) }}">{{ $valor->titulo }}</a>
                                            </h2>

                                            @if (!empty($valor->getCategoria))
                                                <div class="entry-cats">
                                                    En <a
                                                        href="{{ url('blog/categoria/' . $valor->getCategoria->slug) }}">
                                                        {{ $valor->getCategoria->nombre }}
                                                    </a>
                                                </div>
                                            @endif

                                            <div class="entry-content">
                                                <p>{{ $valor->descripcion_corta }}</p>
                                                <a href="{{ url('blog/' . $valor->slug) }}" class="read-more">Continuar leyendo</a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                        {!! $getBlog->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>

                    <aside class="col-lg-3">
                        @include('blog._sidebar')
                    </aside>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
@endsection
