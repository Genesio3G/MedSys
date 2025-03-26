<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartaoCreditoController extends Controller
{
    // Listar todos os cartões
    public function index()
    {
        $cartoes = DB::table('cartoescredito')->get();
        return response()->json($cartoes);
    }

    // Obter um cartão específico
    public function show($id)
    {
        $cartao = DB::table('cartoescredito')->where('CartaoID', $id)->first();
        if (!$cartao) {
            return response()->json(['message' => 'Cartão não encontrado'], 404);
        }
        return response()->json($cartao);
    }

    // Criar um novo cartão
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NumeroCartao' => 'required|string|max:16',
            'DataExpiracao' => 'nullable|date',
            'CVV' => 'nullable|string|max:4',
            'ConvidadoID' => 'nullable|exists:convidados,ConvidadoID',
            'TipoID' => 'nullable|exists:tipocartaocredito,TipoID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $cartaoID = DB::table('cartoescredito')->insertGetId([
            'NumeroCartao' => $request->NumeroCartao,
            'DataExpiracao' => $request->DataExpiracao,
            'CVV' => $request->CVV,
            'ConvidadoID' => $request->ConvidadoID,
            'TipoID' => $request->TipoID,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $cartao = DB::table('cartoescredito')->where('CartaoID', $cartaoID)->first();
        return response()->json($cartao, 201);
    }

    // Atualizar um cartão
    public function update(Request $request, $id)
    {
        $cartao = DB::table('cartoescredito')->where('CartaoID', $id)->first();
        if (!$cartao) {
            return response()->json(['message' => 'Cartão não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'NumeroCartao' => 'sometimes|string|max:16',
            'DataExpiracao' => 'nullable|date',
            'CVV' => 'nullable|string|max:4',
            'ConvidadoID' => 'nullable|exists:convidados,ConvidadoID',
            'TipoID' => 'nullable|exists:tipocartaocredito,TipoID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('cartoescredito')
            ->where('CartaoID', $id)
            ->update([
                'NumeroCartao' => $request->NumeroCartao ?? $cartao->NumeroCartao,
                'DataExpiracao' => $request->DataExpiracao ?? $cartao->DataExpiracao,
                'CVV' => $request->CVV ?? $cartao->CVV,
                'ConvidadoID' => $request->ConvidadoID ?? $cartao->ConvidadoID,
                'TipoID' => $request->TipoID ?? $cartao->TipoID,
                'updated_at' => now(),
            ]);

        $cartaoAtualizado = DB::table('cartoescredito')->where('CartaoID', $id)->first();
        return response()->json($cartaoAtualizado);
    }

    // Excluir um cartão
    public function destroy($id)
    {
        $cartao = DB::table('cartoescredito')->where('CartaoID', $id)->first();
        if (!$cartao) {
            return response()->json(['message' => 'Cartão não encontrado'], 404);
        }

        DB::table('cartoescredito')->where('CartaoID', $id)->delete();
        return response()->json(['message' => 'Cartão excluído com sucesso']);
    }
}