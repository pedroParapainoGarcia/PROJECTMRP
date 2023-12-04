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
        Schema::create('seguimiento_produccions', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_producida');
            $table->string('estado_de_envio');
            $table->date('fecha_de_envio');

            $table->foreignId('id_orden_produccion')
                ->constrained('orden_produccions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_produccions');
    }
};
