<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('amount', 8, 2);
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger('saleId')->unsigned();
            $table->bigInteger('ticketId')->unsigned();
            $table->foreign('saleId')->references('id')->on('sales');
            $table->foreign('ticketId')->references('id')->on('tickets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_details');
    }
};
