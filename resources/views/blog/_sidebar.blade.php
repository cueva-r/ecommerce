<div class="sidebar">
    <div class="widget widget-search">
        <h3 class="widget-title">Buscar</h3>

        <form action="{{ url('blog') }}" method="GET">
            <label for="ws" class="sr-only">Buscar en blogs</label>
            <input type="text" class="form-control" {{ Request::get('buscar') }} name="buscar" id="ws"
                placeholder="Buscar en blogs" required>
            <button type="submit" class="btn">
                <i class="icon-search"></i>
                <span class="sr-only">Buscar</span>
            </button>
        </form>
    </div>

    <div class="widget widget-cats">
        <h3 class="widget-title">Categorías</h3>

        <ul>
            @foreach ($getBlogCategoria as $bcategoria)
                <li>
                    <a href="{{ url('blog/categoria/' . $bcategoria->slug) }}">{{ $bcategoria->nombre }}<span>{{ $bcategoria->getBlogCount() }}</span></a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="widget">
        <h3 class="widget-title">Posts populares</h3>

        <ul class="posts-list">
            @foreach ($getPopular as $valor)
                <li>
                    <figure>
                        <a href="{{ url('blog/' . $valor->slug) }}">
                            <img src="{{ $valor->getImagen() }}" alt="{{ $valor->titulo }}">
                        </a>
                    </figure>

                    <div>
                        <span>{{ date('M d, Y', strtotime($valor->created_at)) }}</span>
                        <h4><a href="{{ url('blog/' . $valor->slug) }}">{{ $valor->titulo }}</a></h4>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>