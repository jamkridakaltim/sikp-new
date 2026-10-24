@extends('layouts.app')
@section('title', 'Tambah Klaim')
@section('content')
<div class="page-heading"><div><p class="eyebrow">Klaim</p><h1>Tambah Klaim</h1><p>Kirim data klaim penjaminan ke SIKP melalui endpoint resmi.</p></div><a class="btn ghost" href="/klaim"><iconify-icon icon="tabler:arrow-left" aria-hidden="true"></iconify-icon> Kembali</a></div>

@if($errors->any())<div class="flash error"><strong>Periksa kembali data:</strong><ul style="margin:7px 0 0 18px">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
@if(session('response'))<section class="card response-card"><div class="card-title"><div><h2>Response pengiriman</h2><p>Hasil terbaru dari SIKP API</p></div><span class="badge">Selesai</span></div><div class="card-pad"><pre>{{ json_encode(session('response'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></div></section>@endif

<section class="card api-card"><div class="api-toolbar"><div><h2>Form klaim</h2><p>Lengkapi field wajib sebelum mengirim data.</p></div><span class="badge"><iconify-icon icon="tabler:cloud-upload" aria-hidden="true"></iconify-icon> POST /api/klaim</span></div>
    <form method="POST" action="/klaim" class="card-pad">@csrf
        <div class="form-grid">
            <div class="field"><label for="kode_bank">Kode Bank</label><input id="kode_bank" name="kode_bank" value="{{ old('kode_bank') }}" placeholder="Contoh: 002" required><span class="hint">Kode bank penyalur.</span></div>
            <div class="field"><label for="nomor_rekening">Nomor Rekening</label><input id="nomor_rekening" name="nomor_rekening" value="{{ old('nomor_rekening') }}" placeholder="Nomor rekening debitur" required></div>
            <div class="field"><label for="nomor_akad">Nomor Akad</label><input id="nomor_akad" name="nomor_akad" value="{{ old('nomor_akad') }}" placeholder="Nomor akad kredit" required></div>
            <div class="field"><label for="tgl_akad">Tanggal Akad</label><input id="tgl_akad" type="date" name="tgl_akad" value="{{ old('tgl_akad') }}" required></div>
            <div class="field"><label for="nama">Nama Debitur</label><input id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap debitur" required></div>
            <div class="field"><label for="nik">NIK</label><input id="nik" name="nik" value="{{ old('nik') }}" inputmode="numeric" placeholder="16 digit NIK" required></div>
            <div class="field"><label for="nomor_sp">Nomor SP <span>(opsional)</span></label><input id="nomor_sp" name="nomor_sp" value="{{ old('nomor_sp') }}" placeholder="Nomor sertifikat penjaminan"></div>
            <div class="field"><label for="nomor_persetujuan_klaim">Nomor Persetujuan Klaim <span>(opsional)</span></label><input id="nomor_persetujuan_klaim" name="nomor_persetujuan_klaim" value="{{ old('nomor_persetujuan_klaim') }}" placeholder="Nomor persetujuan klaim"></div>
            <div class="field"><label for="tgl_persetujuan_klaim">Tanggal Persetujuan Klaim <span>(opsional)</span></label><input id="tgl_persetujuan_klaim" type="date" name="tgl_persetujuan_klaim" value="{{ old('tgl_persetujuan_klaim') }}"></div>
            <div class="field"><label for="nilai_klaim">Nilai Klaim</label><input id="nilai_klaim" type="number" min="0" name="nilai_klaim" value="{{ old('nilai_klaim') }}" placeholder="Contoh: 5000000" required></div>
        </div>
        <div class="form-actions"><a class="btn ghost" href="/klaim">Batal</a><button class="btn green" type="submit"><iconify-icon icon="tabler:send" aria-hidden="true"></iconify-icon> Kirim ke SIKP</button></div>
    </form>
</section>

<section class="card api-card" style="margin-top:16px"><div class="api-toolbar"><div><h2>Format request</h2><p>Payload yang dikirim ke layanan SIKP</p></div><span class="badge">JSON</span></div><div class="card-pad"><pre>{{ json_encode(['kode_bank'=>'002','nomor_rekening'=>'123456','nomor_akad'=>'AKD001','tgl_akad'=>'DDMMYYYY','nama'=>'Nama Debitur','nik'=>'1234567890123456','nomor_sp'=>'SP001','nomor_persetujuan_klaim'=>'KL001','tgl_persetujuan_klaim'=>'DDMMYYYY','nilai_klaim'=>5000000], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></div></section>
@endsection
