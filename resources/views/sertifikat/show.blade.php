@extends('layouts.app')
@section('title', 'Detail Sertifikat')
@section('content')
<div class="page-heading">
    <div><p class="eyebrow">Penjaminan / Sertifikat</p><h1>Detail Sertifikat</h1><p>Informasi lengkap sertifikat yang diterima dari SIKP.</p></div>
    <div class="quick-actions"><a class="btn ghost" href="/sertifikat"><iconify-icon icon="tabler:arrow-left" aria-hidden="true"></iconify-icon> Kembali</a><a class="btn" href="/sertifikat/create"><iconify-icon icon="tabler:plus" aria-hidden="true"></iconify-icon> Sertifikat</a></div>
</div>

@if($data)
<div class="detail-grid">
    <section class="card"><div class="card-title"><div><h2>Identitas penjaminan</h2><p>Data debitur dan akad</p></div><span class="badge"><iconify-icon icon="tabler:circle-check" aria-hidden="true"></iconify-icon> Diterima</span></div>
        <dl class="detail-list">
            <div class="detail-row"><dt>Nama Debitur</dt><dd>{{ $data['nama'] ?? '-' }}</dd></div>
            <div class="detail-row"><dt>NIK</dt><dd>{{ $data['nik'] ?? '-' }}</dd></div>
            <div class="detail-row"><dt>Nomor Rekening</dt><dd>{{ $data['nomor_rekening'] ?? '-' }}</dd></div>
            <div class="detail-row"><dt>Nomor Akad</dt><dd>{{ $data['nomor_akad'] ?? '-' }}</dd></div>
            <div class="detail-row"><dt>Tanggal Akad</dt><dd>{{ isset($data['tgl_akad']) ? \Carbon\Carbon::parse($data['tgl_akad'])->format('d-m-Y') : '-' }}</dd></div>
        </dl>
    </section>
    <section class="card"><div class="card-title"><div><h2>Informasi sertifikat</h2><p>Nilai dan referensi dokumen</p></div><span class="badge">SIKP API</span></div>
        <dl class="detail-list">
            <div class="detail-row"><dt>Kode Bank</dt><dd>{{ $data['kode_bank'] ?? '-' }}</dd></div>
            <div class="detail-row"><dt>Nomor SP</dt><dd>{{ $data['nomor_sp'] ?? '-' }}</dd></div>
            <div class="detail-row"><dt>Tanggal Terbit SP</dt><dd>{{ isset($data['tgl_terbit_sp']) ? \Carbon\Carbon::parse($data['tgl_terbit_sp'])->format('d-m-Y') : '-' }}</dd></div>
            <div class="detail-row"><dt>Skema</dt><dd>{{ $data['skema'] ?? '-' }}</dd></div>
            <div class="detail-row"><dt>Nilai Dijamin</dt><dd class="money">Rp {{ number_format($data['nilai_dijamin'] ?? 0,0,',','.') }}</dd></div>
        </dl>
    </section>
</div>
@else
<div class="card empty-state"><iconify-icon icon="tabler:file-off" style="font-size:28px"></iconify-icon><p>Detail sertifikat tidak ditemukan.</p><a class="link" href="/sertifikat">Kembali ke daftar</a></div>
@endif

<section class="card response-card"><div class="card-title"><div><h2>Raw response SIKP</h2><p>Payload asli dari endpoint detail sertifikat</p></div><span class="badge">JSON</span></div><div class="card-pad"><pre>{{ json_encode($response ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></div></section>
@endsection
