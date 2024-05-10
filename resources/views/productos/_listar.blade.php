<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach ($getProducto as $valor)
            @php
                $getProductoImagen = $valor->getImagenSingle($valor->id);
            @endphp

            <div class="col-12 @if(!empty($esta_inicio)) col-md-3 col-lg-3 @else col-md-4 col-lg-4 @endif">
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <a href="{{ url($valor->slug) }}">
                            @if (!empty($getProductoImagen) && !empty($getProductoImagen->getLogo()))
                                <img style="height: 280px; width: 100%; object-fit: cover"
                                    src="{{ $getProductoImagen->getLogo() }}" alt="{{ $valor->titulo }}"
                                    class="product-image">
                            @endif
                        </a>

                        <div class="product-action-vertical">
                            @if (!empty(Auth::check()))
                                <a href="javascript:;"
                                    class="agregar_a_la_lista_de_deseos btn-agregar-listadeseos{{ $valor->id }} btn-product-icon btn-wishlist btn-expandable {{ !empty($valor->revisarListaDeDeseos($valor->id)) ? 'btn-agregar-listadeseos' : '' }}"
                                    title="Wishlist" id="{{ $valor->id }}">
                                    <span>Añadir a la lista de deseos</span>
                                </a>
                            @else
                                <a href="#signin-modal" class="btn-product-icon btn-wishlist btn-expandable"
                                    data-toggle="modal" title="Wishlist">
                                    <span>Añadir a la lista de deseos</span>
                                </a>
                            @endif
                        </div>
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
                                <div class="ratings-val" style="width: {{ $valor->getReviewRating($valor->id) }}%;">
                                </div>
                            </div>
                            <span class="ratings-text">( {{ $valor->getTotalCalificaciones() }} Reseñas )</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
