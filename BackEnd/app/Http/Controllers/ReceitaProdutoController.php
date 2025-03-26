<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReceitaProdutoController extends Controller
{
    // Listar todas as associações de receita-produto
    public function index()
    {
        $receitasProdutos = DB::table('receitaproduto')->get();
        return response()->json($receitasProdutos);
    }

    // Obter uma associação específica
    public function show($id)
    {
        $receitaProduto = DB::table('receitaproduto')->where('receitaProdutolD', $id)->first();
        if (!$receitaProduto) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }
        return response()->json($receitaProduto);
    }

    // Criar uma nova associação receita-produto
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receitalD' => 'nullable|integer|exists:receita,receitalD',
            'nrRegisto' => 'nullable|string|max:20|exists:produto,nrRegisto',
            'quantidade' => 'nullable|integer',
            'doselD' => 'nullable|string|max:40|exists:dose,doselD',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $receitaProdutolD = DB::table('receitaproduto')->insertGetId([
            'receitalD' => $request->receitalD,
            'nrRegisto' => $request->nrRegisto,
            'quantidade' => $request->quantidade,
            'doselD' => $request->doselD,
        ]);

        $novaAssociacao = DB::table('receitaproduto')->where('receitaProdutolD', $receitaProdutolD)->first();
        return response()->json($novaAssociacao, 201);
    }

    // Atualizar uma associação receita-produto
    public function update(Request $request, $id)
    {
        $receitaProduto = DB::table('receitaproduto')->where('receitaProdutolD', $id)->first();
        if (!$receitaProduto) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'receitalD' => 'nullable|integer|exists:receita,receitalD',
            'nrRegisto' => 'nullable|string|max:20|exists:produto,nrRegisto',
            'quantidade' => 'nullable|integer',
            'doselD' => 'nullable|string|max:40|exists:dose,doselD',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('receitaproduto')
            ->where('receitaProdutolD', $id)
            ->update([
                'receitalD' => $request->receitalD ?? $receitaProduto->receitalD,
                'nrRegisto' => $request->nrRegisto ?? $receitaProduto->nrRegisto,
                'quantidade' => $request->quantidade ?? $receitaProduto->quantidade,
                'doselD' => $request->doselD ?? $receitaProduto->doselD,
            ]);

        $associacaoAtualizada = DB::table('receitaproduto')->where('receitaProdutolD', $id)->first();
        return response()->json($associacaoAtualizada);
    }

    // Excluir uma associação receita-produto
    public function destroy($id)
    {
        $receitaProduto = DB::table('receitaproduto')->where('receitaProdutolD', $id)->first();
        if (!$receitaProduto) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }

        DB::table('receitaproduto')->where('receitaProdutolD', $id)->delete();
        return response()->json(['message' => 'Associação excluída com sucesso']);
    }
}
