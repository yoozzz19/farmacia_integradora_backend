<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supplier extends Model
{
    use HasFactory, SoftDeletes;
=======
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $table = 'suppliers';
>>>>>>> LOGIN_ANIBAL

    protected $fillable = [
        'name',
        'contact',
<<<<<<< HEAD
        'phone_number',
        'email',
    ];

    public function products() 
    {
        return $this->hasMany(Product::class);
    }
=======
        'email',
        'phone_number',
    ];
>>>>>>> LOGIN_ANIBAL
}
