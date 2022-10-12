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
        'createForm.slug' => 'required|string|max:255|unique:products',
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
        $this->editForm['slug'] = $product->slug;
        $this->editForm['price_in'] = $product->price_in;
        $this->editForm['price_out'] = $product->price_out;
        $this->editForm['description'] = $product->description;
        $this->editForm['material'] = $product->material;
        $this->editForm['size'] = $product->size;
        $this->editForm['stock_in'] = $product->stock_in;
        $this->editForm['stock_out'] = $product->stock_out;
        $this->editForm['provider_id'] = $product->provider_id;
        $this->editForm['category_id'] = $product->category_id;
    }

    public function update()
    {
       $this->validate([
        'editForm.name' => 'required',
        'editForm.slug' => 'required',
        'editForm.price_in' => 'required',
        'editForm.price_out' => 'required',
        'editForm.description' => 'required',
        'editForm.material' => 'required',
        'editForm.size' => 'required',
        'editForm.stock_in' => 'required',
        'editForm.stock_out' => 'required',
        'editForm.provider_id' => 'required',
        'editForm.category_id' => 'required',
       ]); 

       $this->product->update([
        'name' => $this->editForm['name'],
        'slug' => $this->editForm['slug'],
        'price_in' => $this->editForm['price_in'],
        'price_out' => $this->editForm['price_out'],
        'description' => $this->editForm['description'],
        'material' => $this->editForm['material'],
        'size' => $this->editForm['size'],
        'stock_in' => $this->editForm['stock_in'],
        'stock_out' => $this->editForm['stock_out'],
        'provider_id' => $this->editForm['provider_id'],
        'category_id' => $this->editForm['category_id'],
       ]);

       $this->reset('editForm');
       
    //    $this->getProducts();
    }

    public function delete($id)
    {
        $product = Product::find($id);
        // Eliminar imagenes
        $product->images()->delete();

        $product->delete();
    }

    public function render()
    {
        $products = Product::orderByDesc('updated_at')->paginate(20);
        return view('livewire.admin.products-component', compact('products'))->layout('layouts.admin');
    }
}
