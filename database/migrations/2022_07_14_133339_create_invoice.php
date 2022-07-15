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
        Schema::create('invoices', function (Blueprint $table) {
            $table->foreignId('company_id')->constrained()->on('companies')->onDelete('cascade');
            $table->date('from_date');
            $table->date('to_date');
            $table->date('due_date');
            $table->integer('number');
            $table->string('account_number');
            $table->string('bank');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('sort_code');
            $table->string('terms');
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
