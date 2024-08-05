<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoty_post extends Model
{
    use HasFactory;
    protected $table = 'categoty_posts';
    protected $fillable = ['id','name','icon','alias','status'];

}
