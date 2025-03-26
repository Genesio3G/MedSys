<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadeHospitalarController;
use App\Http\Controllers\TipoCartaoCreditoController;
use App\Http\Controllers\StockProdutoController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\ReceitaProdutoController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\MedicoHospitalController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FarmaciaController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\EspecialidadeMedicaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DadosPessoaisController;
use App\Http\Controllers\DoseController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriaMedicaController;
use App\Http\Controllers\ConvidadoController;
use App\Http\Controllers\CartaoCreditoController;


// Prefixo para unidade hospitalar
Route::prefix('unidadehospitalar')->group(function () {
    Route::get('', [UnidadeHospitalarController::class, 'index']);
    Route::get('/{id}', [UnidadeHospitalarController::class, 'show']);
    Route::post('/{id}', [UnidadeHospitalarController::class, 'update']);
    Route::delete('/{id}', [UnidadeHospitalarController::class, 'destroy']);
    Route::post('', [UnidadeHospitalarController::class, 'store']);
});

// Prefixo para tipo cartão de crédito
Route::prefix('tipocartaocredito')->group(function () {
    Route::get('', [TipoCartaoCreditoController::class, 'index']);
    Route::get('/{id}', [TipoCartaoCreditoController::class, 'show']);
    Route::post('/{id}', [TipoCartaoCreditoController::class, 'update']);
    Route::delete('/{id}', [TipoCartaoCreditoController::class, 'destroy']);
    Route::post('', [TipoCartaoCreditoController::class, 'store']);
});

// Prefixo para stock produto
Route::prefix('stockproduto')->group(function () {
    Route::get('', [StockProdutoController::class, 'index']);
    Route::get('/{id}', [StockProdutoController::class, 'show']);
    Route::post('/{id}', [StockProdutoController::class, 'update']);
    Route::delete('/{id}', [StockProdutoController::class, 'destroy']);
    Route::post('', [StockProdutoController::class, 'store']);
});

// Prefixo para stock
Route::prefix('stock')->group(function () {
    Route::get('', [StockController::class, 'index']);
    Route::get('/{id}', [StockController::class, 'show']);
    Route::post('/{id}', [StockController::class, 'update']);
    Route::delete('/{id}', [StockController::class, 'destroy']);
    Route::post('', [StockController::class, 'store']);
});

// Prefixo para sexo
Route::prefix('sexo')->group(function () {
    Route::get('', [SexoController::class, 'index']);
    Route::get('/{id}', [SexoController::class, 'show']);
    Route::post('/{id}', [SexoController::class, 'update']);
    Route::delete('/{id}', [SexoController::class, 'destroy']);
    Route::post('', [SexoController::class, 'store']);
});

// Prefixo para receita produto
Route::prefix('receitaproduto')->group(function () {
    Route::get('', [ReceitaProdutoController::class, 'index']);
    Route::get('/{id}', [ReceitaProdutoController::class, 'show']);
    Route::post('/{id}', [ReceitaProdutoController::class, 'update']);
    Route::delete('/{id}', [ReceitaProdutoController::class, 'destroy']);
    Route::post('', [ReceitaProdutoController::class, 'store']);
});

// Prefixo para receita
Route::prefix('receita')->group(function () {
    Route::get('', [ReceitaController::class, 'index']);
    Route::get('/{id}', [ReceitaController::class, 'show']);
    Route::post('/{id}', [ReceitaController::class, 'update']);
    Route::delete('/{id}', [ReceitaController::class, 'destroy']);
    Route::post('', [ReceitaController::class, 'store']);
});

// Prefixo para província
Route::prefix('provincia')->group(function () {
    Route::get('', [ProvinciaController::class, 'index']);
    Route::get('/{id}', [ProvinciaController::class, 'show']);
    Route::post('/{id}', [ProvinciaController::class, 'update']);
    Route::delete('/{id}', [ProvinciaController::class, 'destroy']);
    Route::post('', [ProvinciaController::class, 'store']);
});

// Prefixo para produto
Route::prefix('produto')->group(function () {
    Route::get('', [ProdutoController::class, 'index']);
    Route::get('/{id}', [ProdutoController::class, 'show']);
    Route::post('/{id}', [ProdutoController::class, 'update']);
    Route::delete('/{id}', [ProdutoController::class, 'destroy']);
    Route::post('', [ProdutoController::class, 'store']);
});

// Prefixo para país
Route::prefix('pais')->group(function () {
    Route::get('', [PaisController::class, 'index']);
    Route::get('/{id}', [PaisController::class, 'show']);
    Route::post('/{id}', [PaisController::class, 'update']);
    Route::delete('/{id}', [PaisController::class, 'destroy']);
    Route::post('', [PaisController::class, 'store']);
});

// Prefixo para município
Route::prefix('municipio')->group(function () {
    Route::get('', [MunicipioController::class, 'index']);
    Route::get('/{id}', [MunicipioController::class, 'show']);
    Route::post('/{id}', [MunicipioController::class, 'update']);
    Route::delete('/{id}', [MunicipioController::class, 'destroy']);
    Route::post('', [MunicipioController::class, 'store']);
});

// Prefixo para médico hospital
Route::prefix('medicohospital')->group(function () {
    Route::get('', [MedicoHospitalController::class, 'index']);
    Route::get('/{id}', [MedicoHospitalController::class, 'show']);
    Route::post('/{id}', [MedicoHospitalController::class, 'update']);
    Route::delete('/{id}', [MedicoHospitalController::class, 'destroy']);
    Route::post('', [MedicoHospitalController::class, 'store']);
});

