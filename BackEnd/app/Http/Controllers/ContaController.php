<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Conta;

class ContaController extends Controller
{
    // Listar todas as contas
    public function index()
    {
        $contas = Conta::all();
        return response()->json($contas);
    }

    // Obter uma conta específica
    public function show($id)
    {
        $conta = Conta::find($id);
        if (!$conta) {
            return response()->json(['message' => 'Conta não encontrada'], 404);
        }
        return response()->json($conta);
    }

    // Criar uma nova conta
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string|max:30',
            'senha' => 'required|string',
            'utilizadorID' => 'nullable|exists:utilizadores,utilizadorID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $conta = Conta::create([
            'usuario' => $request->usuario,
            'senha' => $request->senha,
            'utilizadorID' => $request->utilizadorID,
        ]);

        return response()->json($conta, 201);
    }

    // Atualizar uma conta
    public function update(Request $request, $id)
    {
        $conta = Conta::find($id);
        if (!$conta) {
            return response()->json(['message' => 'Conta não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string|max:30',
            'senha' => 'required|string',
            'utilizadorID' => 'nullable|exists:utilizadores,utilizadorID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $conta->update([
            'usuario' => $request->usuario ?? $conta->usuario,
            'senha' => $request->senha ?? $conta->senha,
            'utilizadorID' => $request->utilizadorID ?? $conta->utilizadorID,
        ]);

        return response()->json($conta);
    }

    // Excluir uma conta
    public function destroy($id)
    {
        $conta = Conta::find($id);
        if (!$conta) {
            return response()->json(['message' => 'Conta não encontrada'], 404);
        }

        $conta->delete();
        return response()->json(['message' => 'Conta excluída com sucesso']);
    }
}
