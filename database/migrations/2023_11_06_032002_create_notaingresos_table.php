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
           
            $table->date('fecha');
            $table->decimal('costototal',9,2);
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
