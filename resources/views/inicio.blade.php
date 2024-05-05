@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="intro-section bg-lighter pt-5 pb-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                            <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside"
                                data-toggle="owl"
                                data-owl-options='{
                                        "nav": false, 
                                        "responsive": {
                                            "768": {
                                                "nav": true
                                            }
                                        }
                                    }'>

                                @foreach ($getSliders as $slider)
                                    @if (!empty($slider->getImagen()))
                                        <div class="intro-slide">
                                            <figure class="slide-image">
                                                <picture>
                                                    <source media="(max-width: 480px)" srcset="{{ $slider->getImagen() }}">
                                                    <img src="{{ $slider->getImagen() }}" alt="{{ $slider->titulo }}">
                                                </picture>
                                            </figure>

                                            <div class="intro-content">
                                                <h1 class="intro-title">{!! $slider->titulo !!}</h1>
                                                @if (!empty($slider->linl_button) && !empty($slider->nombre_button))
                                                    <a href="{{ $slider->link_button }}" class="btn btn-outline-white">
                                                        <span>{{ $slider->nombre_button }}</span>
                                                        <i class="icon-long-arrow-right"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <span class="slider-loader"></span>
                        </div>
                    </div>
                </div>

                <div class="mb-6"></div>

                <div class="owl-carousel owl-simple" data-toggle="owl"
                    data-owl-options='{
                            "nav": false, 
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                    <a href="#" class="brand">
                        <img src="assets/images/brands/1.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/2.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/3.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/4.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/5.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/6.png" alt="Brand Name">
                    </a>
                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div>

        <div class="mb-6"></div>

        <div class="container">
            <div class="heading heading-center mb-3">
                <h2 class="title-lg">Trendy Products</h2><!-- End .title -->

                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab"
                            role="tab" aria-controls="trendy-all-tab" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trendy-fur-link" data-toggle="tab" href="#trendy-fur-tab" role="tab"
                            aria-controls="trendy-fur-tab" aria-selected="false">Furniture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trendy-decor-link" data-toggle="tab" href="#trendy-decor-tab"
                            role="tab" aria-controls="trendy-decor-tab" aria-selected="false">Decor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trendy-light-link" data-toggle="tab" href="#trendy-light-tab"
                            role="tab" aria-controls="trendy-light-tab" aria-selected="false">Lighting</a>
                    </li>
                </ul>
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel"
                    aria-labelledby="trendy-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-1-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Butler Stool Ladder</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $251,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->

                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-2-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-2-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Octo 4240</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $746,00
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #1f1e18;"><span
                                            class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #e8e8e8;"><span class="sr-only">Color
                                            name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->

                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-new">NEW</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-3-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-3-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Flow Slim Armchair</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $970,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->

                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-sale">30% OFF</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-4-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-4-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Roots Sofa Bed</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">$337,00</span>
                                    <span class="old-price">Was $449,00</span>
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #878883;"><span
                                            class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #dfd5c2;"><span class="sr-only">Color
                                            name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->

                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-5-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-5-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Petite Table Lamp</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $675,00
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #74543e;"><span
                                            class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #e8e8e8;"><span class="sr-only">Color
                                            name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->

                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-6-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-6-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Elephant Armchair</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $457,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->

                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-1-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Butler Stool Ladder</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $251,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="trendy-fur-tab" role="tabpanel" aria-labelledby="trendy-fur-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-new">NEW</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-3-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-3-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Flow Slim Armchair</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $970,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->

                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-sale">30% OFF</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-4-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-4-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Roots Sofa Bed</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">$337,00</span>
                                    <span class="old-price">Was $449,00</span>
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #878883;"><span
                                            class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #dfd5c2;"><span class="sr-only">Color
                                            name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="trendy-decor-tab" role="tabpanel"
                    aria-labelledby="trendy-decor-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-1-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Butler Stool Ladder</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $251,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-6-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-6-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Elephant Armchair</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $457,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="trendy-light-tab" role="tabpanel"
                    aria-labelledby="trendy-light-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-2-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-2-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Octo 4240</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $746,00
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #1f1e18;"><span
                                            class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #e8e8e8;"><span class="sr-only">Color
                                            name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-5-1.jpg" alt="Product image"
                                        class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-5-2.jpg" alt="Product image"
                                        class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">Petite Table Lamp</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    $675,00
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #74543e;"><span
                                            class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #e8e8e8;"><span class="sr-only">Color
                                            name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div>

        <div class="container categories pt-6">
            <h2 class="title-lg text-center mb-4">Shop by Categories</h2><!-- End .title-lg text-center -->

            <div class="row">
                <div class="col-6 col-lg-4">
                    <div class="banner banner-display banner-link-anim">
                        <a href="#">
                            <img src="assets/images/banners/home/banner-1.jpg" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Outdoor</a></h3>
                            <!-- End .banner-title -->
                            <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                <div class="col-6 col-lg-4 order-lg-last">
                    <div class="banner banner-display banner-link-anim">
                        <a href="#">
                            <img src="assets/images/banners/home/banner-4.jpg" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Lighting</a></h3>
                            <!-- End .banner-title -->
                            <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                <div class="col-sm-12 col-lg-4 banners-sm">
                    <div class="row">
                        <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                            <a href="#">
                                <img src="assets/images/banners/home/banner-2.jpg" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-title text-white"><a href="#">Furniture and Design</a></h3>
                                <!-- End .banner-title -->
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->

                        <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                            <a href="#">
                                <img src="assets/images/banners/home/banner-3.jpg" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-title text-white"><a href="#">Kitchen & Utensil</a></h3>
                                <!-- End .banner-title -->
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div>
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div>

        <div class="mb-5"></div>


        <div class="container">
            <div class="heading heading-center mb-6">
                <h2 class="title">Recent Arrivals</h2><!-- End .title -->

                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab"
                            role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="top-fur-link" data-toggle="tab" href="#top-fur-tab" role="tab"
                            aria-controls="top-fur-tab" aria-selected="false">Furniture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="top-decor-link" data-toggle="tab" href="#top-decor-tab" role="tab"
                            aria-controls="top-decor-tab" aria-selected="false">Decor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="top-light-link" data-toggle="tab" href="#top-light-tab" role="tab"
                            aria-controls="top-light-tab" aria-selected="false">Lighting</a>
                    </li>
                </ul>
            </div><!-- End .heading -->

            <div class="tab-content">
                <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel"
                    aria-labelledby="top-all-link">
                    <div class="products">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-12-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-12-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Block Side Table/Trolley</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $229,00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #e8e8e8;"><span class="sr-only">Color
                                                    name</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-10-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-10-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Carronade Suspension Lamp</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $892,00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #e8e8e8;"><span
                                                    class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">Color
                                                    name</span></a>
                                        </div><!-- End .product-nav -->

                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">NEW</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-9-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-9-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Garden Armchair</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $94,00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-8-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-8-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Madra Log Holder</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $104,00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #927764;"><span class="sr-only">Color
                                                    name</span></a>
                                        </div><!-- End .product-nav -->

                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-11-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-11-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Original Outdoor Beanbag</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $259,00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-13-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-13-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">2-Seater</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $3.107,00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-14-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-14-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Wingback Chair</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $2.486,00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #999999;"><span
                                                    class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #cc9999;"><span class="sr-only">Color
                                                    name</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">NEW</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-16-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-16-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Decor</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Cushion Set 3 Pieces</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $199,00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-fur-tab" role="tabpanel" aria-labelledby="top-fur-link">
                    <div class="products">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">NEW</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-9-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-9-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Garden Armchair</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $94,00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-12-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-12-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Block Side Table/Trolley</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $229,00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #e8e8e8;"><span class="sr-only">Color
                                                    name</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-13-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-13-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">2-Seater</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $3.107,00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-decor-tab" role="tabpanel" aria-labelledby="top-decor-link">
                    <div class="products">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-8-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-8-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Madra Log Holder</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $104,00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #927764;"><span class="sr-only">Color
                                                    name</span></a>
                                        </div><!-- End .product-nav -->

                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-11-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-11-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Original Outdoor Beanbag</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $259,00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-14-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-14-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Wingback Chair</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $2.486,00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #999999;"><span
                                                    class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #cc9999;"><span class="sr-only">Color
                                                    name</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-light-tab" role="tabpanel" aria-labelledby="top-light-link">
                    <div class="products">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-10-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-10-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Carronade Suspension Lamp</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $892,00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #e8e8e8;"><span
                                                    class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">Color
                                                    name</span></a>
                                        </div><!-- End .product-nav -->

                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">NEW</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-2/products/product-16-1.jpg"
                                                alt="Product image" class="product-image">
                                            <img src="assets/images/demos/demo-2/products/product-16-2.jpg"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Decor</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Cushion Set 3 Pieces</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            $199,00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
            <div class="more-container text-center">
                <a href="#" class="btn btn-outline-darker btn-more"><span>Load more products</span><i
                        class="icon-long-arrow-down"></i></a>
            </div><!-- End .more-container -->
        </div>

        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                            <p>Free shipping for orders over $50</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rotate-left"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                            <p>Free 100% money back guarantee</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                            <p>Alway online feedback 24/7</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div><!-- End .row -->

            <div class="mb-2"></div><!-- End .mb-2 -->
        </div>
        <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
            <div class="container">
                <h2 class="title-lg text-center mb-3 mb-md-4">From Our Blog</h2><!-- End .title-lg text-center -->

                <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="assets/images/blog/home/post-1.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body pb-4 text-center">
                            <div class="entry-meta">
                                <a href="#">Nov 22, 2018</a>, 0 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">Sed adipiscing ornare.</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
                                    hendrerit.<br>Pelletesque aliquet nibh necurna. </p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="assets/images/blog/home/post-2.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body pb-4 text-center">
                            <div class="entry-meta">
                                <a href="#">Dec 12, 2018</a>, 0 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">Fusce lacinia arcuet nulla.</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Sed pretium, ligula sollicitudin laoreet<br>viverra, tortor libero sodales leo, eget
                                    blandit nunc tortor eu nibh. Nullam mollis justo. </p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="assets/images/blog/home/post-3.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body pb-4 text-center">
                            <div class="entry-meta">
                                <a href="#">Dec 19, 2018</a>, 2 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">Quisque volutpat mattis eros.</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae
                                    luctus metus libero eu augue. </p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .owl-carousel -->
            </div><!-- container -->

            <div class="more-container text-center mb-0 mt-3">
                <a href="blog.html" class="btn btn-outline-darker btn-more"><span>View more articles</span><i
                        class="icon-long-arrow-right"></i></a>
            </div><!-- End .more-container -->
        </div>
        <div class="cta cta-display bg-image pt-4 pb-4"
            style="background-image: url(assets/images/backgrounds/cta/bg-6.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9 col-xl-8">
                        <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                            <div class="col">
                                <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3><!-- End .cta-title -->
                                <p class="cta-desc text-white">Molla presents the best in interior design</p>
                                <!-- End .cta-desc -->
                            </div><!-- End .col -->

                            <div class="col-auto">
                                <a href="login.html" class="btn btn-outline-white"><span>SIGN UP</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .col-auto -->
                        </div><!-- End .row no-gutters -->
                    </div><!-- End .col-md-10 col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>
    </main>
@endsection
