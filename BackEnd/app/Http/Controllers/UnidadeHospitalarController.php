<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UnidadeHospitalarController extends Controller
{
    // Listar todas as unidades hospitalares
    public function index()
    {
        $unidades = DB::table('unidadehospitalar')->get();
        return response()->json($unidades);
    }

    // Obter uma unidade hospitalar específica
    public function show($id)
    {
        $unidade = DB::table('unidadehospitalar')->where('unidadeHospitalarID', $id)->first();
        if (!$unidade) {
            return response()->json(['message' => 'Unidade hospitalar não encontrada'], 404);
        }
        return response()->json($unidade);
    }

    // Criar uma nova unidade hospitalar
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomeUnidade' => 'nullable|string|max:50',
            'enderecoID' => 'nullable|integer|exists:endereco,enderecoID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $unidadeHospitalarID = DB::table('unidadehospitalar')->insertGetId([
            'nomeUnidade' => $request->nomeUnidade,
            'enderecoID' => $request->enderecoID,
        ]);

        $novaUnidade = DB::table('unidadehospitalar')->where('unidadeHospitalarID', $unidadeHospitalarID)->first();
        return response()->json($novaUnidade, 201);
    }

    // Atualizar uma unidade hospitalar
    public function update(Request $request, $id)
    {
        $unidade = DB::table('unidadehospitalar')->where('unidadeHospitalarID', $id)->first();
        if (!$unidade) {
            return response()->json(['message' => 'Unidade hospitalar não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeUnidade' => 'nullable|string|max:50',
            'enderecoID' => 'nullable|integer|exists:endereco,enderecoID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('unidadehospitalar')
            ->where('unidadeHospitalarID', $id)
            ->update([
                'nomeUnidade' => $request->nomeUnidade ?? $unidade->nomeUnidade,
                'enderecoID' => $request->enderecoID ?? $unidade->enderecoID,
            ]);

        $unidadeAtualizada = DB::table('unidadehospitalar')->where('unidadeHospitalarID', $id)->first();
        return response()->json($unidadeAtualizada);
    }

    // Excluir uma unidade hospitalar
    public function destroy($id)
    {
        $unidade = DB::table('unidadehospitalar')->where('unidadeHospitalarID', $id)->first();
        if (!$unidade) {
            return response()->json(['message' => 'Unidade hospitalar não encontrada'], 404);
        }

        DB::table('unidadehospitalar')->where('unidadeHospitalarID', $id)->delete();
        return response()->json(['message' => 'Unidade hospitalar excluída com sucesso']);
    }
}
