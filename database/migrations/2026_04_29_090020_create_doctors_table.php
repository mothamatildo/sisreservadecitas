<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('licencia_medica');
            $table->string('especialidad');

            // Relación con usuarios
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            // 🔥 Relación con consultorios (LO QUE TE FALTABA)
            $table->unsignedBigInteger('consultorio_id');
            $table->foreign('consultorio_id')
                  ->references('id')
                  ->on('consultorios')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};