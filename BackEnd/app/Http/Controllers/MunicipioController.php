<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MunicipioController extends Controller
{
    // Listar todos os municípios
    public function index()
    {
        $municipios = DB::table('municipio')->get();
        return response()->json($municipios);
    }

    // Obter um município específico
    public function show($id)
    {
        $municipio = DB::table('municipio')->where('municipioID', $id)->first();
        if (!$municipio) {
            return response()->json(['message' => 'Município não encontrado'], 404);
        }
        return response()->json($municipio);
    }

    // Criar um novo município
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomeMunicipio' => 'required|string|max:50',
            'provinciaID' => 'nullable|integer|exists:provincia,provinciaID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $municipioID = DB::table('municipio')->insertGetId([
            'nomeMunicipio' => $request->nomeMunicipio,
            'provinciaID' => $request->provinciaID,
        ]);

        $novoMunicipio = DB::table('municipio')->where('municipioID', $municipioID)->first();
        return response()->json($novoMunicipio, 201);
    }

    // Atualizar um município
    public function update(Request $request, $id)
    {
        $municipio = DB::table('municipio')->where('municipioID', $id)->first();
        if (!$municipio) {
            return response()->json(['message' => 'Município não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeMunicipio' => 'nullable|string|max:50',
            'provinciaID' => 'nullable|integer|exists:provincia,provinciaID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('municipio')
            ->where('municipioID', $id)
            ->update([
                'nomeMunicipio' => $request->nomeMunicipio ?? $municipio->nomeMunicipio,
                'provinciaID' => $request->provinciaID ?? $municipio->provinciaID,
            ]);

        $municipioAtualizado = DB::table('municipio')->where('municipioID', $id)->first();
        return response()->json($municipioAtualizado);
    }

    // Excluir um município
    public function destroy($id)
    {
        $municipio = DB::table('municipio')->where('municipioID', $id)->first();
        if (!$municipio) {
            return response()->json(['message' => 'Município não encontrado'], 404);
        }

        DB::table('municipio')->where('municipioID', $id)->delete();
        return response()->json(['message' => 'Município excluído com sucesso']);
    }
}
