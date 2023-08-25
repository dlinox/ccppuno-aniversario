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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('maternalSurname')->nullable();
            $table->string('paternalSurname')->nullable();
            $table->char('documentNumber', 8)->unique();
            $table->char('phoneNumber', 9);
            $table->char('enrollmentNumber', 6)->nullable()->unique();
            $table->boolean('hasEnrollment')->default(1);
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
