<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReception extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
