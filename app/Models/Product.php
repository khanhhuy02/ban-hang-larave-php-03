<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id', 'categories_id', 'brands_id', 'name',
        'alias_sp', 'price_new', 'price_old', 'image',
        'sub_image','status', 'description','information_engineering'
    ];

    function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class,'categories_id','id');
    }
}
