<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchComponent extends Component
{
     
    public $search;

    public $open = false;

    public function updatedSearch($value){
        if ($value) {
            $this->open = true;
        }else{
            $this->open = false;
        }
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('name', 'LIKE' ,'%' . $this->search . '%')
                                ->take(8)
                                ->get();                      
        } else {
            $products = [];
        }
        return view('livewire.search-component', compact('products'));
    }
}
