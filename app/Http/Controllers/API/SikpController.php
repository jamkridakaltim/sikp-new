<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SikpService;

class SikpController extends Controller
{
    public function sertifikat(Request $request, SikpService $sikp)
    {
        $request->validate([
            'kode_bank' => 'required',
            'nomor_rekening' => 'required',
            'nomor_akad' => 'required',
            'tgl_akad' => 'required|date',
            'nama' => 'required',
            'nik' => 'required',
            'nilai_dijamin' => 'required|numeric',
            'skema' => 'required',
        ]);

        $data = [
            "kode_bank" => $request->kode_bank,
            "nomor_rekening" => $request->nomor_rekening,
            "nomor_akad" => $request->nomor_akad,
            "tgl_akad" => date('dmY', strtotime($request->tgl_akad)),
            "nama" => $request->nama,
            "nik" => $request->nik,
            "nomor_sp" => $request->nomor_sp,
            "tgl_terbit_sp" => date('dmY', strtotime($request->tgl_terbit_sp)),
            "nilai_dijamin" => $request->nilai_dijamin,
            "skema" => $request->skema,
        ];

        $response = $sikp->createSertifikat($data);

        return response()->json([
            'success' => !$response['error'],
            'message' => $response['message'] ?? '',
            'data' => $response
        ]);
    }

    public function klaim(Request $request, SikpService $sikp)
    {
        $request->validate([
            'kode_bank' => 'required',
            'nomor_rekening' => 'required',
            'nomor_akad' => 'required',
            'tgl_akad' => 'required|date',
            'nama' => 'required',
            'nik' => 'required',
            'nilai_klaim' => 'required|numeric',
        ]);

        $data = [
            "kode_bank" => $request->kode_bank,
            "nomor_rekening" => $request->nomor_rekening,
            "nomor_akad" => $request->nomor_akad,
            "tgl_akad" => date('dmY', strtotime($request->tgl_akad)),
            "nama" => $request->nama,
            "nik" => $request->nik,
            "nomor_sp" => $request->nomor_sp,
            "nomor_persetujuan_klaim" => $request->nomor_persetujuan_klaim,
            "tgl_persetujuan_klaim" => date('dmY', strtotime($request->tgl_persetujuan_klaim)),
            "nilai_klaim" => $request->nilai_klaim,
        ];

        $response = $sikp->createKlaim($data);

        return response()->json([
            'success' => !$response['error'],
            'message' => $response['message'] ?? '',
            'data' => $response
        ]);
    }
}
