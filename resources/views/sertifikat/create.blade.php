@extends('layouts.app')
@section('title', 'Tambah Sertifikat')
@section('content')
<div class="page-heading"><div><p class="eyebrow">Penjaminan</p><h1>Tambah Sertifikat</h1><p>Kirim data sertifikat penjaminan ke SIKP melalui endpoint resmi.</p></div><a class="btn ghost" href="/sertifikat"><iconify-icon icon="tabler:arrow-left" aria-hidden="true"></iconify-icon> Kembali</a></div>

@if($errors->any())<div class="flash error"><strong>Periksa kembali data:</strong><ul style="margin:7px 0 0 18px">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
@if(session('response'))<section class="card response-card"><div class="card-title"><div><h2>Response pengiriman</h2><p>Hasil terbaru dari SIKP API</p></div><span class="badge">Selesai</span></div><div class="card-pad"><pre>{{ json_encode(session('response'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></div></section>@endif

<section class="card api-card"><div class="api-toolbar"><div><h2>Form sertifikat</h2><p>Lengkapi field wajib sebelum mengirim data.</p></div><span class="badge"><iconify-icon icon="tabler:cloud-upload" aria-hidden="true"></iconify-icon> POST /api/sertifikat</span></div>
    <form method="POST" action="/sertifikat" class="card-pad">@csrf
        <div class="form-grid">
            <div class="field"><label for="kode_bank">Kode Bank</label><input id="kode_bank" name="kode_bank" value="{{ old('kode_bank') }}" placeholder="Contoh: 002" required><span class="hint">Kode bank penyalur.</span></div>
            <div class="field"><label for="nomor_rekening">Nomor Rekening</label><input id="nomor_rekening" name="nomor_rekening" value="{{ old('nomor_rekening') }}" placeholder="Nomor rekening debitur" required></div>
            <div class="field"><label for="nomor_akad">Nomor Akad</label><input id="nomor_akad" name="nomor_akad" value="{{ old('nomor_akad') }}" placeholder="Nomor akad kredit" required></div>
            <div class="field"><label for="tgl_akad">Tanggal Akad</label><input id="tgl_akad" type="date" name="tgl_akad" value="{{ old('tgl_akad') }}" required></div>
            <div class="field"><label for="nama">Nama Debitur</label><input id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap debitur" required></div>
            <div class="field"><label for="nik">NIK</label><input id="nik" name="nik" value="{{ old('nik') }}" inputmode="numeric" placeholder="16 digit NIK" required></div>
            <div class="field"><label for="nomor_sp">Nomor SP <span>(opsional)</span></label><input id="nomor_sp" name="nomor_sp" value="{{ old('nomor_sp') }}" placeholder="Nomor sertifikat penjaminan"></div>
            <div class="field"><label for="tgl_terbit_sp">Tanggal Terbit SP <span>(opsional)</span></label><input id="tgl_terbit_sp" type="date" name="tgl_terbit_sp" value="{{ old('tgl_terbit_sp') }}"></div>
            <div class="field"><label for="nilai_dijamin">Nilai Dijamin</label><input id="nilai_dijamin" type="number" min="0" name="nilai_dijamin" value="{{ old('nilai_dijamin') }}" placeholder="Contoh: 10000000" required></div>
            <div class="field"><label for="skema">Skema</label><input id="skema" name="skema" value="{{ old('skema') }}" placeholder="Contoh: 11" required></div>
        </div>
        <div class="form-actions"><a class="btn ghost" href="/sertifikat">Batal</a><button class="btn" type="submit"><iconify-icon icon="tabler:send" aria-hidden="true"></iconify-icon> Kirim ke SIKP</button></div>
    </form>
</section>

<section class="card api-card" style="margin-top:16px"><div class="api-toolbar"><div><h2>Format request</h2><p>Payload yang dikirim ke layanan SIKP</p></div><span class="badge">JSON</span></div><div class="card-pad"><pre>{{ json_encode(['kode_bank'=>'002','nomor_rekening'=>'123456','nomor_akad'=>'AKD001','tgl_akad'=>'DDMMYYYY','nama'=>'Nama Debitur','nik'=>'1234567890123456','nomor_sp'=>'SP001','tgl_terbit_sp'=>'DDMMYYYY','nilai_dijamin'=>10000000,'skema'=>'11'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></div></section>
@endsection
