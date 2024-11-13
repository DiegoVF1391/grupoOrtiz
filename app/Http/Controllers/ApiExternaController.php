<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiExternaController extends Controller
{
    public function getPokemon(Request $request)
    {
        // Instancia de Guzzle para hacer solicitudes HTTP
        $client = new Client();
        
        // Obtiene el nombre del Pokémon de los parámetros de la solicitud o usa "ditto" como valor predeterminado
        $pokemonName = $request->query('name', 'ditto');
        
        try {
            // Realiza la solicitud GET a la API de Pokémon
            $response = $client->get("https://pokeapi.co/api/v2/pokemon/{$pokemonName}");
            
            // Decodifica el contenido de la respuesta en formato JSON
            $pokemonData = json_decode($response->getBody()->getContents(), true);

            // Devuelve la respuesta en formato JSON
            return response()->json($pokemonData);
        } catch (\Exception $e) {
            // Manejo de errores en caso de que la solicitud falle
            return response()->json(['error' => 'No se pudo obtener la información del Pokémon.'], 500);
        }
    }
}
