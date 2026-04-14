@extends('layouts.app')

@section('content')

<h2>Detail Sertifikat</h2>

@if($data)

<div class="card">

    <table>
        <tr>
            <td>Kode Bank</td>
            <td>{{ $data['kode_bank'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>No Rekening</td>
            <td>{{ $data['nomor_rekening'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{{ $data['nama'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>{{ $data['nik'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nomor Akad</td>
            <td>{{ $data['nomor_akad'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tanggal Akad</td>
            <td>
                {{ isset($data['tgl_akad'])
                    ? \Carbon\Carbon::parse($data['tgl_akad'])->format('d-m-Y')
                    : '-' }}
            </td>
        </tr>
        <tr>
            <td>Nilai Dijamin</td>
            <td>Rp {{ number_format($data['nilai_dijamin'] ?? 0,0,',','.') }}</td>
        </tr>
        <tr>
            <td>Nomor SP</td>
            <td>{{ $data['nomor_sp'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tgl Terbit SP</td>
            <td>
                {{ isset($data['tgl_terbit_sp'])
                    ? \Carbon\Carbon::parse($data['tgl_terbit_sp'])->format('d-m-Y')
                    : '-' }}
            </td>
        </tr>
    </table>

</div>

<br>

@endif

<!-- RAW RESPONSE -->
<div class="card">
    <h3>Raw Response (SIKP)</h3>

    <div style="max-height:300px; overflow:auto; background:#0f172a; color:#e2e8f0; padding:10px;">
        <pre>{{ json_encode($response ?? [], JSON_PRETTY_PRINT) }}</pre>
    </div>
</div>

@endsection
