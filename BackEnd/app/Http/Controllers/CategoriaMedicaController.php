<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoriaMedicaController extends Controller
{
    // Listar todas as categorias médicas
    public function index()
    {
        $categoriasMedicas = DB::table('categoriasmedica')->get();
        return response()->json($categoriasMedicas);
    }

    // Obter uma categoria médica específica
    public function show($id)
    {
        $categoriaMedica = DB::table('categoriasmedica')->where('categoriaMedicaID', $id)->first();
        if (!$categoriaMedica) {
            return response()->json(['message' => 'Categoria médica não encontrada'], 404);
        }
        return response()->json($categoriaMedica);
    }

    // Criar uma nova categoria médica
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomeCategoria' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $categoriaMedicaID = DB::table('categoriasmedica')->insertGetId([
            'nomeCategoria' => $request->nomeCategoria,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $categoriaMedica = DB::table('categoriasmedica')->where('categoriaMedicaID', $categoriaMedicaID)->first();
        return response()->json($categoriaMedica, 201);
    }

    // Atualizar uma categoria médica
    public function update(Request $request, $id)
    {
        $categoriaMedica = DB::table('categoriasmedica')->where('categoriaMedicaID', $id)->first();
        if (!$categoriaMedica) {
            return response()->json(['message' => 'Categoria médica não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeCategoria' => 'sometimes|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('categoriasmedica')
            ->where('categoriaMedicaID', $id)
            ->update([
                'nomeCategoria' => $request->nomeCategoria ?? $categoriaMedica->nomeCategoria,
                'updated_at' => now(),
            ]);

        $categoriaMedicaAtualizada = DB::table('categoriasmedica')->where('categoriaMedicaID', $id)->first();
        return response()->json($categoriaMedicaAtualizada);
    }

    // Excluir uma categoria médica
    public function destroy($id)
    {
        $categoriaMedica = DB::table('categoriasmedica')->where('categoriaMedicaID', $id)->first();
        if (!$categoriaMedica) {
            return response()->json(['message' => 'Categoria médica não encontrada'], 404);
        }

        DB::table('categoriasmedica')->where('categoriaMedicaID', $id)->delete();
        return response()->json(['message' => 'Categoria médica excluída com sucesso']);
    }
}