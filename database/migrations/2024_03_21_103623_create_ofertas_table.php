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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('descripcion', 400);
            $table->double('precio');
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->string('imagen_banner',200);
            $table->string('imagen_oferta',200);
            $table->boolean('banner',200);
            $table->integer('habitacion_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
