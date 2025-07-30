<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_alter_status_column_in_loans_table.php

    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            // Mengubah kolom 'status' menjadi enum dengan nilai yang benar
            $table->enum('status', ['borrowed', 'returned', 'late'])->default('borrowed')->change();
        });
    }

    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            // Mengembalikan kolom 'status' ke tipe sebelumnya jika diperlukan
            $table->enum('status', ['on_time', 'late'])->default('on_time')->change();
        });
    }
};
