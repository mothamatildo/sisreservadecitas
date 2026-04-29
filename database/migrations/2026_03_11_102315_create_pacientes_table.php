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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();

             $table->string('nombres', length:100);
            $table->string('apellidos', length:100);
            $table->string('cc',length:100)->unique();
            $table->string('nro_seguro',length:100)->unique();
            $table->string('celular', length:100);
            $table->date('fecha_nacimiento');
            $table->string('genero', length:100);
            $table->string('direccion', length:255);
            $table->string('correo',length:100)->unique();
            $table->string('grupo_sanguineo', length:255);
            $table->string('alergias', length:255);
            $table->string('contacto_emergencia', length:255);
            $table->text('observaciones')->nullable();
            
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
