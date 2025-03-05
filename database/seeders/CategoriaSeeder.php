<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = ['Tecnología Deportiva', 'Fitness y Entrenamiento', 'Accesorios Deportivos', 'Equipamiento para Deportes Específicos', 'Calzado Deportivo', 'Ropa Deportiva'];


        foreach ($categorias as $nombre) {
            Categoria::firstOrCreate(['nombre' => $nombre]);
        }
    }
}

// CategoriaSeeder.php