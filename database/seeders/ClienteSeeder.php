<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            ['nombre' => 'Juan Pérez', 'documento' => '12345678', 'telefono' => '987654321', 'direccion' => 'Av. Principal 123'],
            ['nombre' => 'María López', 'documento' => '87654321', 'telefono' => '912345678', 'direccion' => 'Calle Secundaria 456'],
            ['nombre' => 'Carlos Rodríguez', 'documento' => '56781234', 'telefono' => '934567890', 'direccion' => 'Jr. Comercial 789'],
            ['nombre' => 'Ana Torres', 'documento' => '34567812', 'telefono' => '956789012', 'direccion' => 'Pasaje Industrial 234'],
            ['nombre' => 'Pedro Sánchez', 'documento' => '98765432', 'telefono' => '976543210', 'direccion' => 'Av. Metropolitana 567'],
            ['nombre' => 'Sofía Gómez', 'documento' => '23456789', 'telefono' => '923456789', 'direccion' => 'Calle Universitaria 890'],
            ['nombre' => 'Luis Ramírez', 'documento' => '65432178', 'telefono' => '945678901', 'direccion' => 'Jr. Empresarial 111'],
            ['nombre' => 'Andrea Castillo', 'documento' => '78901234', 'telefono' => '956789234', 'direccion' => 'Plaza Central 222'],
            ['nombre' => 'Ricardo Vargas', 'documento' => '87651234', 'telefono' => '967890123', 'direccion' => 'Av. Las Palmeras 333'],
            ['nombre' => 'Gabriela Fernández', 'documento' => '54321678', 'telefono' => '978901234', 'direccion' => 'Jr. Cultural 444'],
            ['nombre' => 'Fernando Morales', 'documento' => '21098765', 'telefono' => '989012345', 'direccion' => 'Calle Independencia 555'],
            ['nombre' => 'Lucía Herrera', 'documento' => '34561278', 'telefono' => '990123456', 'direccion' => 'Av. San Martín 666'],
            ['nombre' => 'José Ríos', 'documento' => '67812345', 'telefono' => '901234567', 'direccion' => 'Calle Comercio 777'],
            ['nombre' => 'Patricia Salazar', 'documento' => '78945612', 'telefono' => '912345678', 'direccion' => 'Jr. Los Nogales 888'],
            ['nombre' => 'Miguel Medina', 'documento' => '89012345', 'telefono' => '923456789', 'direccion' => 'Plaza Mayor 999'],
            ['nombre' => 'Diana Paredes', 'documento' => '90123456', 'telefono' => '934567890', 'direccion' => 'Pasaje Los Andes 101'],
            ['nombre' => 'Hugo Cáceres', 'documento' => '11223344', 'telefono' => '945678901', 'direccion' => 'Av. Los Incas 202'],
            ['nombre' => 'Elena Rojas', 'documento' => '22334455', 'telefono' => '956789012', 'direccion' => 'Calle Miraflores 303'],
            ['nombre' => 'Raúl Quispe', 'documento' => '33445566', 'telefono' => '967890123', 'direccion' => 'Jr. Tacna 404'],
            ['nombre' => 'Carmen Vega', 'documento' => '44556677', 'telefono' => '978901234', 'direccion' => 'Av. Colonial 505'],
        ];

        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}

//ClienteSeeder
