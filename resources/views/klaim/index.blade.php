@extends('layouts.app')

@section('title', 'Klaim')
@section('content')
<div class="page-heading"><div><p class="eyebrow">Klaim</p><h1>Data Klaim</h1><p>Daftar pengajuan klaim yang diterima dari SIKP.</p></div><a class="btn green" href="/klaim/create"><iconify-icon icon="tabler:plus" aria-hidden="true"></iconify-icon> Tambah Klaim</a></div>
<form class="toolbar" method="GET">
    <input name="kode_bank" placeholder="Kode Bank" value="{{ request('kode_bank') }}">
    <button class="btn" type="submit">Filter data</button>
</form>

@if(is_array($data) && count($data) && isset($data[0]) && is_array($data[0]))

<div class="card table-wrap"><table>
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
            <td>{{ $item['nama'] ?? '-' }}</td>
            <td>{{ $item['nomor_rekening'] ?? '-' }}</td>
            <td>Rp {{ number_format($item['nilai_klaim'] ?? 0,0,',','.') }}</td>
            <td>
                {{ isset($item['tgl_persetujuan_klaim'])
                    ? \Carbon\Carbon::parse($item['tgl_persetujuan_klaim'])->format('d-m-Y')
                    : '-' }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table></div>

@else
<div class="card empty-state">Tidak ada data klaim untuk filter ini.</div>
@endif

@endsection
