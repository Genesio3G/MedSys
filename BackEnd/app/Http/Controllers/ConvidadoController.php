<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConvidadoController extends Controller
{
    // Listar todos os convidados
    public function index()
    {
        $convidados = DB::table('convidados')->get();
        return response()->json($convidados);
    }

    // Obter um convidado específico
    public function show($id)
    {
        $convidado = DB::table('convidados')->where('ConvidadoID', $id)->first();
        if (!$convidado) {
            return response()->json(['message' => 'Convidado não encontrado'], 404);
        }
        return response()->json($convidado);
    }

    // Criar um novo convidado
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'DadosPessoaisID' => 'nullable|exists:dadospessoais,DadosPessoaisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $convidadoID = DB::table('convidados')->insertGetId([
            'DadosPessoaisID' => $request->DadosPessoaisID,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $convidado = DB::table('convidados')->where('ConvidadoID', $convidadoID)->first();
        return response()->json($convidado, 201);
    }

    // Atualizar um convidado
    public function update(Request $request, $id)
    {
        $convidado = DB::table('convidados')->where('ConvidadoID', $id)->first();
        if (!$convidado) {
            return response()->json(['message' => 'Convidado não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'DadosPessoaisID' => 'nullable|exists:dadospessoais,DadosPessoaisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('convidados')
            ->where('ConvidadoID', $id)
            ->update([
                'DadosPessoaisID' => $request->DadosPessoaisID ?? $convidado->DadosPessoaisID,
                'updated_at' => now(),
            ]);

        $convidadoAtualizado = DB::table('convidados')->where('ConvidadoID', $id)->first();
        return response()->json($convidadoAtualizado);
    }

    // Excluir um convidado
    public function destroy($id)
    {
        $convidado = DB::table('convidados')->where('ConvidadoID', $id)->first();
        if (!$convidado) {
            return response()->json(['message' => 'Convidado não encontrado'], 404);
        }

        DB::table('convidados')->where('ConvidadoID', $id)->delete();
        return response()->json(['message' => 'Convidado excluído com sucesso']);
    }
}