<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::latest()->paginate(8);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre'      => 'required|string|max:255',
        'precio'      => 'required|numeric|min:0',
        'descripcion' => 'nullable|string',
        'imagen'      => 'nullable|image|max:2048',
    ]);

    $imagenPath = null;
    if ($request->hasFile('imagen')) {
        $imagenPath = $request->file('imagen')->store('productos', 'public');
    }

    Producto::create([
        'nombre'      => $request->nombre,
        'precio'      => $request->precio,
        'descripcion' => $request->descripcion,
        'imagen'      => $imagenPath,
    ]);

    return redirect()->route('productos.index')->with('success', 'Producto creado.');
}

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }
}
