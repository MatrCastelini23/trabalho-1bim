<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = ['nome', 'preco', 'und_medida'];

    public function productItem(): HasMany{
        return $this->hasMany(ProductItem::class);
    }
}
