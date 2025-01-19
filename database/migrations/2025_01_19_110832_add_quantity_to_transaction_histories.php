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
        $table->integer('quantity')->after('price'); // Adds the quantity column
    });
}

public function down()
{
    Schema::table('transaction_histories', function (Blueprint $table) {
        $table->dropColumn('quantity'); // Drops the quantity column if needed
    });
}

};
