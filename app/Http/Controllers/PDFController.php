<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    public function factura(Factura $factura)
    {           
        $factura = $factura;

        $suma = 0;

        $productos = json_decode($factura->contenido);

        foreach ($productos as $pruducto) {
            $suma = ($pruducto->price * $pruducto->qty) + $suma;
        }

        // $suam = $productos->sum('price');

        $datos=compact('factura', 'productos', 'suma');

        $pdf=PDF::loadView('factura.factura', $datos);
        return $pdf->stream();

    }
}
