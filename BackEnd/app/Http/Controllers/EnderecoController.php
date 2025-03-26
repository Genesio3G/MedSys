<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnderecoController extends Controller
{
    // Listar todos os registros
    public function index()
    {
        $enderecos = DB::table('endereco')->get();
        return response()->json($enderecos);
    }

    // Obter um registro específico
    public function show($id)
    {
        $endereco = DB::table('endereco')->where('enderecoID', $id)->first();
        if (!$endereco) {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }
        return response()->json($endereco);
    }

    // Criar um novo registro
    public function store(Request $request)
    {
        $request->validate([
            'rua' => 'nullable|string|max:100',
            'numero' => 'nullable|integer',
            'bairro' => 'nullable|string|max:50',
            'cidade' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:100',
            'telefoneID' => 'nullable|integer',
            'municipioID' => 'nullable|integer',
        ]);

        $enderecoID = DB::table('endereco')->insertGetId([
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'email' => $request->email,
            'telefoneID' => $request->telefoneID,
            'municipioID' => $request->municipioID,
        ]);

        $endereco = DB::table('endereco')->where('enderecoID', $enderecoID)->first();
        return response()->json($endereco, 201);
    }

    // Atualizar um registro existente
    public function update(Request $request, $id)
    {
        $endereco = DB::table('endereco')->where('enderecoID', $id)->first();
        if (!$endereco) {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }

        $request->validate([
            'rua' => 'nullable|string|max:100',
            'numero' => 'nullable|integer',
            'bairro' => 'nullable|string|max:50',
            'cidade' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:100',
            'telefoneID' => 'nullable|integer',
            'municipioID' => 'nullable|integer',
        ]);

        DB::table('endereco')
            ->where('enderecoID', $id)
            ->update([
                'rua' => $request->rua ?? $endereco->rua,
                'numero' => $request->numero ?? $endereco->numero,
                'bairro' => $request->bairro ?? $endereco->bairro,
                'cidade' => $request->cidade ?? $endereco->cidade,
                'email' => $request->email ?? $endereco->email,
                'telefoneID' => $request->telefoneID ?? $endereco->telefoneID,
                'municipioID' => $request->municipioID ?? $endereco->municipioID,
            ]);

        $enderecoAtualizado = DB::table('endereco')->where('enderecoID', $id)->first();
        return response()->json($enderecoAtualizado);
    }

    // Excluir um registro
    public function destroy($id)
    {
        $endereco = DB::table('endereco')->where('enderecoID', $id)->first();
        if (!$endereco) {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }

        DB::table('endereco')->where('enderecoID', $id)->delete();
        return response()->json(['message' => 'Endereço excluído com sucesso']);
    }
}
