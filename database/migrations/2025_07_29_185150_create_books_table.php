<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Kolom 'id' (Primary Key)
            $table->string('title'); // Kolom judul buku
            $table->string('author'); // Kolom pengarang buku
            $table->unsignedBigInteger('category_id'); // Kolom untuk relasi dengan tabel 'categories'
            $table->foreign('category_id')->references('id')->on('categories'); // Membuat foreign key
            $table->string('isbn')->nullable(); // Kolom ISBN buku
            $table->date('published_at')->nullable(); // Kolom tanggal terbit buku
            $table->integer('pages')->nullable(); // Kolom jumlah halaman buku
            $table->integer('available')->default(0); // Kolom jumlah buku yang tersedia
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('books'); // Menghapus tabel jika rollback
    }
}
