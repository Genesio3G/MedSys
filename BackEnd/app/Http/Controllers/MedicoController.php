<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MedicoController extends Controller
{
    // Listar todos os médicos
    public function index()
    {
        $medicos = DB::table('medico')->get();
        return response()->json($medicos);
    }

    // Obter um médico específico
    public function show($id)
    {
        $medico = DB::table('medico')->where('numOrdem', $id)->first();
        if (!$medico) {
            return response()->json(['message' => 'Médico não encontrado'], 404);
        }
        return response()->json($medico);
    }

    // Criar um novo médico
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numOrdem' => 'required|string|max:30|unique:medico,numOrdem',
            'nomeMedico' => 'nullable|string|max:30',
            'especialidadeID' => 'nullable|integer|exists:especialidade,especialidadeID',
            'DadosPessoaisID' => 'nullable|integer|exists:dadospessoais,DadosPessoaisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('medico')->insert([
            'numOrdem' => $request->numOrdem,
            'nomeMedico' => $request->nomeMedico,
            'especialidadeID' => $request->especialidadeID,
            'DadosPessoaisID' => $request->DadosPessoaisID,
        ]);

        $novoMedico = DB::table('medico')->where('numOrdem', $request->numOrdem)->first();
        return response()->json($novoMedico, 201);
    }

    // Atualizar um médico
    public function update(Request $request, $id)
    {
        $medico = DB::table('medico')->where('numOrdem', $id)->first();
        if (!$medico) {
            return response()->json(['message' => 'Médico não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeMedico' => 'nullable|string|max:30',
            'especialidadeID' => 'nullable|integer|exists:especialidade,especialidadeID',
            'DadosPessoaisID' => 'nullable|integer|exists:dadospessoais,DadosPessoaisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('medico')
            ->where('numOrdem', $id)
            ->update([
                'nomeMedico' => $request->nomeMedico ?? $medico->nomeMedico,
                'especialidadeID' => $request->especialidadeID ?? $medico->especialidadeID,
                'DadosPessoaisID' => $request->DadosPessoaisID ?? $medico->DadosPessoaisID,
            ]);

        $medicoAtualizado = DB::table('medico')->where('numOrdem', $id)->first();
        return response()->json($medicoAtualizado);
    }

    // Excluir um médico
    public function destroy($id)
    {
        $medico = DB::table('medico')->where('numOrdem', $id)->first();
        if (!$medico) {
            return response()->json(['message' => 'Médico não encontrado'], 404);
        }

        DB::table('medico')->where('numOrdem', $id)->delete();
        return response()->json(['message' => 'Médico excluído com sucesso']);
    }
}
