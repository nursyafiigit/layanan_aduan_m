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
        Schema::create('member_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');  // Kolom untuk relasi dengan tabel members
            $table->string('address')->nullable();  // Alamat
            $table->string('phone_number')->nullable();  // Nomor Telepon
            $table->string('gender')->nullable();  // Jenis kelamin
            $table->string('dob')->nullable();  // Tanggal Lahir
            $table->text('')->nullable();  // Biografi atau deskripsi singkat
            $table->timestamps();

            // Menambahkan foreign key untuk kolom member_id
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('member_profiles');
    }
};
