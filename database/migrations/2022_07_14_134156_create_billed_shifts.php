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
        Schema::create('billed_shifts', function (Blueprint $table) {
            $table->foreignId('invoice_id')->constrained()->on('invoices')->onDelete('cascade');
            $table->foreignId('shift_id')->constrained();
            $table->id();
            $table->integer('duration');
            $table->decimal('hourly_rate');
            $table->date('date');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('billed_shifts');
    }
};
