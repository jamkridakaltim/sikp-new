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

        \Log::info('SIKP LOGIN', $response->json());

        return $response->json();
    }

    public function getToken()
    {
        return Cache::remember('sikp_token', 3000, function () {

            $login = $this->login();

            if (isset($login['error']) && !$login['error']) {
                return $login['message'];
            }

            \Log::error('SIKP TOKEN FAILED', $login);

            return null;
        });
    }

    protected function request($method, $endpoint, $data = [])
    {
        $token = $this->getToken();

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->$method($this->baseUrl . $endpoint, $data);

            \Log::info('SIKP REQUEST', [
                'endpoint' => $endpoint,
                'method' => $method,
                'request' => $data,
                'status' => $response->status(),
                'response' => $response->json()
            ]);

            // retry jika token expired
            if ($response->status() == 401) {

                Cache::forget('sikp_token');

                $token = $this->getToken();

                $retry = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->$method($this->baseUrl . $endpoint, $data);

                \Log::warning('SIKP RETRY', [
                    'endpoint' => $endpoint,
                    'response' => $retry->json()
                ]);

                return $this->formatResponse($retry);
            }

            return $this->formatResponse($response);

        } catch (\Exception $e) {

            \Log::error('SIKP ERROR', [
                'endpoint' => $endpoint,
                'message' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'error' => true,
                'message' => $e->getMessage(),
                'data' => null
            ];
        }
    }

    protected function formatResponse($response)
    {
        $json = $response->json();

        return [
            'success' => isset($json['error']) ? !$json['error'] : true,
            'error' => $json['error'] ?? false,
            'message' => $json['message'] ?? '',
            'data' => $json['data'] ?? $json,
            'status_code' => $response->status(),
            'raw' => $json
        ];
    }

    public function get($endpoint, $params = [])
    {
        return $this->request('get', $endpoint, $params);
    }

    public function post($endpoint, $data = [])
    {
        return $this->request('post', $endpoint, $data);
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
