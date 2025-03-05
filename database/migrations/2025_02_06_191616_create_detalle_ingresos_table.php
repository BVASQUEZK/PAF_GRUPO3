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
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingreso_id');
            $table->unsignedBigInteger('producto_id'); // Asegurar que coincide con la tabla productos
            $table->smallInteger('cantidad');
            $table->decimal('precio_unitario', 6, 2); // Corrección en decimal
            $table->timestamps();

            $table->foreign('ingreso_id')->references('id')->on('ingresos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ingresos');
    }
};

//2025_02_06_191616_create_detalle_ingresos_table