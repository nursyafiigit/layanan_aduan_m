<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_add_return_columns_to_loans_table.php

    public function up()
    {
        // Cek jika kolom tidak ada, baru tambahkan
        Schema::table('loans', function (Blueprint $table) {
            if (!Schema::hasColumn('loans', 'actual_return_date')) {
                $table->date('actual_return_date')->nullable();
            }

            if (!Schema::hasColumn('loans', 'status')) {
                $table->enum('status', ['on_time', 'late'])->default('on_time');
            }
        });
    }

    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('actual_return_date');
            $table->dropColumn('status');
        });
    }
};
