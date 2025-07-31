<?php

// app/Models/Member.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number'];

    // Relasi One-to-One dengan MemberProfile
    public function profile()
    {
        return $this->hasOne(MemberProfile::class);
    }
}
