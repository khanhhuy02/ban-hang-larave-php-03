<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = ['id','name','code','reduce','quantity','amount_used','date_start','date_end','status'];
    
}
