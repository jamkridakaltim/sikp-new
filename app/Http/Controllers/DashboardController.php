<?php

namespace App\Http\Controllers;

use App\Services\SikpService;

class DashboardController extends Controller
{
    public function index(SikpService $sikp)
    {
        $login = $sikp->login();

        return view('dashboard', [
            'login' => $login
        ]);
    }
}
