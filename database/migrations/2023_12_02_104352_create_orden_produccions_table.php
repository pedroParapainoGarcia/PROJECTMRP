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
        Schema::create('orden_produccions', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_a_producir');
            $table->string('estado');
            $table->date('fecha_inicio_planificada');
            $table->date('fecha_final_planificada');

            $table->foreignId('id_user')
            ->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('id_producto')
                ->constrained('productos')
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
        Schema::dropIfExists('orden_produccions');
    }
};
