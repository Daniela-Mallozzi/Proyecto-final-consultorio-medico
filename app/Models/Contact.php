<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cedula',
        'address',
        'phone',
        'message',
        'facebook',
        'youtube',
        'twitter',
        'github',
        'pinterest'
    ];
}
