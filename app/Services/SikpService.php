<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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
        return Cache::remember('sikp_token', 3000, function () {

            $login = $this->login();

            if (!$login['error']) {
                return $login['message'];
            }

            return null;
        });
    }

    public function get($endpoint, $params = [])
    {
        $token = $this->getToken();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get($this->baseUrl . $endpoint, $params);

        // kalau token invalid
        if ($response->status() == 401) {

            Cache::forget('sikp_token');

            $token = $this->getToken();

            return Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->baseUrl . $endpoint, $params)->json();
        }

        return $response->json();
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

    public function getTokenPayload()
    {
        $token = $this->getToken();

        if (!$token) return null;

        try {
            $parts = explode('.', $token);
            $payload = json_decode(base64_decode($parts[1]), true);

            return $payload;
        } catch (\Exception $e) {
            return null;
        }
    }
}
