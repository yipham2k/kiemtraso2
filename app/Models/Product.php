<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    // Nếu muốn chỉ định các cột cho phép insert/update:
    protected $fillable = ['name', 'description', 'price', 'image', 'new'];

}
