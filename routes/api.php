<?php

use App\Http\Controllers\CepController; // Importa o controlador CepController
use Illuminate\Support\Facades\Route; // Importa a fachada Route

// Define uma rota que chama o método 'buscarEndereco' do 'CepController'
Route::get('/cep/{cep}', [CepController::class, 'buscarEndereco']);
