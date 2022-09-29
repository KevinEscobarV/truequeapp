<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class SubTotalComponent extends Component
{
    protected $listeners = ['render'];
    
    public function render()
    {
        $subTotal = Cart::subtotal();
        return view('livewire.sub-total-component', compact('subTotal'));
    }
}
