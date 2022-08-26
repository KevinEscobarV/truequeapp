<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class InventarioComponent extends Component
{
    protected $queryString =['search' => ['except' => '']];
    public $search = '';
    public $perPage = '10';

    public function render()
    {
        $products_max_cant = Product::orderBy('stock_in', 'desc')->take(10)->get();
        
        $products = Product::where('name', 'LIKE', "%{$this->search}%" )
        ->orWhere('price_in', 'LIKE', "%{$this->search}%")
        ->orWhere('description', 'LIKE', "%{$this->search}%")
        ->orWhere('material', 'LIKE', "%{$this->search}%")
        ->orWhere('size', 'LIKE', "%{$this->search}%")
        ->orderBy('name')
        ->paginate($this->perPage);
        return view('livewire.admin.inventario-component', compact('products', 'products_max_cant'))->layout('layouts.admin');
    }
}