// Prefixo para médico
Route::prefix('medico')->group(function () {
    Route::get('', [MedicoController::class, 'index']);
    Route::get('/{id}', [MedicoController::class, 'show']);
    Route::post('/{id}', [MedicoController::class, 'update']);
    Route::delete('/{id}', [MedicoController::class, 'destroy']);
    Route::post('', [MedicoController::class, 'store']);
});

// Prefixo para funcionário
Route::prefix('funcionario')->group(function () {
    Route::get('', [FuncionarioController::class, 'index']);
    Route::get('/{id}', [FuncionarioController::class, 'show']);
    Route::post('/{id}', [FuncionarioController::class, 'update']);
    Route::delete('/{id}', [FuncionarioController::class, 'destroy']);
    Route::post('', [FuncionarioController::class, 'store']);
});

// Prefixo para farmácia
Route::prefix('farmacia')->group(function () {
    Route::get('', [FarmaciaController::class, 'index']);
    Route::get('/{id}', [FarmaciaController::class, 'show']);
    Route::post('/{id}', [FarmaciaController::class, 'update']);
    Route::delete('/{id}', [FarmaciaController::class, 'destroy']);
    Route::post('', [FarmaciaController::class, 'store']);
});

// Prefixo para fabricante
Route::prefix('fabricantes')->group(function () {
    Route::get('', [FabricanteController::class, 'index']);
    Route::get('/{id}', [FabricanteController::class, 'show']);
    Route::post('/{id}', [FabricanteController::class, 'update']);
    Route::delete('/{id}', [FabricanteController::class, 'destroy']);
    Route::post('', [FabricanteController::class, 'store']);
});

// Prefixo para estado civil
Route::prefix('estadocivil')->group(function () {
    Route::get('', [EstadoCivilController::class, 'index']);
    Route::get('/{id}', [EstadoCivilController::class, 'show']);
    Route::post('/{id}', [EstadoCivilController::class, 'update']);
    Route::delete('/{id}', [EstadoCivilController::class, 'destroy']);
    Route::post('', [EstadoCivilController::class, 'store']);
});

// Prefixo para especialidades médicas
Route::prefix('especialidadesmedicas')->group(function () {
    Route::get('', [EspecialidadeMedicaController::class, 'index']);
    Route::get('/{id}', [EspecialidadeMedicaController::class, 'show']);
    Route::post('/{id}', [EspecialidadeMedicaController::class, 'update']);
    Route::delete('/{id}', [EspecialidadeMedicaController::class, 'destroy']);
    Route::post('', [EspecialidadeMedicaController::class, 'store']);
});

// Prefixo para clientes
Route::prefix('clientes')->group(function () {
    Route::get('', [ClienteController::class, 'index']);
    Route::get('/{id}', [ClienteController::class, 'show']);
    Route::post('/{id}', [ClienteController::class, 'update']);
    Route::delete('/{id}', [ClienteController::class, 'destroy']);
    Route::post('', [ClienteController::class, 'store']);
});

// Prefixo para dados pessoais
Route::prefix('dadospessoais')->group(function () {
    Route::get('', [DadosPessoaisController::class, 'index']);
    Route::get('/{id}', [DadosPessoaisController::class, 'show']);
    Route::post('/{id}', [DadosPessoaisController::class, 'update']);
    Route::delete('/{id}', [DadosPessoaisController::class, 'destroy']);
    Route::post('', [DadosPessoaisController::class, 'store']);
});

// Prefixo para doses
Route::prefix('doses')->group(function () {
    Route::get('', [DoseController::class, 'index']);
    Route::get('/{id}', [DoseController::class, 'show']);
    Route::post('/{id}', [DoseController::class, 'update']);
    Route::delete('/{id}', [DoseController::class, 'destroy']);
    Route::post('', [DoseController::class, 'store']);
});

// Prefixo para endereços
Route::prefix('enderecos')->group(function () {
    Route::get('', [EnderecoController::class, 'index']);
    Route::get('/{id}', [EnderecoController::class, 'show']);
    Route::post('/{id}', [EnderecoController::class, 'update']);
    Route::delete('/{id}', [EnderecoController::class, 'destroy']);
    Route::post('', [EnderecoController::class, 'store']);
});

// Prefixo para categorias
Route::prefix('categorias')->group(function () {
    Route::get('', [CategoriaController::class, 'index']);
    Route::get('/{id}', [CategoriaController::class, 'show']);
    Route::post('/{id}', [CategoriaController::class, 'update']);
    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
    Route::post('', [CategoriaController::class, 'store']);
});

// Prefixo para categorias médicas
Route::prefix('categoriasmedica')->group(function () {
    Route::get('', [CategoriaMedicaController::class, 'index']);
    Route::get('/{id}', [CategoriaMedicaController::class, 'show']);
    Route::post('/{id}', [CategoriaMedicaController::class, 'update']);
    Route::delete('/{id}', [CategoriaMedicaController::class, 'destroy']);
    Route::post('', [CategoriaMedicaController::class, 'store']);
});

// Prefixo para convidados
Route::prefix('convidados')->group(function () {
    Route::get('', [ConvidadoController::class, 'index']);
    Route::get('/{id}', [ConvidadoController::class, 'show']);
    Route::post('/{id}', [ConvidadoController::class, 'update']);
    Route::delete('/{id}', [ConvidadoController::class, 'destroy']);
    Route::post('', [ConvidadoController::class, 'store']);
});

// Prefixo para cartões de crédito
Route::prefix('cartoescredito')->group(function () {
    Route::get('', [CartaoCreditoController::class, 'index']);
    Route::get('/{id}', [CartaoCreditoController::class, 'show']);
    Route::post('/{id}', [CartaoCreditoController::class, 'update']);
    Route::delete('/{id}', [CartaoCreditoController::class, 'destroy']);
    Route::post('', [CartaoCreditoController::class, 'store']);
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});