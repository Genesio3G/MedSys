<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    // Listar todos os estoques
    public function index()
    {
        $stocks = DB::table('stock')->get();
        return response()->json($stocks);
    }

    // Obter um estoque específico
    public function show($id)
    {
        $stock = DB::table('stock')->where('stockID', $id)->first();
        if (!$stock) {
            return response()->json(['message' => 'Estoque não encontrado'], 404);
        }
        return response()->json($stock);
    }

    // Criar um novo estoque
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'licenca' => 'nullable|string|max:30|exists:farmacia,licenca',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $stockID = DB::table('stock')->insertGetId([
            'licenca' => $request->licenca,
        ]);

        $novoStock = DB::table('stock')->where('stockID', $stockID)->first();
        return response()->json($novoStock, 201);
    }

    // Atualizar um estoque
    public function update(Request $request, $id)
    {
        $stock = DB::table('stock')->where('stockID', $id)->first();
        if (!$stock) {
            return response()->json(['message' => 'Estoque não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'licenca' => 'nullable|string|max:30|exists:farmacia,licenca',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('stock')
            ->where('stockID', $id)
            ->update([
                'licenca' => $request->licenca ?? $stock->licenca,
            ]);

        $stockAtualizado = DB::table('stock')->where('stockID', $id)->first();
        return response()->json($stockAtualizado);
    }

    // Excluir um estoque
    public function destroy($id)
    {
        $stock = DB::table('stock')->where('stockID', $id)->first();
        if (!$stock) {
            return response()->json(['message' => 'Estoque não encontrado'], 404);
        }

        DB::table('stock')->where('stockID', $id)->delete();
        return response()->json(['message' => 'Estoque excluído com sucesso']);
    }
}
