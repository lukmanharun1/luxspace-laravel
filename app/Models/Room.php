<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $fillable = [
                            'name_product', 'category', 'price', 'about_product',
                            'image1', 'image2', 'image3', 'image4', 'image5'
    ];
    public $timestamps = true;
}
