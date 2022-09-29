<?php

use App\Http\Controllers\PDFController;
use App\Http\Livewire\Admin\AgregarProductoFactura;
use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\Admin\FacturaComponent;
use App\Http\Livewire\Admin\InventarioComponent;
use App\Http\Livewire\Admin\ProductsComponent;
use App\Http\Livewire\Admin\ProviderComponent;
use App\Http\Livewire\Admin\RolesComponent;
use App\Http\Livewire\Admin\UserComponent;
use App\Http\Livewire\Admin\UserEdit;
use Illuminate\Support\Facades\Route;


Route::get('products', ProductsComponent::class)->name('admin.products');

Route::get('proveedores', ProviderComponent::class)->name('admin.providers');

Route::get('categorias', CategoryComponent::class)->name('admin.categories');

Route::get('factura/{factura}', [PDFController::class,'factura'])->name('admin.factura');

Route::get('factura', FacturaComponent::class)->name('admin.facturas');

Route::get('inventario', InventarioComponent::class)->name('admin.inventario');

Route::get('usuarios', UserComponent::class)->name('admin.usuarios');

Route::get('roles', RolesComponent::class)->name('admin.roles');

Route::get('usuarios/edit/{user}', UserEdit::class)->name('admin.usuarios.edit');