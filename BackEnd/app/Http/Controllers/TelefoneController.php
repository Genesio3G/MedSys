<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TelefoneController extends Controller
{
    // Listar todos os telefones
    public function index()
    {
        $telefones = DB::table('telefone')->get();
        return response()->json($telefones);
    }

    // Obter um telefone específico
    public function show($id)
    {
        $telefone = DB::table('telefone')->where('telefoneID', $id)->first();
        if (!$telefone) {
            return response()->json(['message' => 'Telefone não encontrado'], 404);
        }
        return response()->json($telefone);
    }

    // Criar um novo telefone
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numeroTelefone' => 'nullable|string|max:20',
            'tipoTelefone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $telefoneID = DB::table('telefone')->insertGetId([
            'numeroTelefone' => $request->numeroTelefone,
            'tipoTelefone' => $request->tipoTelefone,
        ]);

        $novoTelefone = DB::table('telefone')->where('telefoneID', $telefoneID)->first();
        return response()->json($novoTelefone, 201);
    }

    // Atualizar um telefone existente
    public function update(Request $request, $id)
    {
        $telefone = DB::table('telefone')->where('telefoneID', $id)->first();
        if (!$telefone) {
            return response()->json(['message' => 'Telefone não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'numeroTelefone' => 'nullable|string|max:20',
            'tipoTelefone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('telefone')
            ->where('telefoneID', $id)
            ->update([
                'numeroTelefone' => $request->numeroTelefone ?? $telefone->numeroTelefone,
                'tipoTelefone' => $request->tipoTelefone ?? $telefone->tipoTelefone,
            ]);

        $telefoneAtualizado = DB::table('telefone')->where('telefoneID', $id)->first();
        return response()->json($telefoneAtualizado);
    }

    // Excluir um telefone
    public function destroy($id)
    {
        $telefone = DB::table('telefone')->where('telefoneID', $id)->first();
        if (!$telefone) {
            return response()->json(['message' => 'Telefone não encontrado'], 404);
        }

        DB::table('telefone')->where('telefoneID', $id)->delete();
        return response()->json(['message' => 'Telefone excluído com sucesso']);
    }
}
