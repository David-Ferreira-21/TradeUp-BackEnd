<?php

namespace App\Http\Controllers;

use App\Models\Address; // Importa o modelo Address
use Illuminate\Http\Request; // Importa a classe Request
use Illuminate\Support\Facades\Http; // Importa a fachada Http para fazer requisições HTTP

class CepController extends Controller
{
    /**
     * Busca o endereço pelo CEP usando a API ViaCEP.
     *
     * @param string $cep
     * @return \Illuminate\Http\JsonResponse
     */
    public function buscarEndereco($cep)
    {
        // Faz uma requisição GET para a API ViaCEP com o CEP fornecido
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        
        // Verifica se a resposta da API foi bem-sucedida
        if ($response->ok()) {
            // Retorna a resposta da API em formato JSON
            return response()->json($response->json());
        } else {
            // Retorna um erro caso o CEP não seja encontrado
            return response()->json(['error' => 'CEP não encontrado.'], 404);
        }
    }

    /**
     * Busca o endereço pelo CEP no banco de dados.
     *
     * @param string $cep
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAddressByCep($cep)
    {
        // Busca o endereço no banco de dados usando o modelo Address
        $address = Address::where('cep', $cep)->first();
        
        // Verifica se o endereço foi encontrado
        if (!$address) {
            // Retorna um erro caso o CEP não seja encontrado no banco de dados
            return response()->json(['message' => 'CEP não encontrado'], 404);
        }
        
        // Retorna o endereço encontrado em formato JSON
        return response()->json($address);
    }
}
