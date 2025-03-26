<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TipoCartaoCreditoController extends Controller
{
    // Listar todos os tipos de cartão de crédito
    public function index()
    {
        $tipos = DB::table('tipocartaocredito')->get();
        return response()->json($tipos);
    }

    // Obter um tipo específico de cartão de crédito
    public function show($id)
    {
        $tipo = DB::table('tipocartaocredito')->where('TipoID', $id)->first();
        if (!$tipo) {
            return response()->json(['message' => 'Tipo de cartão de crédito não encontrado'], 404);
        }
        return response()->json($tipo);
    }

    // Criar um novo tipo de cartão de crédito
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'TipoID' => 'required|integer|unique:tipocartaocredito,TipoID',
            'Nome' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('tipocartaocredito')->insert([
            'TipoID' => $request->TipoID,
            'Nome' => $request->Nome,
        ]);

        $novoTipo = DB::table('tipocartaocredito')->where('TipoID', $request->TipoID)->first();
        return response()->json($novoTipo, 201);
    }

    // Atualizar um tipo de cartão de crédito existente
    public function update(Request $request, $id)
    {
        $tipo = DB::table('tipocartaocredito')->where('TipoID', $id)->first();
        if (!$tipo) {
            return response()->json(['message' => 'Tipo de cartão de crédito não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'Nome' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('tipocartaocredito')
            ->where('TipoID', $id)
            ->update([
                'Nome' => $request->Nome ?? $tipo->Nome,
            ]);

        $tipoAtualizado = DB::table('tipocartaocredito')->where('TipoID', $id)->first();
        return response()->json($tipoAtualizado);
    }

    // Excluir um tipo de cartão de crédito
    public function destroy($id)
    {
        $tipo = DB::table('tipocartaocredito')->where('TipoID', $id)->first();
        if (!$tipo) {
            return response()->json(['message' => 'Tipo de cartão de crédito não encontrado'], 404);
        }

        DB::table('tipocartaocredito')->where('TipoID', $id)->delete();
        return response()->json(['message' => 'Tipo de cartão de crédito excluído com sucesso']);
    }
}
