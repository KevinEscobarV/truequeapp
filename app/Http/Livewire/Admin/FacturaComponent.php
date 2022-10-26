<?php

namespace App\Http\Livewire\Admin;

use App\Models\Factura;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class FacturaComponent extends Component
{
    public $facturas;

    public $createForm = [
        'nombre' => null,
        'direccion' => null,
        'email' => null,
        'telefono' => null,
        'nit' => null,
        'contenido' => null,
        'type' => '',
    ];

    public $rules = [
        'createForm.nombre' => 'required',
        'createForm.direccion' => 'required',
        'createForm.email' => 'required',
        'createForm.telefono' => 'required',
        'createForm.nit' => 'required',
        'createForm.contenido' => 'required',
        'createForm.type' => 'required',
    ];

    public function mount()
    {
        $this->getFacturas();
    }

    public function getFacturas()
    {
        $this->facturas = Factura::all();
    }

    public function save()
    {
        $this->createForm['contenido'] = Cart::content();
        $this->validate();

        $ref = $this->createForm['type'] == 'factura' ? 'FE' : 'CO';

        Factura::create([
                'ref' => $ref . time(), 
                'nombre' => $this->createForm['nombre'],
                'direccion' => $this->createForm['direccion'],
                'email' => $this->createForm['email'],
                'telefono' => $this->createForm['telefono'],
                'nit' => $this->createForm['nit'],
                'contenido' => $this->createForm['contenido'],
                'type' => $this->createForm['type'],
        ]);

        $this->reset('createForm');

        $this->getFacturas();

        Cart::destroy();

        $this->emitTo('admin.contenido-cart', 'render');
    }


    public function render()
    {
        return view('livewire.admin.factura-component')->layout('layouts.admin');
    }
}
