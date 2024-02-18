@extends('layouts.app')

@section('style')

@endsection

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url($getProducto->getCategoria->slug) }}">{{ $getProducto->getCategoria->nombre }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url($getProducto->getCategoria->slug . '/' . $getProducto->getSubCategoria->slug) }}">{{ $getProducto->getSubCategoria->nombre }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $getProducto->titulo }}</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <figure class="product-main-image">
                                <img id="product-zoom" src="assets/images/products/single/extended/3.jpg" data-zoom-image="assets/images/products/single/extended/3-big.jpg" alt="product image">

                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                            </figure>

                            <div id="product-zoom-gallery" class="product-image-gallery">
                                <a class="product-gallery-item" href="#" data-image="assets/images/products/single/extended/1.jpg" data-zoom-image="assets/images/products/single/extended/1-big.jpg">
                                    <img src="assets/images/products/single/extended/1-small.jpg" alt="product side">
                                </a>

                                <a class="product-gallery-item" href="#" data-image="assets/images/products/single/extended/2.jpg" data-zoom-image="assets/images/products/single/extended/2-big.jpg">
                                    <img src="assets/images/products/single/extended/2-small.jpg" alt="product cross">
                                </a>

                                <a class="product-gallery-item active" href="#" data-image="assets/images/products/single/extended/3.jpg" data-zoom-image="assets/images/products/single/extended/3-big.jpg">
                                    <img src="assets/images/products/single/extended/3-small.jpg" alt="product with model">
                                </a>

                                <a class="product-gallery-item" href="#" data-image="assets/images/products/single/extended/4.jpg" data-zoom-image="assets/images/products/single/extended/4-big.jpg">
                                    <img src="assets/images/products/single/extended/4-small.jpg" alt="product back">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $getProducto->titulo }}</h1>

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div>
                                </div>
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reseñas )</a>
                            </div>

                            <div class="product-price mb-4">
                                S/. {{ number_format($getProducto->precio, 2) }}
                            </div>

                            <div class="product-content">
                                <p>{!! $getProducto->descripcion_corta !!}</p>
                            </div>

                            <div class="details-filter-row details-row-size">
                                <label>Color:</label>

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #eab656;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #3a588b;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #caab97;"><span class="sr-only">Color name</span></a>
                                </div>
                            </div>

                            <div class="details-filter-row details-row-size">
                                <label for="size">Size:</label>
                                <div class="select-custom">
                                    <select name="size" id="size" class="form-control">
                                        <option value="#" selected="selected">Select a size</option>
                                        <option value="s">Small</option>
                                        <option value="m">Medium</option>
                                        <option value="l">Large</option>
                                        <option value="xl">Extra Large</option>
                                    </select>
                                </div>

                                <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                            </div>

                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                </div>
                            </div>

                            <div class="product-details-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>

                                <div class="details-action-wrapper">
                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                    <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                </div><!-- End .details-action-wrapper -->
                            </div>

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Categoría:</span>
                                    <a href="{{ url($getProducto->getCategoria->slug) }}">{{ $getProducto->getCategoria->nombre }}</a>,  
                                    <a href="{{ url($getProducto->getCategoria->slug . '/' . $getProducto->getSubCategoria->slug) }}">{{ $getProducto->getSubCategoria->nombre }}</a>
                                </div>

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Compartir:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-details-tab product-details-extended">
            <div class="container">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Descripción</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Infomración adicional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Envíos & devoluciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reseñas (2)</a>
                    </li>
                </ul>
            </div><!-- End .container -->

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        <div class="container">
                            {!! $getProducto->descripcion !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="product-desc-content">
                        <div class="container">
                            {!! $getProducto->informacion_adicional !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                    <div class="product-desc-content">
                        <div class="container">
                            {!! $getProducto->envios_devoluciones !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                    <div class="reviews">
                        <div class="container">
                            <h3>Reseñas (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">6 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->

                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">5 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                        </div><!-- End .container -->
                    </div><!-- End .reviews -->
                </div>
            </div>
        </div>

        <div class="container">
            <h2 class="title text-center mb-4">También te puede interesar</h2><!-- End .title text-center -->
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
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
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                <div class="product product-7">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="product.html">
                            <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Women</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $60.00
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reseñas )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #cc9966;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #7fc5ed;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #e8c97a;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->

                <div class="product product-7">
                    <figure class="product-media">
                        <span class="product-label label-out">Out of Stock</span>
                        <a href="product.html">
                            <img src="assets/images/products/product-6.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Jackets</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Khaki utility boiler jumpsuit</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="out-price">$120.00</span>
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 6 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->

                <div class="product product-7">
                    <figure class="product-media">
                        <span class="product-label label-top">Top</span>
                        <a href="product.html">
                            <img src="assets/images/products/product-11.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Shoes</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Light brown studded Wide fit wedges</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $110.00
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 1 Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #8b513d;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #d2b99a;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->

                <div class="product product-7">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="assets/images/products/product-10.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Jumpers</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Yellow button front tea top</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $56.00
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 0 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->

                <div class="product product-7">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="assets/images/products/product-7.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Jeans</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Blue utility pinafore denim dress</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $76.00
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .owl-carousel -->
        </div>
    </div>
</main>
@endsection

@section('script')

@endsection
