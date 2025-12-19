<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_servicio');
            $table->string('direccion');
            $table->string('nombre_cliente');
            $table->string('telefono', 20);
            $table->enum('estado', [
                'pendiente',
                'en_camino',
                'completado',
                'cobrado'
            ])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trabajos');
    }
};
