<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FarmaciaController extends Controller
{
    // Listar todas as farmácias
    public function index()
    {
        $farmacias = DB::table('farmacia')->get();
        return response()->json($farmacias);
    }

    // Obter uma farmácia específica
    public function show($licenca)
    {
        $farmacia = DB::table('farmacia')->where('licenca', $licenca)->first();
        if (!$farmacia) {
            return response()->json(['message' => 'Farmácia não encontrada'], 404);
        }
        return response()->json($farmacia);
    }

    // Criar uma nova farmácia
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'licenca' => 'required|string|max:30|unique:farmacia,licenca',
            'nomeFarmacia' => 'nullable|string|max:50',
            'endereco' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('farmacia')->insert([
            'licenca' => $request->licenca,
            'nomeFarmacia' => $request->nomeFarmacia,
            'endereco' => $request->endereco,
        ]);

        $novaFarmacia = DB::table('farmacia')->where('licenca', $request->licenca)->first();
        return response()->json($novaFarmacia, 201);
    }

    // Atualizar uma farmácia
    public function update(Request $request, $licenca)
    {
        $farmacia = DB::table('farmacia')->where('licenca', $licenca)->first();
        if (!$farmacia) {
            return response()->json(['message' => 'Farmácia não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeFarmacia' => 'nullable|string|max:50',
            'endereco' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('farmacia')
            ->where('licenca', $licenca)
            ->update([
                'nomeFarmacia' => $request->nomeFarmacia ?? $farmacia->nomeFarmacia,
                'endereco' => $request->endereco ?? $farmacia->endereco,
            ]);

        $farmaciaAtualizada = DB::table('farmacia')->where('licenca', $licenca)->first();
        return response()->json($farmaciaAtualizada);
    }

    // Excluir uma farmácia
    public function destroy($licenca)
    {
        $farmacia = DB::table('farmacia')->where('licenca', $licenca)->first();
        if (!$farmacia) {
            return response()->json(['message' => 'Farmácia não encontrada'], 404);
        }

        DB::table('farmacia')->where('licenca', $licenca)->delete();
        return response()->json(['message' => 'Farmácia excluída com sucesso']);
    }
}
