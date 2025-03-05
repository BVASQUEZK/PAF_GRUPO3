<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente; // ✅ Importamos Cliente
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class VentaController extends Controller
{
    /**
     * Muestra una lista de las ventas registradas con opción de búsqueda.
     */
    public function index(Request $request)
    {
        // Obtiene el texto de búsqueda del formulario y lo limpia de espacios en blanco
        $texto = trim($request->get('buscar'));

        // Realiza la consulta filtrando por nombre de cliente, usuario o estado de la venta
        $ventas = Venta::whereHas('cliente', function ($query) use ($texto) {
                $query->where('nombre', 'LIKE', "%$texto%");
            })
            ->orWhereHas('usuario', function ($query) use ($texto) {
                $query->where('name', 'LIKE', "%$texto%");
            })
            ->orWhere('estado', 'LIKE', "%$texto%")
            ->orderBy('created_at', 'desc') // Ordena por fecha de creación descendente
            ->paginate(10); // Pagina los resultados de 10 en 10

        return view('venta.index', compact('ventas', 'texto'));
    }

    /**
     * Muestra el formulario para crear una nueva venta.
     */
    public function create()
    {
        $clientes = Cliente::all(); // Obtiene todos los clientes
        $usuarios = User::all(); // Obtiene todos los usuarios
        $productos = Producto::all(); // Obtiene todos los productos
        $roles = Role::all(); // 🔹 Obtiene todos los roles

        return view('venta.create', compact('clientes', 'usuarios', 'productos', 'roles'));
    }

    /**
     * Almacena una nueva venta en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id', // Verifica que el cliente exista
            'metodo_pago' => 'required|string', // Método de pago obligatorio
            'productos' => 'required|array', // Debe haber al menos un producto
            'productos.*.id' => 'required|exists:productos,id', // Cada producto debe existir
            'productos.*.cantidad' => 'required|integer|min:1', // La cantidad debe ser al menos 1
        ]);

        // Calcular el total sumando el precio de cada producto por la cantidad
        $total = 0;
        foreach ($request->productos as $producto) {
            $productoDB = Producto::findOrFail($producto['id']); // Busca el producto en la BD
            $total += $productoDB->precio_venta * $producto['cantidad']; // Calcula el total
        }

        // Crear la venta con los datos ingresados y el total calculado
        $venta = Venta::create([
            'cliente_id' => $request->cliente_id,
            'metodo_pago' => $request->metodo_pago,
            'usuario_id' => auth()->id(), // Captura el usuario autenticado
            'total' => $total, // Asigna el total calculado
            'estado' => 'Completado', // Define el estado de la venta
        ]);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
    }

    /**
     * Muestra los detalles de una venta específica.
     */
    public function show(string $id)
    {
        // (Implementación pendiente)
    }

    /**
     * Muestra el formulario para editar una venta existente.
     */
    public function edit(string $id)
    {
        // (Implementación pendiente)
    }

    /**
     * Actualiza la información de una venta en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        // (Implementación pendiente)
    }

    /**
     * Elimina una venta de la base de datos.
     */
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id); // Busca la venta por su ID
        $venta->delete(); // Elimina la venta
        
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}
