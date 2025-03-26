<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReceitaController extends Controller
{
    // Listar todas as receitas
    public function index()
    {
        $receitas = DB::table('receita')->get();
        return response()->json($receitas);
    }

    // Obter uma receita específica
    public function show($id)
    {
        $receita = DB::table('receita')->where('receitalD', $id)->first();
        if (!$receita) {
            return response()->json(['message' => 'Receita não encontrada'], 404);
        }
        return response()->json($receita);
    }

    // Criar uma nova receita
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'clienteID' => 'nullable|integer|exists:clientes,clienteID',
            'numOrdem' => 'nullable|string|max:30|exists:medico,numOrdem',
            'dataReceita' => 'nullable|string|max:30',
            'comprado' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $receitalD = DB::table('receita')->insertGetId([
            'clienteID' => $request->clienteID,
            'numOrdem' => $request->numOrdem,
            'dataReceita' => $request->dataReceita,
            'comprado' => $request->comprado,
        ]);

        $novaReceita = DB::table('receita')->where('receitalD', $receitalD)->first();
        return response()->json($novaReceita, 201);
    }

    // Atualizar uma receita
    public function update(Request $request, $id)
    {
        $receita = DB::table('receita')->where('receitalD', $id)->first();
        if (!$receita) {
            return response()->json(['message' => 'Receita não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'clienteID' => 'nullable|integer|exists:clientes,clienteID',
            'numOrdem' => 'nullable|string|max:30|exists:medico,numOrdem',
            'dataReceita' => 'nullable|string|max:30',
            'comprado' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('receita')
            ->where('receitalD', $id)
            ->update([
                'clienteID' => $request->clienteID ?? $receita->clienteID,
                'numOrdem' => $request->numOrdem ?? $receita->numOrdem,
                'dataReceita' => $request->dataReceita ?? $receita->dataReceita,
                'comprado' => $request->comprado ?? $receita->comprado,
            ]);

        $receitaAtualizada = DB::table('receita')->where('receitalD', $id)->first();
        return response()->json($receitaAtualizada);
    }

    // Excluir uma receita
    public function destroy($id)
    {
        $receita = DB::table('receita')->where('receitalD', $id)->first();
        if (!$receita) {
            return response()->json(['message' => 'Receita não encontrada'], 404);
        }

        DB::table('receita')->where('receitalD', $id)->delete();
        return response()->json(['message' => 'Receita excluída com sucesso']);
    }
}
