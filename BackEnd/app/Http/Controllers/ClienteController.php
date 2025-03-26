<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    // Listar todos os clientes
    public function index()
    {
        $clientes = DB::table('cliente')->get();
        return response()->json($clientes);
    }

    // Obter um cliente específico
    public function show($id)
    {
        $cliente = DB::table('cliente')->where('clienteID', $id)->first();
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        return response()->json($cliente);
    }

    // Criar um novo cliente
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'DadosPessoaisID' => 'nullable|exists:dadospessoais,DadosPessoaisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $clienteID = DB::table('cliente')->insertGetId([
            'DadosPessoaisID' => $request->DadosPessoaisID
        ]);

        $cliente = DB::table('cliente')->where('clienteID', $clienteID)->first();
        return response()->json($cliente, 201);
    }

    // Atualizar um cliente
    public function update(Request $request, $id)
    {
        $cliente = DB::table('cliente')->where('clienteID', $id)->first();
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'DadosPessoaisID' => 'nullable|exists:dadospessoais,DadosPessoaisID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('cliente')
            ->where('clienteID', $id)
            ->update([
                'DadosPessoaisID' => $request->DadosPessoaisID ?? $cliente->DadosPessoaisID,
                'updated_at' => now(),
            ]);

        $clienteAtualizado = DB::table('cliente')->where('clienteID', $id)->first();
        return response()->json($clienteAtualizado);
    }

    // Excluir um cliente
    public function destroy($id)
    {
        $cliente = DB::table('cliente')->where('clienteID', $id)->first();
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        DB::table('cliente')->where('clienteID', $id)->delete();
        return response()->json(['message' => 'Cliente excluído com sucesso']);
    }
}
