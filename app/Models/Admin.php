<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Import this class
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable // Make sure the Admin model extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'password'];
    protected $hidden = ['password', 'remember_token'];

    // You can add additional methods if needed
}
