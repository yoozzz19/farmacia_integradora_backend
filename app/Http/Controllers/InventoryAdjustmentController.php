<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\InventoryMovement;
use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class InventoryAdjustmentController extends Controller
{
    use ApiResponse;

    public function alter(InventoryMovement $request)
    {
        $product = Product::findOrFail($request->product_id);

        $productStock = $product->stock;

        if($request->reason === 'income'){
            $newAdjustmen = $productStock + $request->amount;
        }
        
        if($request->reason === 'output'){
            if($request->amount > $productStock){
                return $this->response(false, "Stock insuficiente", null, "El stock es menor a la cantidad", 422);
            }
            $newAdjustmen = $productStock - $request->amount;
        }
        
        if($request->reason === 'adjustment'){
            $newAdjustmen = $request->amount;
        }

        $product->stock = $newAdjustmen;
        $product->save();

        Audit::create([
            'user_id' => auth()->id,
            'affected_module' => 'Product',
            'action_performed' => 'update',
            'detail' => 'Se actualizó un producto {$product->name}'
        ]);

        return $this->response(true, "Cambio en stock", $product, "Hubo un cambio en el inventario y stock del producto", 200);
    }
}
