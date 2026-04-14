<?php

namespace App\Http\Controllers;

use App\Services\SikpService;
use Illuminate\Http\Request;

class KlaimController extends Controller
{
    public function index(Request $request, SikpService $sikp)
    {
        $params = array_filter([
            'kode_bank' => $request->kode_bank,
            'limit' => 10
        ]);

        $data = $sikp->getKlaim($params);

        return view('klaim.index', compact('data'));
    }

    public function create()
    {
        return view('klaim.create');
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
            'nilai_klaim' => 'required',
        ]);

        $response = $sikp->createKlaim([
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
        ]);

        return back()->with('response', $response);
    }
}
