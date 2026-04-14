<?php

namespace App\Http\Controllers;

use App\Services\SikpService;

class DashboardController extends Controller
{
    public function index(SikpService $sikp)
    {
        $sertifikat = $sikp->getSertifikat(['limit' => 10]);
        $klaim = $sikp->getKlaim(['limit' => 10]);

        $totalSertifikat = is_array($sertifikat) ? count($sertifikat) : 0;
        $totalNilai = 0;

        if (is_array($sertifikat)) {
            foreach ($sertifikat as $s) {
                $totalNilai += $s['nilai_dijamin'] ?? 0;
            }
        }

        $totalKlaim = 0;
        if (is_array($klaim)) {
            foreach ($klaim as $k) {
                $totalKlaim += $k['nilai_klaim'] ?? 0;
            }
        }

        return view('dashboard', [
            'sertifikat' => $sertifikat,
            'klaim' => $klaim,
            'totalSertifikat' => $totalSertifikat,
            'totalNilai' => $totalNilai,
            'totalKlaim' => $totalKlaim
        ]);
    }
}
