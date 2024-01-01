<div class="wrap-icon-section minicart">
    <a href="/cart" class="link-direction">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <div class="left-info">
            @if (Cart::instance('cart')->count() > 0)
                <span class="index">{{ Cart::instance('cart')->count() }} productos</span>
            @endif
            <span class="title">Carrito</span>
        </div>
    </a>
</div>