<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\User;
use App\Models\Cliente;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si hay datos suficientes
        if (Producto::count() < 3 || User::count() < 3 || Cliente::count() < 3) {
            echo "No hay suficientes productos, clientes o usuarios para generar ventas.\n";
            return;
        }
        
        // Obtener datos de prueba
        $clientes = Cliente::take(3)->get();
        $usuarios = User::take(3)->get();
        $productos = Producto::take(3)->get();

        if ($productos->count() < 3) {
            echo "No hay suficientes productos disponibles para generar ventas.\n";
            return;
        }

        // Crear tres ventas con detalles
        foreach ([0, 1, 2] as $i) {
            $venta = Venta::create([
                'cliente_id' => $clientes[$i]->id,
                'usuario_id' => $usuarios[$i]->id,
                'total' => 0, // Se actualizará luego
                'metodo_pago' => 'Efectivo',
                'estado' => 'Pendiente',
            ]);

            $producto = $productos[$i];
            $cantidad = rand(1, 5); // Cantidad aleatoria entre 1 y 5
            $precio_unitario = $producto->precio_venta;
            $subtotal = $cantidad * $precio_unitario;

            DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
                'precio_unitario' => $precio_unitario,
                'subtotal' => $subtotal,
            ]);

            // Actualizar el total de la venta
            $venta->update(['total' => $subtotal]);
        }
    }
}


//VentaSeeder.php