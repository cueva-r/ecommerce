<?php

namespace App\Livewire;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.wishlist-count-component');
    }
}
