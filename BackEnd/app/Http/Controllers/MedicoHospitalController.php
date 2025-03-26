<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MedicoHospitalController extends Controller
{
    // Listar todas as associações de médico-hospital
    public function index()
    {
        $medicoHospitais = DB::table('medicohospital')->get();
        return response()->json($medicoHospitais);
    }

    // Obter uma associação específica
    public function show($id)
    {
        $medicoHospital = DB::table('medicohospital')->where('medicoHospitalID', $id)->first();
        if (!$medicoHospital) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }
        return response()->json($medicoHospital);
    }

    // Criar uma nova associação médico-hospital
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'medicoID' => 'nullable|integer|exists:medico,medicoID',
            'unidadeHospitalarID' => 'nullable|integer|exists:unidadehospitalar,unidadeHospitalarID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $medicoHospitalID = DB::table('medicohospital')->insertGetId([
            'medicoID' => $request->medicoID,
            'unidadeHospitalarID' => $request->unidadeHospitalarID,
        ]);

        $novoMedicoHospital = DB::table('medicohospital')->where('medicoHospitalID', $medicoHospitalID)->first();
        return response()->json($novoMedicoHospital, 201);
    }

    // Atualizar uma associação
    public function update(Request $request, $id)
    {
        $medicoHospital = DB::table('medicohospital')->where('medicoHospitalID', $id)->first();
        if (!$medicoHospital) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'medicoID' => 'nullable|integer|exists:medico,medicoID',
            'unidadeHospitalarID' => 'nullable|integer|exists:unidadehospitalar,unidadeHospitalarID',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::table('medicohospital')
            ->where('medicoHospitalID', $id)
            ->update([
                'medicoID' => $request->medicoID ?? $medicoHospital->medicoID,
                'unidadeHospitalarID' => $request->unidadeHospitalarID ?? $medicoHospital->unidadeHospitalarID,
            ]);

        $medicoHospitalAtualizado = DB::table('medicohospital')->where('medicoHospitalID', $id)->first();
        return response()->json($medicoHospitalAtualizado);
    }

    // Excluir uma associação
    public function destroy($id)
    {
        $medicoHospital = DB::table('medicohospital')->where('medicoHospitalID', $id)->first();
        if (!$medicoHospital) {
            return response()->json(['message' => 'Associação não encontrada'], 404);
        }

        DB::table('medicohospital')->where('medicoHospitalID', $id)->delete();
        return response()->json(['message' => 'Associação excluída com sucesso']);
    }
}
