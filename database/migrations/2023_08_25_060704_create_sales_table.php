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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('total', 8, 2);
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['PENDIENTE', 'RECHAZADO', 'OBSERVADO', 'ACEPTADO'])->default('PENDIENTE');
            $table->bigInteger('clientId')->unsigned();
            $table->foreign('clientId')->references('id')->on('clients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
