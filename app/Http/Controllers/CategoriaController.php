<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Illuminate\Routing\Middleware\Middleware;

class CategoriaController extends Controller{
     public static function middleware(): array
        {
            return [
                // Protección con permisos
                new Middleware(PermissionMiddleware::using('categoria-listar'), only: ['index']),
                new Middleware(PermissionMiddleware::using('categoria-crear'), only: ['create', 'store']),
                new Middleware(PermissionMiddleware::using('categoria-editar'), only: ['edit', 'update']),
                new Middleware(PermissionMiddleware::using('categoria-eliminar'), only: ['destroy']),
    
                // Protección con roles (opcional)
                new Middleware(RoleMiddleware::using('admin'), only: ['destroy']),
            ];
     }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=$request->get('texto');
        $registros=Categoria::where('nombre','LIKE','%'.$texto.'%')->orderBy('id','desc')->paginate(10);
        return view('categoria.index', compact(['registros','texto']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categoria.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        $registro=new Categoria();
        $registro->nombre=$request->input('nombre');
        $registro->save();
        return redirect()->route('categorias.index')->with('mensaje','Registro '.$registro->nombre.' agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $registro=Categoria::findOrFail($id);
        return view('categoria.edit',compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, $id)
    {
        $registro=Categoria::findOrFail($id);
        $registro->nombre=$request->input('nombre');
        $registro->save();
        return redirect()->route('categorias.index')->with('mensaje','Registro '.$registro->nombre.' actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $registro=Categoria::findOrFail($id);
            $registro->delete();
            return redirect()->route('categorias.index')->with('mensaje','Registro '.$registro->nombre.' eliminado correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('categorias.index')->with('error','No se puede eliminar el registro '.$registro->nombre.' porque esta siendo usado.');
        }
    }
}