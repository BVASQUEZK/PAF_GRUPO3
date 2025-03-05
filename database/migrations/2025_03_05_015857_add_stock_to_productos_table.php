<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('productos', function (Blueprint $table) {
            $table->integer('stock')->default(0)->after('categoria_id'); // Agrega la columna stock
        });
    }

    public function down(): void {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('stock');
        });
    }
};

//2025_03_05_015857_add_stock_to_productos_table