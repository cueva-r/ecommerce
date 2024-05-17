@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{ url('assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">{{ $getBlog->titulo }}</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                @include('layouts._message')
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $getBlog->titulo }}</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <article class="entry single-entry">
                            <figure class="entry-media">
                                <img src="{{ $getBlog->getImagen() }}" alt="{{ $getBlog->titulo }}">
                            </figure>

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="meta-separator">|</span>
                                    <a href="javascript:;">{{ date('M d, Y', strtotime($getBlog->created_at)) }}</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">{{ $getBlog->getComentarioCount() }} Commentarios</a>
                                    @if (!empty($getBlog->getCategoria))
                                        <span class="meta-separator">|</span>
                                        <a
                                            href="{{ url('blog/categoria/' . $getBlog->getCategoria->slug) }}">{{ $getBlog->getCategoria->nombre }}</a>
                                    @endif
                                </div>
                                <br>

                                <div class="entry-content editor-content">
                                    {!! $getBlog->descripcion !!}

                                    <blockquote>
                                        <p>“ {{ $getBlog->titulo }} ”</p>
                                    </blockquote>
                                </div>
                            </div>
                        </article>

                        @if (!empty($getPostRelacionado->count()))
                            <div class="related-posts">
                                <h3 class="title">Posts relacionados</h3>

                                <div class="owl-carousel owl-simple" data-toggle="owl"
                                    data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    }
                                }
                            }'>
                                    @foreach ($getPostRelacionado as $relacionados)
                                        <article class="entry entry-grid">
                                            <figure class="entry-media">
                                                <a href="{{ url('blog/' . $relacionados->slug) }}">
                                                    <img src="{{ $relacionados->getImagen() }}"
                                                        style="height: 140px; width: 100%; object-fit: cover;"
                                                        alt="{{ $relacionados->titulo }}">
                                                </a>
                                            </figure>

                                            <div class="entry-body">
                                                <div class="entry-meta">
                                                    <a
                                                        href="#">{{ date('M d, Y', strtotime($relacionados->created_at)) }}</a>
                                                    <span class="meta-separator">|</span>
                                                    <a href="#">{{ $relacionados->getComentarioCount() }} Commentarios</a>
                                                </div>

                                                <h2 class="entry-title">
                                                    <a
                                                        href="{{ url('blog/' . $relacionados->slug) }}">{{ $relacionados->titulo }}</a>
                                                </h2>

                                                @if (!empty($relacionados->getCategoria))
                                                    <div class="entry-cats">
                                                        <a
                                                            href="{{ url('blog/categoria/' . $relacionados->getCategoria->slug) }}">
                                                            {{ $relacionados->getCategoria->nombre }}
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="comments">
                            <h3 class="title">{{ $getBlog->getComentarioCount() }} Commentarios</h3>

                            <ul>
                                @foreach ($getBlog->getComentario as $comentario)
                                <li>
                                    <div class="comment">
                                        <div class="comment-body">
                                            <div class="comment-user">
                                                <h4><a href="#">{{ $comentario->getUser->name }}</a></h4>
                                                <span class="comment-date">{{ date('M d, Y', strtotime($comentario->created_at)) }} a las {{ date('h:i A', strtotime($comentario->created_at)) }}</span>
                                            </div>

                                            <div class="comment-content">
                                                <p>{{ $comentario->comentario }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="reply">
                            <div class="heading">
                                <h3 class="title">Deja un comentario</h3>
                            </div>

                            <form action="{{ url('blog/enviar-comentario') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="blog_id" value="{{ $getBlog->id }}">
                                <label for="reply-message" class="sr-only">Commentario</label>
                                <textarea name="comentario" id="reply-message" cols="30" rows="4" class="form-control" required
                                    placeholder="Comentario *"></textarea>

                                @if (!empty(Auth::check()))
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Publicar comentario</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                @else
                                    <a href="#signin-modal" data-toggle="modal" class="btn btn-outline-primary-2">
                                        <span>Publicar comentario</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                @endif
                            </form>
                        </div>
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
