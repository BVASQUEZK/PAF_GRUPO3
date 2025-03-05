<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
        // Tecnología Deportiva (categoria_id = 1)
        ['codigo' => 'K10', 'nombre' => 'Monitor Cardíaco', 'descripcion' => 'Monitor de ritmo cardíaco con Bluetooth', 'precio_venta' => 90.00, 'categoria_id' => 1, 'stock' => 50],
        ['codigo' => 'K11', 'nombre' => 'Auriculares JBL Endurance', 'descripcion' => 'Auriculares deportivos resistentes al agua', 'precio_venta' => 45.00, 'categoria_id' => 1, 'stock' => 25],
        ['codigo' => 'K12', 'nombre' => 'Reloj Deportivo Garmin', 'descripcion' => 'Smartwatch con GPS y monitoreo de salud', 'precio_venta' => 250.00, 'categoria_id' => 1, 'stock' => 30],
        ['codigo' => 'K13', 'nombre' => 'Banda de resistencia inteligente', 'descripcion' => 'Banda elástica con sensores de entrenamiento', 'precio_venta' => 60.00, 'categoria_id' => 1, 'stock' => 40],

        // Fitness y Entrenamiento (categoria_id = 2)
        ['codigo' => 'K09', 'nombre' => 'Mancuernas', 'descripcion' => 'Mancuernas ajustables para entrenamiento', 'precio_venta' => 73.00, 'categoria_id' => 2, 'stock' => 60],
        ['codigo' => 'K14', 'nombre' => 'Cuerda de saltar', 'descripcion' => 'Cuerda de velocidad para entrenamiento cardio', 'precio_venta' => 25.00, 'categoria_id' => 2, 'stock' => 100],
        ['codigo' => 'K15', 'nombre' => 'Rodillo Abdominal', 'descripcion' => 'Rodillo con agarres ergonómicos', 'precio_venta' => 30.00, 'categoria_id' => 2, 'stock' => 75],
        ['codigo' => 'K16', 'nombre' => 'Banco de pesas', 'descripcion' => 'Banco ajustable para entrenamiento de fuerza', 'precio_venta' => 200.00, 'categoria_id' => 2, 'stock' => 20],

        // Accesorios Deportivos (categoria_id = 3)
        ['codigo' => 'K07', 'nombre' => 'Balón de fútbol', 'descripcion' => 'Balón de fútbol profesional', 'precio_venta' => 67.00, 'categoria_id' => 3, 'stock' => 120],
        ['codigo' => 'K08', 'nombre' => 'Raqueta de tenis', 'descripcion' => 'Raqueta de tenis de grafito', 'precio_venta' => 80.00, 'categoria_id' => 3, 'stock' => 25],
        ['codigo' => 'K17', 'nombre' => 'Guantes de ciclismo', 'descripcion' => 'Guantes acolchados para mayor comodidad', 'precio_venta' => 35.00, 'categoria_id' => 3, 'stock' => 50],
        ['codigo' => 'K18', 'nombre' => 'Botella térmica', 'descripcion' => 'Botella de agua deportiva con aislamiento térmico', 'precio_venta' => 20.00, 'categoria_id' => 3, 'stock' => 90],

        // Equipamiento para Deportes Específicos (categoria_id = 4)
        ['codigo' => 'K19', 'nombre' => 'Guantes de boxeo Everlast', 'descripcion' => 'Guantes profesionales de 12 oz', 'precio_venta' => 85.00, 'categoria_id' => 4, 'stock' => 40],
        ['codigo' => 'K20', 'nombre' => 'Red de voleibol', 'descripcion' => 'Red resistente para juegos profesionales', 'precio_venta' => 150.00, 'categoria_id' => 4, 'stock' => 10],
        ['codigo' => 'K21', 'nombre' => 'Tabla de natación', 'descripcion' => 'Tabla de entrenamiento para piscina', 'precio_venta' => 30.00, 'categoria_id' => 4, 'stock' => 35],

        // Calzado Deportivo (categoria_id = 5)
        ['codigo' => 'K05', 'nombre' => 'Zapatillas Nike', 'descripcion' => 'Zapatillas deportivas para running', 'precio_venta' => 180.00, 'categoria_id' => 5, 'stock' => 40],
        ['codigo' => 'K06', 'nombre' => 'Chimpunes Adidas Predator', 'descripcion' => 'Botines de fútbol de alta calidad', 'precio_venta' => 350.00, 'categoria_id' => 5, 'stock' => 80],
        ['codigo' => 'K22', 'nombre' => 'Zapatillas de Trail Running', 'descripcion' => 'Zapatillas resistentes para terrenos difíciles', 'precio_venta' => 220.00, 'categoria_id' => 5, 'stock' => 30],
        ['codigo' => 'K23', 'nombre' => 'Sandalias deportivas', 'descripcion' => 'Sandalias con suela antideslizante', 'precio_venta' => 50.00, 'categoria_id' => 5, 'stock' => 25],

        // Ropa Deportiva (categoria_id = 6)
        ['codigo' => 'K01', 'nombre' => 'Licra polo', 'descripcion' => 'Camiseta de entrenamiento ligera', 'precio_venta' => 45.00, 'categoria_id' => 6, 'stock' => 50],
        ['codigo' => 'K02', 'nombre' => 'Polo Nike', 'descripcion' => 'Polo deportivo de alta transpirabilidad', 'precio_venta' => 40.00, 'categoria_id' => 6, 'stock' => 100],
        ['codigo' => 'K03', 'nombre' => 'Short Nike', 'descripcion' => 'Short deportivo con tecnología Dri-FIT', 'precio_venta' => 35.00, 'categoria_id' => 6, 'stock' => 75],
        ['codigo' => 'K04', 'nombre' => 'Calcetines de compresión', 'descripcion' => 'Calcetines deportivos para mejor circulación', 'precio_venta' => 30.00, 'categoria_id' => 6, 'stock' => 30],
        ['codigo' => 'K24', 'nombre' => 'Chaqueta cortavientos', 'descripcion' => 'Chaqueta ligera ideal para correr', 'precio_venta' => 120.00, 'categoria_id' => 6, 'stock' => 15],
        ['codigo' => 'K25', 'nombre' => 'Pantalones térmicos', 'descripcion' => 'Pantalones deportivos para invierno', 'precio_venta' => 75.00, 'categoria_id' => 6, 'stock' => 20],
    ];

        foreach ($productos as $producto) {
            Producto::firstOrCreate(['nombre' => $producto['nombre']], $producto);
        }
    }
}

//ProductoSeeder 