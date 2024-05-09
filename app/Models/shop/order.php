<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\shop\orderItem;

class order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['id','users_id','name','addess','phone','email','note'];

    public function order_items(): belongsTo
    {
        return $this->belongsTo(orderItem::class,'id','orders_id');
    }
}
