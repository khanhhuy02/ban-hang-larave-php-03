<?php

namespace App\Models\authLogin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformations extends Model
{
    use HasFactory;

    protected $table = 'user_informations';
    protected $fillable = [
        'id', 'users_id', 'image',
        'phone', 'address'
    ];
}
