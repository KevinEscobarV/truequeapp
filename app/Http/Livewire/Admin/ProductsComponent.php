<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\Provider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ProductsComponent extends Component
{
    use WithFileUploads;

    public $images = [];

    public $edit_images = [];

    public $product, $providers, $provider, $categories, $percent = 30;

    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null,
        'slug' => null,
        'price_in' => null,
        'price_out' => null,
        'description' => null,
        'material' => null,
        'size' => null,
        'stock_in' => null,
        'stock_out' => null,
        'provider_id' => '',
        'category_id' => '',
    ];

    public $editForm=[
        'open' => false,
        'name' => null,
        'slug' => null,
        'price_in' => null,
        'price_out' => null,
        'description' => null,
        'material' => null,
        'size' => null,
        'stock_in' => null,
        'stock_out' => null,
        'provider_id' => '',
        'category_id' => '',
    ];

    public $rules=[
        'createForm.name' => 'required|string|max:255',
        'createForm.slug' => 'required',
        'createForm.price_in' => 'required',
        'createForm.price_out' => 'required',
        'createForm.description' => 'required',
        'createForm.material' => 'required',
        'createForm.size' => 'required',
        'createForm.stock_in' => 'required',
        'createForm.stock_out' => 'required',
        'createForm.provider_id' => 'required',
        'createForm.category_id' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function updatedCreateFormName($value)
    {
        $this->createForm['slug'] = Str::slug($value);
    }

    public function updatedCreateFormPriceIn($value)
    {
        $valor_agregado = ($this->percent*$value)/100;
        $this->createForm['price_out'] = $value + $valor_agregado;
    }

    public function updatedPercent($value)
    {
        $valor_agregado = ($value*$this->createForm['price_in'])/100;
        $this->createForm['price_out'] = $this->createForm['price_in'] + $valor_agregado;
    }

    public function mount()
    {
        // $this->getProducts();
        $this->getProviders();
        $this->getCategories();
    }

    // public function getProducts()
    // {
    //     $this->products = Product::all();
    // }

    public function getProviders()
    {
        $this->providers = Provider::all();
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

    public function save()
    {
        $this->validate();
        $product = Product::create($this->createForm);
        foreach ($this->images as $image) {
            $url = $image->store('products');
            ImageProduct::create([
                'url' => $url,
                'product_id' => $product->id,
            ]);
        }
        $this->reset('createForm');
        // $this->getProducts();
    }

    public function edit($id)
    {
        $this->product = Product::find($id);
        $product = $this->product;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $product->name;
        $this->editForm['price'] = $product->price;
        $this->editForm['description'] = $product->description;
        $this->editForm['material'] = $product->material;
        $this->editForm['size'] = $product->size;
        $this->editForm['provider_id'] = $product->provider_id;
        
    }

    public function update()
    {
       $this->validate([
        'editForm.name' => 'required',
        'editForm.price' => 'required',
        'editForm.description' => 'required',
        'editForm.material' => 'required',
        'editForm.size' => 'required',
        'editForm.provider_id' => 'required',
       ]); 

       $this->product->update([
        'name' => $this->editForm['name'],
        'price' => $this->editForm['price'],
        'description' => $this->editForm['description'],
        'material' => $this->editForm['material'],
        'size' => $this->editForm['size'],
        'provider_id' => $this->editForm['provider_id'],
       ]);

       $this->reset('editForm');
       
    //    $this->getProducts();
    }

    public function delete($id)
    {
        // $product = Product::find($id);
        // $product->delete();
        Product::destroy($id);
        // $this->getProducts();
    }

    public function render()
    {
        $products = Product::orderByDesc('updated_at')->paginate(20);
        return view('livewire.admin.products-component', compact('products'))->layout('layouts.admin');
    }
}
