<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Illuminate\Routing\Middleware\Middleware;

class ProductoController extends Controller
{
    // Definición de middlewares para la protección de rutas
    public static function middleware(): array
    {
        return [
            // Protección con permisos específicos
            new Middleware(PermissionMiddleware::using('producto-listar'), only: ['index']), // Solo permite listar productos si tiene el permiso
            new Middleware(PermissionMiddleware::using('producto-crear'), only: ['create', 'store']), // Solo permite crear y guardar productos si tiene el permiso
            new Middleware(PermissionMiddleware::using('producto-editar'), only: ['edit', 'update']), // Solo permite editar y actualizar productos si tiene el permiso
            new Middleware(PermissionMiddleware::using('producto-eliminar'), only: ['destroy']), // Solo permite eliminar productos si tiene el permiso

            // Protección con roles (Opcional)
            new Middleware(RoleMiddleware::using('admin'), only: ['destroy']), // Solo los administradores pueden eliminar productos
        ];
    }

    /**
     * Muestra una lista de productos con paginación y búsqueda.
     */
    public function index(Request $request)
    {
        $texto = $request->get('texto'); // Obtiene el texto de búsqueda
        // Busca productos cuyo nombre contenga el texto ingresado y los ordena de forma descendente por ID
        $registros = Producto::where('nombre', 'LIKE', '%' . $texto . '%')
            ->with('categoria') // Carga la relación con la categoría
            ->orderBy('id', 'desc')
            ->paginate(10); // Paginación de 10 registros por página
        return view('producto.index', compact(['registros', 'texto'])); // Retorna la vista con los productos
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        $categorias = Categoria::select('id', 'nombre')->get(); // Obtiene todas las categorías
        return view("producto.create", compact('categorias')); // Retorna la vista de creación de producto
    }

    /**
     * Almacena un nuevo producto en la base de datos.
     */
    public function store(ProductoRequest $request)
    {
        $registro = new Producto(); // Crea una nueva instancia de Producto
        $registro->codigo = $request->input('codigo'); // Asigna el código ingresado
        $registro->nombre = $request->input('nombre'); // Asigna el nombre ingresado
        $registro->descripcion = $request->input('descripcion'); // Asigna la descripción ingresada
        $registro->precio_venta = $request->input('precio_venta'); // Asigna el precio de venta ingresado
        $registro->categoria_id = $request->input('categoria_id'); // Asigna la categoría seleccionada
        $registro->save(); // Guarda el producto en la base de datos
        return redirect()->route('productos.index')->with('mensaje', 'Registro ' . $registro->nombre . ' agregado correctamente.'); // Redirecciona con mensaje de éxito
    }

    /**
     * Muestra un producto específico (no implementado en este código).
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit($id)
    {
        $categorias = Categoria::select('id', 'nombre')->get(); // Obtiene todas las categorías
        $registro = Producto::with('categoria')->findOrFail($id); // Busca el producto por ID y obtiene su categoría
        return view('producto.edit', compact(['registro', 'categorias'])); // Retorna la vista de edición de producto
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(ProductoRequest $request, $id)
    {
        $registro = Producto::findOrFail($id); // Busca el producto por ID
        $registro->codigo = $request->input('codigo'); // Actualiza el código
        $registro->nombre = $request->input('nombre'); // Actualiza el nombre
        $registro->descripcion = $request->input('descripcion'); // Actualiza la descripción
        $registro->precio_venta = $request->input('precio_venta'); // Actualiza el precio de venta
        $registro->categoria_id = $request->input('categoria_id'); // Actualiza la categoría
        $registro->save(); // Guarda los cambios en la base de datos
        return redirect()->route('productos.index')->with('mensaje', 'Registro ' . $registro->nombre . ' actualizado correctamente.'); // Redirecciona con mensaje de éxito
    }

    /**
     * Elimina un producto de la base de datos.
     */
    public function destroy($id)
    {
        try {
            $registro = Producto::findOrFail($id); // Busca el producto por ID
            $registro->delete(); // Elimina el producto
            return redirect()->route('productos.index')->with('mensaje', 'Registro eliminado correctamente.'); // Redirecciona con mensaje de éxito
        } catch (\Illuminate\Database\QueryException $e) {
            // Captura el error si el producto está relacionado con otras tablas y no puede ser eliminado
            return redirect()->route('productos.index')->with('error', 'No se puede eliminar el producto porque está en uso en otras tablas.');
        }
    }
}


//ProductoController.php