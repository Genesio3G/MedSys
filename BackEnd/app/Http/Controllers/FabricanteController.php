<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FabricanteController extends Controller
{
    // Listar todos os fabricantes
    public function index()
    {
        $fabricantes = DB::table('fabricantes')->get();
        return response()->json($fabricantes);
    }

    // Obter um fabricante específico
    public function show($id)
    {
        $fabricante = DB::table('fabricantes')->where('fabricanteID', $id)->first();
        if (!$fabricante) {
            return response()->json(['message' => 'Fabricante não encontrado'], 404);
        }
        return response()->json($fabricante);
    }

    // Criar um novo fabricante
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomeFabricante' => 'required|string|max:50',
            'paisID' => 'nullable|integer|exists:paises,paisID', // Ajuste conforme a tabela `paises`
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $fabricanteID = DB::table('fabricantes')->insertGetId([
            'nomeFabricante' => $request->nomeFabricante,
            'paisID' => $request->paisID,
        ]);

        $fabricante = DB::table('fabricantes')->where('fabricanteID', $fabricanteID)->first();
        return response()->json($fabricante, 201);
    }

    // Atualizar um fabricante
    public function update(Request $request, $id)
    {
        $fabricante = DB::table('fabricantes')->where('fabricanteID', $id)->first();
        if (!$fabricante) {
            return response()->json(['message' => 'Fabricante não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeFabricante' => 'nullable|string|max:50',
            'paisID' => 'nullable|integer|exists:paises,paisID', // Ajuste conforme a tabela `paises`
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('fabricantes')
            ->where('fabricanteID', $id)
            ->update([
                'nomeFabricante' => $request->nomeFabricante ?? $fabricante->nomeFabricante,
                'paisID' => $request->paisID ?? $fabricante->paisID,
            ]);

        $fabricanteAtualizado = DB::table('fabricantes')->where('fabricanteID', $id)->first();
        return response()->json($fabricanteAtualizado);
    }

    // Excluir um fabricante
    public function destroy($id)
    {
        $fabricante = DB::table('fabricantes')->where('fabricanteID', $id)->first();
        if (!$fabricante) {
            return response()->json(['message' => 'Fabricante não encontrado'], 404);
        }

        DB::table('fabricantes')->where('fabricanteID', $id)->delete();
        return response()->json(['message' => 'Fabricante excluído com sucesso']);
    }
}
