<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DadosPessoaisController extends Controller
{
    // Listar todos os registros
    public function index()
    {
        $dadosPessoais = DB::table('dadospessoais')->get();
        return response()->json($dadosPessoais);
    }

    // Obter um registro específico
    public function show($id)
    {
        $dadoPessoal = DB::table('dadospessoais')->where('dadosPessoaisID', $id)->first();
        if (!$dadoPessoal) {
            return response()->json(['message' => 'Registro não encontrado'], 404);
        }
        return response()->json($dadoPessoal);
    }

    // Criar um novo registro
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'nullable|string|max:100',
            'contalD' => 'nullable|integer',
            'enderecoID' => 'nullable|integer',
            'sexoID' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $dadosPessoaisID = DB::table('dadospessoais')->insertGetId([
            'nome' => $request->nome,
            'contalD' => $request->contalD,
            'enderecoID' => $request->enderecoID,
            'sexoID' => $request->sexoID,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $dadoPessoal = DB::table('dadospessoais')->where('dadosPessoaisID', $dadosPessoaisID)->first();
        return response()->json($dadoPessoal, 201);
    }

    // Atualizar um registro
    public function update(Request $request, $id)
    {
        $dadoPessoal = DB::table('dadospessoais')->where('dadosPessoaisID', $id)->first();
        if (!$dadoPessoal) {
            return response()->json(['message' => 'Registro não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nome' => 'nullable|string|max:100',
            'contalD' => 'nullable|integer',
            'enderecoID' => 'nullable|integer',
            'sexoID' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('dadospessoais')
            ->where('dadosPessoaisID', $id)
            ->update([
                'nome' => $request->nome ?? $dadoPessoal->nome,
                'contalD' => $request->contalD ?? $dadoPessoal->contalD,
                'enderecoID' => $request->enderecoID ?? $dadoPessoal->enderecoID,
                'sexoID' => $request->sexoID ?? $dadoPessoal->sexoID,
                'updated_at' => now(),
            ]);

        $dadoPessoalAtualizado = DB::table('dadospessoais')->where('dadosPessoaisID', $id)->first();
        return response()->json($dadoPessoalAtualizado);
    }

    // Excluir um registro
    public function destroy($id)
    {
        $dadoPessoal = DB::table('dadospessoais')->where('dadosPessoaisID', $id)->first();
        if (!$dadoPessoal) {
            return response()->json(['message' => 'Registro não encontrado'], 404);
        }

        DB::table('dadospessoais')->where('dadosPessoaisID', $id)->delete();
        return response()->json(['message' => 'Registro excluído com sucesso']);
    }
}
