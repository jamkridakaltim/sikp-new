@extends('layouts.app')

@section('content')

<h2>Tambah Sertifikat</h2>

@if(session('response'))
    <pre>{{ json_encode(session('response'), JSON_PRETTY_PRINT) }}</pre>
@endif

<form method="POST">
@csrf

<input name="kode_bank" placeholder="Kode Bank"><br>
<input name="nomor_rekening" placeholder="No Rekening"><br>
<input name="nomor_akad" placeholder="No Akad"><br>
<input type="date" name="tgl_akad"><br>
<input name="nama" placeholder="Nama"><br>
<input name="nik" placeholder="NIK"><br>
<input name="nomor_sp" placeholder="Nomor SP"><br>
<input type="date" name="tgl_terbit_sp"><br>
<input name="nilai_dijamin" placeholder="Nilai Dijamin"><br>

<select name="skema">
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="20">20</option>
    <option value="31">31</option>
    <option value="32">32</option>
</select><br>

<button type="submit">Kirim</button>

</form>

@endsection
