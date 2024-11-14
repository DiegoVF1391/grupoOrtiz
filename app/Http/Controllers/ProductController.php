<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Listar productos (paginados)
    public function index()
    {
        return Product::paginate(10);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        Product::create(
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
            ])
        );

        // Redirige a la página de listado de productos
        return to_route('products.index')->with('success', 'Producto creado con éxito.');
    }

    // Mostrar los detalles de un producto
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    // Actualizar un producto existente
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update(
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'price' => 'sometimes|required|numeric|min:0',
                'stock' => 'sometimes|required|integer|min:0',
            ])
        );

        return to_route('products.index');
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
