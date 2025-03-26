<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoseController extends Controller
{
    // Listar todas as doses
    public function index()
    {
        $doses = DB::table('dose')->get();
        return response()->json($doses);
    }

    // Obter uma dose específica
    public function show($id)
    {
        $dose = DB::table('dose')->where('doselD', $id)->first();
        if (!$dose) {
            return response()->json(['message' => 'Dose não encontrada'], 404);
        }
        return response()->json($dose);
    }

    // Criar uma nova dose
    public function store(Request $request)
    {
        $request->validate([
            'doselD' => 'required|string|max:40|unique:dose,doselD',
            'descricaoDose' => 'nullable|string|max:100',
        ]);

        $doseID = DB::table('dose')->insertGetId([
            'doselD' => $request->doselD,
            'descricaoDose' => $request->descricaoDose,
        ]);

        $dose = DB::table('dose')->where('doselD', $doseID)->first();
        return response()->json($dose, 201);
    }

    // Atualizar uma dose
    public function update(Request $request, $id)
    {
        $dose = DB::table('dose')->where('doselD', $id)->first();
        if (!$dose) {
            return response()->json(['message' => 'Dose não encontrada'], 404);
        }

        $request->validate([
            'descricaoDose' => 'nullable|string|max:100',
        ]);

        DB::table('dose')
            ->where('doselD', $id)
            ->update([
                'descricaoDose' => $request->descricaoDose ?? $dose->descricaoDose,
            ]);

        $doseAtualizada = DB::table('dose')->where('doselD', $id)->first();
        return response()->json($doseAtualizada);
    }

    // Excluir uma dose
    public function destroy($id)
    {
        $dose = DB::table('dose')->where('doselD', $id)->first();
        if (!$dose) {
            return response()->json(['message' => 'Dose não encontrada'], 404);
        }

        DB::table('dose')->where('doselD', $id)->delete();
        return response()->json(['message' => 'Dose excluída com sucesso']);
    }
}
