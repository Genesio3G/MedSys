<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EstadoCivilController extends Controller
{
    // Listar todos os registros
    public function index()
    {
        $estadosCivis = DB::table('estadocivil')->get();
        return response()->json($estadosCivis);
    }

    // Obter um registro específico
    public function show($id)
    {
        $estadoCivil = DB::table('estadocivil')->where('estadoCivilID', $id)->first();
        if (!$estadoCivil) {
            return response()->json(['message' => 'Estado Civil não encontrado'], 404);
        }
        return response()->json($estadoCivil);
    }

    // Criar um novo registro
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descricaoEstadoCivil' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $estadoCivilID = DB::table('estadocivil')->insertGetId([
            'descricaoEstadoCivil' => $request->descricaoEstadoCivil,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $estadoCivil = DB::table('estadocivil')->where('estadoCivilID', $estadoCivilID)->first();
        return response()->json($estadoCivil, 201);
    }

    // Atualizar um registro existente
    public function update(Request $request, $id)
    {
        $estadoCivil = DB::table('estadocivil')->where('estadoCivilID', $id)->first();
        if (!$estadoCivil) {
            return response()->json(['message' => 'Estado Civil não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'descricaoEstadoCivil' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('estadocivil')
            ->where('estadoCivilID', $id)
            ->update([
                'descricaoEstadoCivil' => $request->descricaoEstadoCivil ?? $estadoCivil->descricaoEstadoCivil,
                'updated_at' => now(),
            ]);

        $estadoCivilAtualizado = DB::table('estadocivil')->where('estadoCivilID', $id)->first();
        return response()->json($estadoCivilAtualizado);
    }

    // Excluir um registro
    public function destroy($id)
    {
        $estadoCivil = DB::table('estadocivil')->where('estadoCivilID', $id)->first();
        if (!$estadoCivil) {
            return response()->json(['message' => 'Estado Civil não encontrado'], 404);
        }

        DB::table('estadocivil')->where('estadoCivilID', $id)->delete();
        return response()->json(['message' => 'Estado Civil excluído com sucesso']);
    }
}
