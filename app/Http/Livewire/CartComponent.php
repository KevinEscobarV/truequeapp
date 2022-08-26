<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    protected $listeners = ['render'];

    public function remove($rowId)
    {
        Cart::remove($rowId);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
