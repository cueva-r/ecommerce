<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);                
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);        
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);        
        session()->flash('success_message','El producto ha sido eliminado.');        
    } 

    public function destroyAll()
{
	Cart::destroy();
	session()->flash('success_message','Todos los priductos se han eliminado.');      
}

    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
