<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;

    protected $guarded = [
        'username',
        'password'
    ];
    protected $casts = [
        'password' => 'hashed',
    ];
}
