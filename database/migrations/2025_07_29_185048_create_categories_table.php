<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Kolom 'id' (Primary Key)
            $table->string('name'); // Kolom nama kategori
            $table->text('description')->nullable(); // Kolom deskripsi kategori (opsional)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories'); // Menghapus tabel jika rollback
    }
}
