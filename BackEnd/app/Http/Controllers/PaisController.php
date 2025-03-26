<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaisController extends Controller
{
    // Listar todos os países
    public function index()
    {
        $paises = DB::table('pais')->get();
        return response()->json($paises);
    }

    // Obter um país específico
    public function show($id)
    {
        $pais = DB::table('pais')->where('paisID', $id)->first();
        if (!$pais) {
            return response()->json(['message' => 'País não encontrado'], 404);
        }
        return response()->json($pais);
    }

    // Criar um novo país
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomePais' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $paisID = DB::table('pais')->insertGetId([
            'nomePais' => $request->nomePais,
        ]);

        $novoPais = DB::table('pais')->where('paisID', $paisID)->first();
        return response()->json($novoPais, 201);
    }

    // Atualizar um país
    public function update(Request $request, $id)
    {
        $pais = DB::table('pais')->where('paisID', $id)->first();
        if (!$pais) {
            return response()->json(['message' => 'País não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomePais' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('pais')
            ->where('paisID', $id)
            ->update([
                'nomePais' => $request->nomePais ?? $pais->nomePais,
            ]);

        $paisAtualizado = DB::table('pais')->where('paisID', $id)->first();
        return response()->json($paisAtualizado);
    }

    // Excluir um país
    public function destroy($id)
    {
        $pais = DB::table('pais')->where('paisID', $id)->first();
        if (!$pais) {
            return response()->json(['message' => 'País não encontrado'], 404);
        }

        DB::table('pais')->where('paisID', $id)->delete();
        return response()->json(['message' => 'País excluído com sucesso']);
    }
}
