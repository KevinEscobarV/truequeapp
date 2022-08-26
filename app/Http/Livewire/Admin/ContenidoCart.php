<?php

namespace App\Http\Livewire\Admin;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ContenidoCart extends Component
{
    protected $listeners = ['render'];


    public function delete($rowId){
        Cart::remove($rowId);
        $this->render();
    }
    
    public function render()
    {
        return view('livewire.admin.contenido-cart');
    }
}
