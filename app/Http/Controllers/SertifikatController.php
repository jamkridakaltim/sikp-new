<?php

namespace App\Http\Controllers;

use App\Services\SikpService;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index(Request $request, SikpService $sikp)
    {
        $params = array_filter([
            'kode_bank' => $request->kode_bank,
            'limit' => 10
        ]);

        $data = $sikp->getSertifikat($params);

        return view('sertifikat.index', compact('data'));
    }

    public function create()
    {
        return view('sertifikat.create');
    }

    public function store(Request $request, SikpService $sikp)
    {
        $request->validate([
            'kode_bank' => 'required',
            'nomor_rekening' => 'required',
            'nomor_akad' => 'required',
            'tgl_akad' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'nilai_dijamin' => 'required',
            'skema' => 'required',
        ]);

        // FORMAT DDMMYYYY sesuai SIKP
        $tgl_akad = date('dmY', strtotime($request->tgl_akad));
        $tgl_sp = date('dmY', strtotime($request->tgl_terbit_sp));

        $response = $sikp->createSertifikat([
            "kode_bank" => $request->kode_bank,
            "nomor_rekening" => $request->nomor_rekening,
            "nomor_akad" => $request->nomor_akad,
            "tgl_akad" => $tgl_akad,
            "nama" => $request->nama,
            "nik" => $request->nik,
            "nomor_sp" => $request->nomor_sp,
            "tgl_terbit_sp" => $tgl_sp,
            "nilai_dijamin" => $request->nilai_dijamin,
            "skema" => $request->skema,
        ]);

        return back()->with('response', $response);
    }

    public function show($kode_bank, $rekening, SikpService $sikp)
    {
        $response = $sikp->detailSertifikat($kode_bank, $rekening);

        $data = $response['data'] ?? null;

        return view('sertifikat.show', compact('data', 'response'));
    }
}
