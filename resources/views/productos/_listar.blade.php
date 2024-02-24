<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach ($getProducto as $valor)
            <div class="col-12 col-md-4 col-lg-4">
                <div class="product product-7 text-center">
                    @php
                        $getProductoImagen = $valor->getImagenSingle($valor->id);
                    @endphp
                    <figure class="product-media">
                        <a href="{{ url($valor->slug) }}">
                            @if (!empty($getProductoImagen) && !empty($getProductoImagen->getLogo()))
                                <img style="height: 280px; width: 100%; object-fit: cover"
                                    src="{{ $getProductoImagen->getLogo() }}" alt="{{ $valor->titulo }}"
                                    class="product-image">
                            @endif
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Agregar a
                                    la lista de desos</span></a>
                            {{-- <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Ver</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Comparar</span></a> --}}
                        </div>

                        {{-- <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>Agregar al carrito</span></a>
                        </div> --}}
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a
                                href="{{ url($valor->categoria_slug . '/' . $valor->subcategoria_slug) }}">{{ $valor->subcategoria_nombre }}</a>
                        </div>
                        <h3 class="product-title"><a href="{{ url($valor->slug) }}">{{ $valor->titulo }}</a></h3>
                        <div class="product-price">
                            S/. {{ number_format($valor->precio, 2) }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div>
                            </div>
                            <span class="ratings-text">( 2 Reseñas )</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>