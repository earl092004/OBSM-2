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
    Schema::table('transaction_histories', function (Blueprint $table) {
        $table->decimal('total_amount', 8, 2)->after('quantity');
    });
}


public function down()
{
    Schema::table('transaction_histories', function (Blueprint $table) {
        $table->dropColumn('book_id');
    });
}

};
