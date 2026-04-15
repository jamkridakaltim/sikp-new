@extends('layouts.app')

@section('content')


<h2>Dokumentasi API - Klaim SIKP</h2>

<div class="card">

    <h3>Endpoint</h3>
    <pre>POST /api/klaim</pre>

    <h3>Headers</h3>
    <pre>
X-API-KEY: {{ env('SIKP_API_KEY') ?? 'your-api-key' }}
Content-Type: application/json
    </pre>

    <h3>Request Body</h3>
    <pre>
{
  "kode_bank": "002",
  "nomor_rekening": "123456",
  "nomor_akad": "AKD001",
  "tgl_akad": "2026-04-14",
  "nama": "Nama Debitur",
  "nik": "1234567890123456",
  "nomor_sp": "SP001",
  "nomor_persetujuan_klaim": "KL001",
  "tgl_persetujuan_klaim": "2026-04-14",
  "nilai_klaim": 5000000
}
    </pre>

    <h3>Response</h3>
    <pre>
{
  "success": true,
  "message": "Data klaim berhasil dikirim ke SIKP",
  "data": { ... }
}
    </pre>

    <h3>Keterangan Field</h3>
    <table>
        <tr><td>kode_bank</td><td>Kode bank penyalur</td></tr>
        <tr><td>nomor_rekening</td><td>Nomor rekening debitur</td></tr>
        <tr><td>nomor_akad</td><td>Nomor akad kredit</td></tr>
        <tr><td>tgl_akad</td><td>Tanggal akad (YYYY-MM-DD)</td></tr>
        <tr><td>nama</td><td>Nama debitur</td></tr>
        <tr><td>nik</td><td>NIK debitur</td></tr>
        <tr><td>nomor_sp</td><td>Nomor sertifikat penjaminan</td></tr>
        <tr><td>nomor_persetujuan_klaim</td><td>Nomor persetujuan klaim</td></tr>
        <tr><td>tgl_persetujuan_klaim</td><td>Tanggal persetujuan klaim</td></tr>
        <tr><td>nilai_klaim</td><td>Nilai klaim</td></tr>
    </table>

</div>

@endsection
