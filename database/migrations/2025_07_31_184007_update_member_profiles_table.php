<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('member_profiles', function (Blueprint $table) {
            // Menghapus kolom 'bio' dan menambah kolom 'status_pendidikan'
            $table->dropColumn('bio');
            $table->string('status_pendidikan')->nullable();  // Status pendidikan
        });
    }

    public function down()
    {
        Schema::table('member_profiles', function (Blueprint $table) {
            // Rollback perubahan
            $table->dropColumn('status_pendidikan');
            $table->text('bio')->nullable();  // Kembalikan kolom bio
        });
    }
};
