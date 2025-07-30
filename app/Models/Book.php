<?php

// app/Models/Book.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Menambahkan kolom yang bisa diisi menggunakan mass assignment
    protected $fillable = [
        'title',
        'author',
        'category_id',
        'isbn',
        'published_at',
        'pages',
        'available'
    ];

    // Menentukan hubungan dengan kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
