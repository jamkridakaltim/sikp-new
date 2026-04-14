@extends('layouts.app')

@section('content')

<h2>Data Klaim</h2>

<form method="GET">
    <input name="kode_bank" placeholder="Kode Bank" value="{{ request('kode_bank') }}">
    <button class="btn">Filter</button>
</form>

@if(is_array($data) && count($data))

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>No Rekening</th>
            <th>Nilai Klaim</th>
            <th>Tgl Klaim</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item['nama'] }}</td>
            <td>{{ $item['nomor_rekening'] }}</td>
            <td>Rp {{ number_format($item['nilai_klaim'],0,',','.') }}</td>
            <td>{{ \Carbon\Carbon::parse($item['tgl_persetujuan_klaim'])->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
<p>Tidak ada data</p>
@endif

@endsection
