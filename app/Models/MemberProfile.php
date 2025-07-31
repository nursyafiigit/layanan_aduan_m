<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberProfile extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = ['member_id', 'address', 'status_pendidikan', 'gender', 'dob'];

    // Relasi dengan model Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
