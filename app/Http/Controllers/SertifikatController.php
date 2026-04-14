<?php

namespace App\Http\Controllers;

use App\Services\SikpService;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index(Request $request, SikpService $sikp)
    {
        $params = [
            'kode_bank' => $request->kode_bank,
            'limit' => 10
        ];

        $data = $sikp->getSertifikat(array_filter($params));

        return view('sertifikat.index', [
            'data' => $data
        ]);
    }
}
