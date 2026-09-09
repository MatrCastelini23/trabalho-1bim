<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ProductItem;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = ['name', 'price', 'und_medida'];

    public function productItem(): HasMany{
        return $this->hasMany(ProductItem::class);
    }
}
