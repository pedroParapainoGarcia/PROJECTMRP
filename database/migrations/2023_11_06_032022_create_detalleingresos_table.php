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
        Schema::create('detalleingresos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_notaingreso')        
            ->constrained('notaingresos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('id_producto')
            ->nullable()
            ->constrained('productos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
                                 
            $table->integer('cantidad');
            $table->decimal('costounitario',9,2);
            $table->decimal('subtotal',9,2);     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleingresos');
    }
};
