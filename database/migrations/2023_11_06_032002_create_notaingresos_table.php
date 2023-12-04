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
        Schema::create('notaingresos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_compra');
            $table->string('descripcion');
            $table->string('costo_total');

            $table->foreignId('id_proveedor')
                ->constrained('proveedors')
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
        Schema::dropIfExists('notaingresos');
    }
};
