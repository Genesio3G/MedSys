<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{
    // Listar todos os funcionários
    public function index()
    {
        $funcionarios = DB::table('funcionario')->get();
        return response()->json($funcionarios);
    }

    // Obter um funcionário específico
    public function show($id)
    {
        $funcionario = DB::table('funcionario')->where('funcionariolD', $id)->first();
        if (!$funcionario) {
            return response()->json(['message' => 'Funcionário não encontrado'], 404);
        }
        return response()->json($funcionario);
    }

    // Criar um novo funcionário
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'licenca' => 'nullable|string|max:30|exists:farmacia,licenca',
            'DadosPessoaisID' => 'nullable|integer|exists:dadospessoais,DadosPessoaisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $funcionarioID = DB::table('funcionario')->insertGetId([
            'licenca' => $request->licenca,
            'DadosPessoaisID' => $request->DadosPessoaisID,
        ]);

        $funcionario = DB::table('funcionario')->where('funcionariolD', $funcionarioID)->first();
        return response()->json($funcionario, 201);
    }

    // Atualizar um funcionário
    public function update(Request $request, $id)
    {
        $funcionario = DB::table('funcionario')->where('funcionariolD', $id)->first();
        if (!$funcionario) {
            return response()->json(['message' => 'Funcionário não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'licenca' => 'nullable|string|max:30|exists:farmacia,licenca',
            'DadosPessoaisID' => 'nullable|integer|exists:dadospessoais,DadosPessoaisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('funcionario')
            ->where('funcionariolD', $id)
            ->update([
                'licenca' => $request->licenca ?? $funcionario->licenca,
                'DadosPessoaisID' => $request->DadosPessoaisID ?? $funcionario->DadosPessoaisID,
            ]);

        $funcionarioAtualizado = DB::table('funcionario')->where('funcionariolD', $id)->first();
        return response()->json($funcionarioAtualizado);
    }

    // Excluir um funcionário
    public function destroy($id)
    {
        $funcionario = DB::table('funcionario')->where('funcionariolD', $id)->first();
        if (!$funcionario) {
            return response()->json(['message' => 'Funcionário não encontrado'], 404);
        }

        DB::table('funcionario')->where('funcionariolD', $id)->delete();
        return response()->json(['message' => 'Funcionário excluído com sucesso']);
    }
}
