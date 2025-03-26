<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EspecialidadeMedicaController extends Controller
{
    // Listar todas as especialidades médicas
    public function index()
    {
        $especialidades = DB::table('especialidadesmedica')->get();
        return response()->json($especialidades);
    }

    // Obter uma especialidade específica
    public function show($id)
    {
        $especialidade = DB::table('especialidadesmedica')->where('especialidadeID', $id)->first();
        if (!$especialidade) {
            return response()->json(['message' => 'Especialidade não encontrada'], 404);
        }
        return response()->json($especialidade);
    }

    // Criar uma nova especialidade
    public function store(Request $request)
    {
        $request->validate([
            'nomeEspecialidade' => 'nullable|string|max:50',
            'categoriaMedicaID' => 'nullable|integer',
        ]);

        $especialidadeID = DB::table('especialidadesmedica')->insertGetId([
            'nomeEspecialidade' => $request->nomeEspecialidade,
            'categoriaMedicaID' => $request->categoriaMedicaID,
        ]);

        $especialidade = DB::table('especialidadesmedica')->where('especialidadeID', $especialidadeID)->first();
        return response()->json($especialidade, 201);
    }

    // Atualizar uma especialidade médica
    public function update(Request $request, $id)
    {
        $especialidade = DB::table('especialidadesmedica')->where('especialidadeID', $id)->first();
        if (!$especialidade) {
            return response()->json(['message' => 'Especialidade não encontrada'], 404);
        }

        $request->validate([
            'nomeEspecialidade' => 'nullable|string|max:50',
            'categoriaMedicaID' => 'nullable|integer',
        ]);

        DB::table('especialidadesmedica')
            ->where('especialidadeID', $id)
            ->update([
                'nomeEspecialidade' => $request->nomeEspecialidade ?? $especialidade->nomeEspecialidade,
                'categoriaMedicaID' => $request->categoriaMedicaID ?? $especialidade->categoriaMedicaID,
            ]);

        $especialidadeAtualizada = DB::table('especialidadesmedica')->where('especialidadeID', $id)->first();
        return response()->json($especialidadeAtualizada);
    }

    // Excluir uma especialidade médica
    public function destroy($id)
    {
        $especialidade = DB::table('especialidadesmedica')->where('especialidadeID', $id)->first();
        if (!$especialidade) {
            return response()->json(['message' => 'Especialidade não encontrada'], 404);
        }

        DB::table('especialidadesmedica')->where('especialidadeID', $id)->delete();
        return response()->json(['message' => 'Especialidade excluída com sucesso']);
    }
}
