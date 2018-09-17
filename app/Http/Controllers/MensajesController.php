<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;

class MensajesController extends Controller
{
    public function mensajesCompra()
    {
        return view('mensajes.compra');
    }

    public function mensajesVenta()
    {
        return view('mensajes.venta');
    }
}
