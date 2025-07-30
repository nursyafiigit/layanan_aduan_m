<?php

// database/migrations/xxxx_xx_xx_create_loans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    // database/migrations/xxxx_xx_xx_create_loans_table.php

    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('member_id');
            $table->date('loan_date');
            $table->date('return_date');
            $table->enum('status', ['borrowed', 'returned', 'late'])->default('borrowed');
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
    }
