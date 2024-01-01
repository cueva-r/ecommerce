<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message', 'El producto ha sido eliminado.');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('success_message', 'Todos los productos se han eliminado.');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
