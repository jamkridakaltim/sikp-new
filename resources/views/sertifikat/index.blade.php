@extends('layouts.app')

@section('title', 'Sertifikat')
@section('content')
<div class="page-heading"><div><p class="eyebrow">Penjaminan</p><h1>Data Sertifikat</h1><p>Daftar sertifikat penjaminan yang diterima dari SIKP.</p></div><a class="btn" href="/sertifikat/create"><iconify-icon icon="tabler:plus" aria-hidden="true"></iconify-icon> Tambah Sertifikat</a></div>
<form class="toolbar" method="GET">
    <input type="text" name="kode_bank" placeholder="Kode Bank" value="{{ request('kode_bank') }}">
    <button class="btn" type="submit">Filter data</button>
</form>

@if(is_array($data) && count($data))
<div class="card table-wrap"><table>
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
                    <td><a class="link" href="/sertifikat/{{ $item['kode_bank'] }}/{{ $item['nomor_rekening'] }}">Detail <iconify-icon icon="tabler:arrow-right" aria-hidden="true"></iconify-icon></a></td>
        </tr>
        @endforeach
    </tbody>
</table></div>

@else
<div class="card empty-state">Tidak ada data sertifikat untuk filter ini.</div>
@endif

@endsection
