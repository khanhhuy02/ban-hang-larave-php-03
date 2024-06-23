<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = ['id','categories_id','names','icon','location','alias'];

    
    function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class,'categories_id','id');

    }
}
