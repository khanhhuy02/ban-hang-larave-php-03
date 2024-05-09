<?php

namespace App\Models\shop;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['id', 'users_id', 'products_id', 'product_price', 'quantity', 'total'];

    public function products(): BelongsTo 
    {
        return $this->belongsTo(Product::class, 'products_id','id');

    }
}
