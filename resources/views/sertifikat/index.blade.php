@extends('layouts.app')

@section('content')

<h2>Data Sertifikat</h2>

<form method="GET">
    <input type="text" name="kode_bank" placeholder="Kode Bank" value="{{ request('kode_bank') }}">
    <button>Filter</button>
</form>

@if(is_array($data) && count($data))

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Bank</th>
            <th>No Rekening</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Nilai</th>
            <th>Tgl Akad</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $item)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $item['kode_bank'] }}</td>
            <td>{{ $item['nomor_rekening'] }}</td>
            <td>{{ $item['nama'] }}</td>
            <td>{{ $item['nik'] }}</td>
            <td>Rp {{ number_format($item['nilai_dijamin'],0,',','.') }}</td>
            <td>{{ \Carbon\Carbon::parse($item['tgl_akad'])->format('d-m-Y') }}</td>
            <td>
                <a href="/sertifikat/{{ $item['kode_bank'] }}/{{ $item['nomor_rekening'] }}">
                    Detail
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
<p>Tidak ada data</p>
@endif

@endsection
