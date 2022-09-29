<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartItem extends Component
{
    public Product $product;
    public $options = ['image' => ''];

    public function mount()
    {
        $this->options['image'] = Storage::url($this->product->images->first()->url);
        $this->options['size'] = $this->product->size;
    }

    public function addItem(){

        Cart::add([
        'id' => $this->product->id, 
        'name' => $this->product->name, 
        'qty' => 1, 
        'price' => $this->product->price_out, 
        'weight' => 100,
        'options' => $this->options
        ]);

        $this->emitTo('cart-component', 'render');
        $this->emitTo('sub-total-component', 'render');
    }


    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
