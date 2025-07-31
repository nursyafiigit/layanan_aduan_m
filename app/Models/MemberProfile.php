<?php

// app/Models/MemberProfile.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberProfile extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'address', 'phone_number', 'gender', 'dob', 'status_pendidikan'];

    // Relasi One-to-One dengan Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
