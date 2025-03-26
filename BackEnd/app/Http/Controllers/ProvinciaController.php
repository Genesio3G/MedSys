<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProvinciaController extends Controller
{
    // Listar todas as províncias
    public function index()
    {
        $provincias = DB::table('provincia')->get();
        return response()->json($provincias);
    }

    // Obter uma província específica
    public function show($id)
    {
        $provincia = DB::table('provincia')->where('provinciaID', $id)->first();
        if (!$provincia) {
            return response()->json(['message' => 'Província não encontrada'], 404);
        }
        return response()->json($provincia);
    }

    // Criar uma nova província
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomeProvincia' => 'required|string|max:50',
            'paisID' => 'nullable|integer|exists:pais,paisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $provinciaID = DB::table('provincia')->insertGetId([
            'nomeProvincia' => $request->nomeProvincia,
            'paisID' => $request->paisID,
        ]);

        $novaProvincia = DB::table('provincia')->where('provinciaID', $provinciaID)->first();
        return response()->json($novaProvincia, 201);
    }

    // Atualizar uma província
    public function update(Request $request, $id)
    {
        $provincia = DB::table('provincia')->where('provinciaID', $id)->first();
        if (!$provincia) {
            return response()->json(['message' => 'Província não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeProvincia' => 'nullable|string|max:50',
            'paisID' => 'nullable|integer|exists:pais,paisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('provincia')
            ->where('provinciaID', $id)
            ->update([
                'nomeProvincia' => $request->nomeProvincia ?? $provincia->nomeProvincia,
                'paisID' => $request->paisID ?? $provincia->paisID,
            ]);

        $provinciaAtualizada = DB::table('provincia')->where('provinciaID', $id)->first();
        return response()->json($provinciaAtualizada);
    }

    // Excluir uma província
    public function destroy($id)
    {
        $provincia = DB::table('provincia')->where('provinciaID', $id)->first();
        if (!$provincia) {
            return response()->json(['message' => 'Província não encontrada'], 404);
        }

        DB::table('provincia')->where('provinciaID', $id)->delete();
        return response()->json(['message' => 'Província excluída com sucesso']);
    }
}
