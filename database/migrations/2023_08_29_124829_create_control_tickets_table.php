<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('control_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->date('usedIn')->nullable()->default(null);
            $table->string('ip', 50)->nullable();
            $table->string('userAgent')->nullable();
            $table->boolean('isUsed')->default(0);
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('clientId');
            $table->unsignedBigInteger('saleId');
            $table->unsignedBigInteger('ticketId');
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('saleId')->references('id')->on('sales');
            $table->foreign('clientId')->references('id')->on('clients');
            $table->foreign('ticketId')->references('id')->on('tickets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control_tickets');
    }
};
