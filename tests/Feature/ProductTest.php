<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_product()
    {
        // Datos del producto
        $productData = [
            'name' => 'Producto de prueba',
            'description' => 'Descripción del producto',
            'price' => 100,
            'stock' => 50,
        ];

        // Realizar la solicitud POST para crear el producto
        $response = $this->postJson('/api/products', $productData);

        // Verificar que el producto se haya creado en la base de datos
        $response->assertStatus(201); // Código de estado HTTP 201 (creado)
        $this->assertDatabaseHas('products', $productData); // Verifica que los datos estén en la base de datos
    }

    /** @test */
    public function it_fetches_all_products()
    {
        // Crear productos en la base de datos
        Product::factory()->count(3)->create();

        // Realizar la solicitud GET para obtener los productos
        $response = $this->getJson('/api/products');

        // Verificar que la respuesta tenga los productos y que el código de estado sea 200
        $response->assertStatus(200);
        $response->assertJsonCount(3); // Verifica que haya 3 productos
    }

    /** @test */
    public function it_updates_a_product()
    {
        // Crear un producto
        $product = Product::factory()->create();

        // Datos para actualizar el producto
        $updatedData = [
            'name' => 'Producto actualizado',
            'description' => 'Descripción actualizada',
            'price' => 150,
            'stock' => 30,
        ];

        // Realizar la solicitud PUT para actualizar el producto
        $response = $this->putJson("/api/products/{$product->id}", $updatedData);

        // Verificar que el código de estado sea 200 (actualización exitosa)
        $response->assertStatus(200);

        // Verificar que la base de datos tenga los nuevos valores
        $this->assertDatabaseHas('products', $updatedData);
    }

    /** @test */
    public function it_deletes_a_product()
    {
        // Crear un producto
        $product = Product::factory()->create();

        // Realizar la solicitud DELETE para eliminar el producto
        $response = $this->deleteJson("/api/products/{$product->id}");

        // Verificar que el código de estado sea 200
        $response->assertStatus(200);

        // Verificar que el producto haya sido eliminado de la base de datos
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}