<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AgregarProductoFactura extends Component
{
    // public $products;
    protected $queryString =['search' => ['except' => '']];
    public $search = '';
    public $perPage = '10';

    public $qty=0;

    // public function mount()
    // {
    //     $this->getProducts();
    // }

    // public function getProducts()
    // {
    //     $this->products = Product::all();
    // }

    public function mas()
    {
        $this->qty++;
    }

    public function menos()
    {
        $this->qty--;
    }

    public function addItem($id){
        $product = Product::find($id);
        Cart::add([         
        'id' => $product->id, 
        'name' => $product->name, 
        'qty' => $this->qty, 
        'price' => $product->price_out, 
        'weight' => 100,
        'options' => ['size' => $product->size]       
        ]);

        $this->reset('qty');

        $this->emitTo('admin.contenido-cart', 'render');

    }

    public function render()
    {
        $products = Product::where('name', 'LIKE', "%{$this->search}%" )
        ->orWhere('description', 'LIKE', "%{$this->search}%")
        ->orWhere('material', 'LIKE', "%{$this->search}%")
        ->orWhere('size', 'LIKE', "%{$this->search}%")
        ->orderBy('name')
        ->paginate($this->perPage);
        return view('livewire.admin.agregar-producto-factura', compact('products'));
    }
}
