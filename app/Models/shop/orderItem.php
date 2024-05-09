<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
use App\Models\shop\order;

class orderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = ['id','orders_id','products_id','quantity','product_price','date'];

    public function products(): belongsTo
    {
        return $this->belongsTo(Product::class,'products_id','id');
    }
    public function orders(): belongsTo
    {
        return $this->belongsTo(order::class,'orders_id','id');
    }
}
