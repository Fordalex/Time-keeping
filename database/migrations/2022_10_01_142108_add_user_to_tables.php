<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shifts', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('expenses', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('billed_shifts', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
};
