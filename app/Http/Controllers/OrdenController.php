<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrdenController extends Controller
{
    public function orden()
    {
        $referencia = Str::slug(auth()->user()->name . '-' . auth()->user()->id . '-' . now());
        $total = Cart::total(2, '', '');
        $url_respueta = route('respuesta', $referencia);
        $public_key = env('PUB_WOMPI_KEY');
        $currency = env('CURRENCY_WOMPI');
        $wompi_integridad = env('INTEGRIDAD_WOMPI');
        $integridad = hash('sha256', $referencia . $total . $currency . $wompi_integridad);

        return view('ordenes.orden', compact('referencia', 'total', 'url_respueta', 'public_key', 'currency', 'integridad'));
    }

    public function estadoPago()
    {
        return view('ordenes.estadoPago');
    }
}
