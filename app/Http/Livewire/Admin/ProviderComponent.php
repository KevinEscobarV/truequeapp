<?php

namespace App\Http\Livewire\Admin;

use App\Models\Provider;
use Livewire\Component;

class ProviderComponent extends Component
{

    public $provider;

    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null,
        'last_name' => null,
        'city' => null,
        'description' => null,
        'phone'=> null,
    ];

    public $editForm=[
        'open' => false,
        'name' => null,
        'last_name' => null,
        'city' => null,
        'description' => null,
        'phone'=> null,
    ];

    public $rules=[
        'createForm.name' => 'required',
        'createForm.last_name' => 'required',
        'createForm.city' => 'required',
        'createForm.description' => 'required',
        'createForm.phone' => 'required',
    ];



    // public function mount()
    // {
    //     $this->getProviders();
    // }

    // public function getProviders()
    // {
    //     $this->providers = Provider::all();
    // }

    public function save()
    {
        $this->validate();
        Provider::create($this->createForm);
        $this->reset('createForm');
        // $this->getProviders();
    }

    public function edit(Provider $provider)
    {
        $this->provider = $provider;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $provider->name;
        $this->editForm['last_name'] = $provider->last_name;
        $this->editForm['city'] = $provider->city;
        $this->editForm['description'] = $provider->description;
        $this->editForm['phone'] = $provider->phone;
        
    }

    public function update()
    {
       $this->validate([
        'editForm.name' => 'required',
        'editForm.last_name' => 'required',
        'editForm.city' => 'required',
        'editForm.description' => 'required',
        'editForm.phone' => 'required',
       ]); 

       $this->provider->update($this->editForm);
       $this->reset('editForm');
    //    $this->getProviders();
    }

    public function delete(Provider $provider)
    {
        $provider->delete();

        // $this->getProviders();
    }

    public function render()
    {
        $providers = Provider::paginate(15);
        return view('livewire.admin.provider-component', compact('providers'))->layout('layouts.admin');
    }
}
