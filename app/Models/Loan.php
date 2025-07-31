<?php
// app/Models/Loan.php

// app/Models/Loan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'book_id',
        'member_id',
        'loan_date',
        'return_date',
        'actual_return_date',
        'status',
    ];

    // Relasi ke model Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relasi ke model Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
