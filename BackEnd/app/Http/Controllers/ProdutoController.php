<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    // Listar todos os produtos
    public function index()
    {
        $produtos = DB::table('produto')->get();
        return response()->json($produtos);
    }

    // Obter um produto específico
    public function show($id)
    {
        $produto = DB::table('produto')->where('nrRegisto', $id)->first();
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        return response()->json($produto);
    }

    // Criar um novo produto
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nrRegisto' => 'required|string|unique:produto,nrRegisto',
            'nomeProduto' => 'string',
            'bp' => 'numeric',
            'dataFabrico' => 'date',
            'dataValidade' => 'date',
            'categProduto' => '', // Ajuste conforme o nome real da tabela de categorias
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('produto')->insert([
            'nrRegisto' => $request->nrRegisto,
            'nomeProduto' => $request->nomeProduto,
            'bp' => $request->bp,
            'dataFabrico' => $request->dataFabrico,
            'dataValidade' => $request->dataValidade,
            'categProduto' => $request->categProduto,
        ]);

        $novoProduto = DB::table('produto')->where('nrRegisto', $request->nrRegisto)->first();
        return response()->json($novoProduto, 201);
    }

    // Atualizar um produto
    public function update(Request $request, $id)
    {
        $produto = DB::table('produto')->where('nrRegisto', $id)->first();
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeProduto' => 'nullable|string|max:30',
            'bp' => 'nullable|numeric',
            'dataFabrico' => 'nullable|date',
            'dataValidade' => 'nullable|date',
            'categProduto' => 'nullable|integer|exists:categoria,categoriaID', // Ajuste conforme o nome real da tabela de categorias
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('produto')
            ->where('nrRegisto', $id)
            ->update([
                'nomeProduto' => $request->nomeProduto ?? $produto->nomeProduto,
                'bp' => $request->bp ?? $produto->bp,
                'dataFabrico' => $request->dataFabrico ?? $produto->dataFabrico,
                'dataValidade' => $request->dataValidade ?? $produto->dataValidade,
                'categProduto' => $request->categProduto ?? $produto->categProduto,
            ]);

        $produtoAtualizado = DB::table('produto')->where('nrRegisto', $id)->first();
        return response()->json($produtoAtualizado);
    }

    // Excluir um produto
    public function destroy($id)
    {
        $produto = DB::table('produto')->where('nrRegisto', $id)->first();
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        DB::table('produto')->where('nrRegisto', $id)->delete();
        return response()->json(['message' => 'Produto excluído com sucesso']);
    }
}
