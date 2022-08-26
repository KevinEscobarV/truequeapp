<?php

use App\Http\Controllers\PDFController;
use App\Http\Livewire\Admin\AgregarProductoFactura;
use App\Http\Livewire\Admin\FacturaComponent;
use App\Http\Livewire\Admin\InventarioComponent;
use App\Http\Livewire\Admin\ProductsComponent;
use App\Http\Livewire\Admin\ProviderComponent;
use Illuminate\Support\Facades\Route;

Route::get('products', ProductsComponent::class)->name('admin.products');

Route::get('proveedores', ProviderComponent::class)->name('admin.providers');

Route::get('factura/{factura}', [PDFController::class,'factura'])->name('admin.factura');

Route::get('factura', FacturaComponent::class)->name('admin.facturas');

Route::get('inventario', InventarioComponent::class)->name('admin.inventario');