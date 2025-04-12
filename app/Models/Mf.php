<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mf extends Model
{
    use HasFactory;

    protected $table = 'mfs'; // Nếu bảng có tên khác với `mfs`
    protected $fillable = ['name', 'country']; // Các trường có thể gán

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class, 'mf_id', 'id');
    }
}