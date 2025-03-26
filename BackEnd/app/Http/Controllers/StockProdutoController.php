<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StockProdutoController extends Controller
{
    // Listar todos os produtos no estoque
    public function index()
    {
        $stockProdutos = DB::table('stockproduto')->get();
        return response()->json($stockProdutos);
    }

    // Obter um produto específico no estoque
    public function show($id)
    {
        $stockProduto = DB::table('stockproduto')->where('stockProdutolD', $id)->first();
        if (!$stockProduto) {
            return response()->json(['message' => 'Produto no estoque não encontrado'], 404);
        }
        return response()->json($stockProduto);
    }

    // Criar uma nova entrada de produto no estoque
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stockID' => 'nullable|integer|exists:stock,stockID',
            'nrRegisto' => 'nullable|string|max:20|exists:produto,nrRegisto',
            'preco' => 'nullable|numeric',
            'qntidadeStock' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $stockProdutolD = DB::table('stockproduto')->insertGetId([
            'stockID' => $request->stockID,
            'nrRegisto' => $request->nrRegisto,
            'preco' => $request->preco,
            'qntidadeStock' => $request->qntidadeStock,
        ]);

        $novoStockProduto = DB::table('stockproduto')->where('stockProdutolD', $stockProdutolD)->first();
        return response()->json($novoStockProduto, 201);
    }

    // Atualizar uma entrada de produto no estoque
    public function update(Request $request, $id)
    {
        $stockProduto = DB::table('stockproduto')->where('stockProdutolD', $id)->first();
        if (!$stockProduto) {
            return response()->json(['message' => 'Produto no estoque não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'stockID' => 'nullable|integer|exists:stock,stockID',
            'nrRegisto' => 'nullable|string|max:20|exists:produto,nrRegisto',
            'preco' => 'nullable|numeric',
            'qntidadeStock' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('stockproduto')
            ->where('stockProdutolD', $id)
            ->update([
                'stockID' => $request->stockID ?? $stockProduto->stockID,
                'nrRegisto' => $request->nrRegisto ?? $stockProduto->nrRegisto,
                'preco' => $request->preco ?? $stockProduto->preco,
                'qntidadeStock' => $request->qntidadeStock ?? $stockProduto->qntidadeStock,
            ]);

        $stockProdutoAtualizado = DB::table('stockproduto')->where('stockProdutolD', $id)->first();
        return response()->json($stockProdutoAtualizado);
    }

    // Excluir uma entrada de produto no estoque
    public function destroy($id)
    {
        $stockProduto = DB::table('stockproduto')->where('stockProdutolD', $id)->first();
        if (!$stockProduto) {
            return response()->json(['message' => 'Produto no estoque não encontrado'], 404);
        }

        DB::table('stockproduto')->where('stockProdutolD', $id)->delete();
        return response()->json(['message' => 'Produto no estoque excluído com sucesso']);
    }
}
