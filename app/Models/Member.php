<?php

// app/Models/Member.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Menambahkan kolom yang diizinkan untuk mass assignment
    protected $fillable = ['name', 'email', 'phone_number'];
}
    