<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UtilizadorController extends Controller
{
    // Listar todos os utilizadores
    public function index()
    {
        $utilizadores = DB::table('utilizador')->get();
        return response()->json($utilizadores);
    }

    // Obter um utilizador específico
    public function show($id)
    {
        $utilizador = DB::table('utilizador')->where('utilizadorID', $id)->first();
        if (!$utilizador) {
            return response()->json(['message' => 'Utilizador não encontrado'], 404);
        }
        return response()->json($utilizador);
    }

    // Criar um novo utilizador
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'utilizadorID' => 'required|integer|unique:utilizador,utilizadorID',
            'nomeUtilizador' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('utilizador')->insert([
            'utilizadorID' => $request->utilizadorID,
            'nomeUtilizador' => $request->nomeUtilizador,
        ]);

        $novoUtilizador = DB::table('utilizador')->where('utilizadorID', $request->utilizadorID)->first();
        return response()->json($novoUtilizador, 201);
    }

    // Atualizar um utilizador existente
    public function update(Request $request, $id)
    {
        $utilizador = DB::table('utilizador')->where('utilizadorID', $id)->first();
        if (!$utilizador) {
            return response()->json(['message' => 'Utilizador não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeUtilizador' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('utilizador')
            ->where('utilizadorID', $id)
            ->update([
                'nomeUtilizador' => $request->nomeUtilizador ?? $utilizador->nomeUtilizador,
            ]);

        $utilizadorAtualizado = DB::table('utilizador')->where('utilizadorID', $id)->first();
        return response()->json($utilizadorAtualizado);
    }

    // Excluir um utilizador
    public function destroy($id)
    {
        $utilizador = DB::table('utilizador')->where('utilizadorID', $id)->first();
        if (!$utilizador) {
            return response()->json(['message' => 'Utilizador não encontrado'], 404);
        }

        DB::table('utilizador')->where('utilizadorID', $id)->delete();
        return response()->json(['message' => 'Utilizador excluído com sucesso']);
    }
}
