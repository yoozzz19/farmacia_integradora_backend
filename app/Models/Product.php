<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'codigo',
        'name',
        'presentation',
        'purchase_price',
        'sale_price',
        'stock',
        'location',
        'min_stock',
        'max_stock',
        'description',
        'image',
        'category_id',
        'supplier_id'
    ];

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function reservations()
    {
        return $this->hasMany(PickUpReservation::class);
    }

    public function pendingSales()
    {
        return $this->saleDetails()->whereHas('sale', function ($query) {
            $query->where('state', 'in progress');
        })->exists();
    }

    public function reservedProduct()
    {
        return $this->reservations()->where('state', 'pending')->exists();
    }



    public function inventorieMovements()
    {
        return $this->hasMany(InventoryMovement::class);
    }

    public function category()
    {
        return $this->belongsTo(categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productReceptions()
    {
        return $this->hasMany(ProductReception::class);
    }
}
