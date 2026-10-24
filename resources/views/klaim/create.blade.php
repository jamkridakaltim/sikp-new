@extends('layouts.app')
@section('title', 'Dokumentasi Klaim')
@section('content')
<div class="page-heading"><div><p class="eyebrow">Integrasi KUR / SIKP</p><h1>Dokumentasi Klaim</h1><p>Panduan pengiriman data klaim penjaminan dari produk SIMAJAS atau aplikasi mitra.</p></div><a class="btn ghost" href="/klaim"><iconify-icon icon="tabler:arrow-left" aria-hidden="true"></iconify-icon> Kembali</a></div>

<section class="card api-card"><div class="api-toolbar"><div><h2>Endpoint klaim</h2><p>Gunakan endpoint ini untuk mengirim data klaim baru.</p></div><span class="badge"><iconify-icon icon="tabler:plug-connected" aria-hidden="true"></iconify-icon> POST</span></div>
    <div class="api-section"><p class="api-label">Endpoint</p><pre>POST /api/klaim</pre></div>
    <div class="api-section"><p class="api-label">Headers</p><pre>Content-Type: application/json
X-API-KEY: &lt;api-key-aplikasi&gt;</pre></div>
    <div class="api-section"><p class="api-label">Request body</p><pre>{{ json_encode(['kode_bank'=>'002','nomor_rekening'=>'123456','nomor_akad'=>'AKD001','tgl_akad'=>'DDMMYYYY','nama'=>'Nama Debitur','nik'=>'1234567890123456','nomor_sp'=>'SP001','nomor_persetujuan_klaim'=>'KL001','tgl_persetujuan_klaim'=>'DDMMYYYY','nilai_klaim'=>5000000], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></div>
    <div class="api-section"><p class="api-label">Contoh response</p><pre>{{ json_encode(['success'=>true,'message'=>'Data klaim berhasil dikirim ke SIKP','data'=>['kode_bank'=>'002','nomor_rekening'=>'123456']], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></div>
</section>

<section class="card api-card" style="margin-top:16px"><div class="api-toolbar"><div><h2>Keterangan field</h2><p>Struktur data yang harus disiapkan oleh aplikasi KUR.</p></div><span class="badge">JSON</span></div><div class="table-wrap"><table><thead><tr><th>Field</th><th>Keterangan</th><th>Status</th></tr></thead><tbody>
    <tr><td><strong>kode_bank</strong></td><td>Kode bank penyalur</td><td><span class="badge">Wajib</span></td></tr>
    <tr><td><strong>nomor_rekening</strong></td><td>Nomor rekening debitur</td><td><span class="badge">Wajib</span></td></tr>
    <tr><td><strong>nomor_akad</strong></td><td>Nomor akad kredit</td><td><span class="badge">Wajib</span></td></tr>
    <tr><td><strong>tgl_akad</strong></td><td>Tanggal akad dengan format DDMMYYYY</td><td><span class="badge">Wajib</span></td></tr>
    <tr><td><strong>nama</strong></td><td>Nama lengkap debitur</td><td><span class="badge">Wajib</span></td></tr>
    <tr><td><strong>nik</strong></td><td>NIK debitur</td><td><span class="badge">Wajib</span></td></tr>
    <tr><td><strong>nomor_sp</strong></td><td>Nomor sertifikat penjaminan</td><td><span class="badge">Opsional</span></td></tr>
    <tr><td><strong>nomor_persetujuan_klaim</strong></td><td>Nomor persetujuan klaim</td><td><span class="badge">Opsional</span></td></tr>
    <tr><td><strong>tgl_persetujuan_klaim</strong></td><td>Tanggal persetujuan dengan format DDMMYYYY</td><td><span class="badge">Opsional</span></td></tr>
    <tr><td><strong>nilai_klaim</strong></td><td>Nilai klaim dalam rupiah</td><td><span class="badge">Wajib</span></td></tr>
</tbody></table></div></section>
@endsection
