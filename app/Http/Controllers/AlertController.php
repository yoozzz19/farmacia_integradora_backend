<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    use ApiResponse;

    //productos con stock bajo
    public function lowStock(){
        $stock = Product::whereColumn('stock', '<=', 'min_stock')->get();

        return $this->response(true, 'Se han mostrado los datos', $stock, null, 201);
    }

    //productos próximos a vencer
    public function expireSoon()
    {
        $stock = Product::where()->get();
        return $this->response(true, 'Se han mostrado los datos', $stock, null, 201);
    }

    //productos caducados
    public function expired()
    {
        $stock = Product::where()->get();
        return $this->response(true, 'Se han mostrado los datos', $stock, null, 201);
    }
}
