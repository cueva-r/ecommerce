<div class="products">
    @php
        $esta_inicio = 1;
    @endphp
    @include('productos._listar')
</div>
<div class="more-container text-center">
    <a href="{{ url($getCategoria->slug) }}" class="btn btn-outline-darker btn-more">
        <span>Ver más productos</span>
        <i class="icon-long-arrow-down"></i>
    </a>
</div>