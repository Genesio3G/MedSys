<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SexoController extends Controller
{
    // Listar todos os gêneros
    public function index()
    {
        $sexos = DB::table('sexo')->get();
        return response()->json($sexos);
    }

    // Obter um gênero específico
    public function show($id)
    {
        $sexo = DB::table('sexo')->where('sexoID', $id)->first();
        if (!$sexo) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }
        return response()->json($sexo);
    }

    // Criar um novo gênero
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sexoID' => 'required|integer|unique:sexo,sexoID',
            'genero' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('sexo')->insert([
            'sexoID' => $request->sexoID,
            'genero' => $request->genero,
        ]);

        $novoSexo = DB::table('sexo')->where('sexoID', $request->sexoID)->first();
        return response()->json($novoSexo, 201);
    }

    // Atualizar um gênero
    public function update(Request $request, $id)
    {
        $sexo = DB::table('sexo')->where('sexoID', $id)->first();
        if (!$sexo) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'genero' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('sexo')
            ->where('sexoID', $id)
            ->update([
                'genero' => $request->genero ?? $sexo->genero,
            ]);

        $sexoAtualizado = DB::table('sexo')->where('sexoID', $id)->first();
        return response()->json($sexoAtualizado);
    }

    // Excluir um gênero
    public function destroy($id)
    {
        $sexo = DB::table('sexo')->where('sexoID', $id)->first();
        if (!$sexo) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }

        DB::table('sexo')->where('sexoID', $id)->delete();
        return response()->json(['message' => 'Gênero excluído com sucesso']);
    }
}
