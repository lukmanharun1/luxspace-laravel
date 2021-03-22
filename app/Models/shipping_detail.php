<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email_address', 'address', 
        'phone_number', 'courier', 'payment'
    ];
}
