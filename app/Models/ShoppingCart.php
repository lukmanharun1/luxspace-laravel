<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'shopping_cart';

    protected $fillable = [
        'id_shipping_details',
        'photo', 
        'name_product', 
        'category',
        'price'
    ];

    public function shippingDetails()
    {
        return $this->belongsTo(ShippingDetail::class, '', 'id');
    }
}
