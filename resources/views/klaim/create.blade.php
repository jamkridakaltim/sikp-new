@extends('layouts.app')

@section('content')

<h2>Tambah Klaim</h2>

@if(session('response'))
<pre>{{ json_encode(session('response'), JSON_PRETTY_PRINT) }}</pre>
@endif

<form method="POST">
@csrf

<input name="kode_bank" placeholder="Kode Bank"><br>
<input name="nomor_rekening" placeholder="No Rekening"><br>
<input name="nomor_akad" placeholder="No Akad"><br>

<label>Tanggal Akad</label><br>
<input type="date" name="tgl_akad"><br>

<input name="nama" placeholder="Nama"><br>
<input name="nik" placeholder="NIK"><br>
<input name="nomor_sp" placeholder="Nomor SP"><br>
<input name="nomor_persetujuan_klaim" placeholder="No Persetujuan Klaim"><br>

<label>Tanggal Persetujuan Klaim</label><br>
<input type="date" name="tgl_persetujuan_klaim"><br>

<input name="nilai_klaim" placeholder="Nilai Klaim"><br>

<button class="btn">Kirim Klaim</button>

</form>

@endsection
