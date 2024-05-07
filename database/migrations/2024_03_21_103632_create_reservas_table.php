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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('habitacion_id');
            $table->integer('cantidad');
            $table->unsignedBigInteger('oferta_id')->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')
            ->references('id')->on('usuarios')
            ->onDelete('cascade');

            $table->foreign('habitacion_id')
            ->references('id')->on('habitaciones')
            ->onDelete('cascade');

            $table->foreign('oferta_id')
            ->references('id')->on('ofertas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
