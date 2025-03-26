<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProdutoFabricanteController extends Controller
{
    // Listar todas as associações entre produtos e fabricantes
    public function index()
    {
        $produtosFabricantes = DB::table('produtofabricante')->get();
        return response()->json($produtosFabricantes);
    }

    // Obter uma associação específica
    public function show($id)
    {
        $produtoFabricante = DB::table('produtofabricante')->where('produtoFabricanteID', $id)->first();
        if (!$produtoFabricante) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }
        return response()->json($produtoFabricante);
    }

    // Criar uma nova associação
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nrRegisto' => 'nullable|string|max:20|exists:produto,nrRegisto',
            'fabricanteID' => 'nullable|integer|exists:fabricantes,fabricanteID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $produtoFabricanteID = DB::table('produtofabricante')->insertGetId([
            'nrRegisto' => $request->nrRegisto,
            'fabricanteID' => $request->fabricanteID,
        ]);

        $novaAssociacao = DB::table('produtofabricante')->where('produtoFabricanteID', $produtoFabricanteID)->first();
        return response()->json($novaAssociacao, 201);
    }

    // Atualizar uma associação
    public function update(Request $request, $id)
    {
        $produtoFabricante = DB::table('produtofabricante')->where('produtoFabricanteID', $id)->first();
        if (!$produtoFabricante) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nrRegisto' => 'nullable|string|max:20|exists:produto,nrRegisto',
            'fabricanteID' => 'nullable|integer|exists:fabricantes,fabricanteID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('produtofabricante')
            ->where('produtoFabricanteID', $id)
            ->update([
                'nrRegisto' => $request->nrRegisto ?? $produtoFabricante->nrRegisto,
                'fabricanteID' => $request->fabricanteID ?? $produtoFabricante->fabricanteID,
            ]);

        $associacaoAtualizada = DB::table('produtofabricante')->where('produtoFabricanteID', $id)->first();
        return response()->json($associacaoAtualizada);
    }

    // Excluir uma associação
    public function destroy($id)
    {
        $produtoFabricante = DB::table('produtofabricante')->where('produtoFabricanteID', $id)->first();
        if (!$produtoFabricante) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }

        DB::table('produtofabricante')->where('produtoFabricanteID', $id)->delete();
        return response()->json(['message' => 'Associação excluída com sucesso']);
    }
}
