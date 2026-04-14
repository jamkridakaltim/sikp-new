<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SikpService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.sikp.base_url');
    }

    public function login()
    {
        $response = Http::post($this->baseUrl . '/auth', [
            'username' => config('services.sikp.username'),
            'password' => config('services.sikp.password'),
        ]);

        return $response->json();
    }

    public function getToken()
    {
        $token = session('sikp_token');

        if (!$token) {
            $login = $this->login();

            if (!$login['error']) {
                $token = $login['message'];
                session(['sikp_token' => $token]);
            }
        }

        return $token;
    }

    public function get($endpoint, $params = [])
    {
        try {
            $res = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->getToken()
            ])->get($this->baseUrl . $endpoint, $params);

            return $res->json() ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getSertifikat($params = [])
    {
        return $this->get('/jaminan/sertifikat', $params);
    }

    public function createSertifikat($data)
    {
        return $this->post('/jaminan/sertifikat', $data);
    }

    public function detailSertifikat($kodeBank, $rekening)
    {
        return $this->get("/jaminan/sertifikat/$kodeBank/$rekening");
    }

    public function getKlaim($params = [])
    {
        return $this->get('/jaminan/klaim', $params);
    }

    public function createKlaim($data)
    {
        return $this->post('/jaminan/klaim', $data);
    }
}
