<?php

// app/Models/Category.php
// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Menambahkan kolom yang dapat diisi melalui mass assignment
    protected $fillable = ['name', 'description']; // Pastikan 'name' dan 'description' ada di sini

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    // Jika ada kolom lain yang harus dapat diisi, tambahkan di array ini.
}
