<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email_address', 'address',
        'phone_number', 'courier', 'payment',
        'total_price', 'status', 'token'
    ];
    public $timestamps = true;

    public function shoppingCart()
    {
        return $this->hasMany(ShoppingCart::class, 'id_shipping_details');
    }
}
