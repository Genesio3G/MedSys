<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    // Listar todas as categorias
    public function index()
    {
        $categorias = DB::table('categoria')->get();
        return response()->json($categorias);
    }

    // Obter uma categoria específica
    public function show($id)
    {
        $categoria = DB::table('categoria')->where('categoriaID', $id)->first();
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }
        return response()->json($categoria);
    }

    // Criar uma nova categoria
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomeCategoria' => 'required|string|max:50',
            'descricao' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $categoriaID = DB::table('categoria')->insertGetId([
            'nomeCategoria' => $request->nomeCategoria,
            'descricao' => $request->descricao,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $categoria = DB::table('categoria')->where('categoriaID', $categoriaID)->first();
        return response()->json($categoria, 201);
    }

    // Atualizar uma categoria
    public function update(Request $request, $id)
    {
        $categoria = DB::table('categoria')->where('categoriaID', $id)->first();
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeCategoria' => 'sometimes|string|max:50',
            'descricao' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('categoria')
            ->where('categoriaID', $id)
            ->update([
                'nomeCategoria' => $request->nomeCategoria ?? $categoria->nomeCategoria,
                'descricao' => $request->descricao ?? $categoria->descricao,
                'updated_at' => now(),
            ]);

        $categoriaAtualizada = DB::table('categoria')->where('categoriaID', $id)->first();
        return response()->json($categoriaAtualizada);
    }

    // Excluir uma categoria
    public function destroy($id)
    {
        $categoria = DB::table('categoria')->where('categoriaID', $id)->first();
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        DB::table('categoria')->where('categoriaID', $id)->delete();
        return response()->json(['message' => 'Categoria excluída com sucesso']);
    }
}