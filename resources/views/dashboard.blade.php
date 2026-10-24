@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="page-heading">
    <div><p class="eyebrow">Dashboard SIKP</p><h1>Ringkasan penjaminan</h1><p>Monitor sertifikat, nilai dijamin, dan klaim dari SIKP API.</p></div>
    <div class="quick-actions"><a class="btn" href="/sertifikat/create">＋ Sertifikat</a><a class="btn green" href="/klaim/create">＋ Klaim</a></div>
</div>

<section class="grid stats-grid">
    <div class="card stat-card"><div class="stat-label">Total Sertifikat</div><div class="stat-value">{{ number_format($totalSertifikat ?? 0, 0, ',', '.') }}</div><div class="stat-caption">Data terbaru dari SIKP</div></div>
    <div class="card stat-card"><div class="stat-label">Nilai Dijamin</div><div class="stat-value">Rp {{ number_format($totalNilai ?? 0, 0, ',', '.') }}</div><div class="stat-caption">Total nilai penjaminan</div></div>
    <div class="card stat-card"><div class="stat-label">Total Klaim</div><div class="stat-value">Rp {{ number_format($totalKlaim ?? 0, 0, ',', '.') }}</div><div class="stat-caption">Total nilai klaim</div></div>
    <div class="card stat-card"><div class="stat-label">Status API</div><div class="stat-value" style="color:#0dad5a">● Online</div><div class="stat-caption">Koneksi SIKP aktif</div></div>
</section>

<section class="grid two-col" style="margin-top:16px">
    <div class="card"><div class="card-title"><div><h2>Sertifikat terbaru</h2><p>10 data penjaminan terakhir</p></div><a class="link" href="/sertifikat">Lihat semua →</a></div><div class="table-wrap">
        @if(is_array($sertifikat) && count($sertifikat))<table><thead><tr><th>Nama</th><th>Nilai</th><th>Tanggal</th></tr></thead><tbody>@foreach($sertifikat as $s)<tr><td>{{ $s['nama'] ?? '-' }}</td><td>Rp {{ number_format($s['nilai_dijamin'] ?? 0,0,',','.') }}</td><td>{{ isset($s['tgl_akad']) ? \Carbon\Carbon::parse($s['tgl_akad'])->format('d-m-Y') : '-' }}</td></tr>@endforeach</tbody></table>@else<div class="empty-state">Belum ada data sertifikat.</div>@endif
    </div></div>
    <div class="card"><div class="card-title"><div><h2>Klaim terbaru</h2><p>10 data klaim terakhir</p></div><a class="link" href="/klaim">Lihat semua →</a></div><div class="table-wrap">
        @if(is_array($klaim) && count($klaim))<table><thead><tr><th>Nama</th><th>Nilai Klaim</th><th>Tanggal</th></tr></thead><tbody>@foreach($klaim as $k)<tr><td>{{ $k['nama'] ?? '-' }}</td><td>Rp {{ number_format($k['nilai_klaim'] ?? 0,0,',','.') }}</td><td>{{ isset($k['tgl_persetujuan_klaim']) ? \Carbon\Carbon::parse($k['tgl_persetujuan_klaim'])->format('d-m-Y') : '-' }}</td></tr>@endforeach</tbody></table>@else<div class="empty-state">Belum ada data klaim.</div>@endif
    </div></div>
</section>

<section class="grid two-col" style="margin-top:16px">
    <div class="card"><div class="card-title"><div><h2>Status sinkronisasi</h2><p>Informasi koneksi dan token API</p></div><span class="badge">● Live Data</span></div><div class="card-pad" style="color:#64748b;line-height:2"><div><strong>Last sync:</strong> {{ now()->format('d-m-Y H:i:s') }}</div><div><strong>Source:</strong> SIKP API</div><div><strong>Token expired:</strong> {{ $expiredAt ?? '-' }}</div><div><strong>Sisa waktu:</strong> @if(!empty($remaining) && $remaining > 0) {{ floor($remaining/60) }} menit @else - @endif</div></div></div>
    <div class="card"><div class="card-title"><div><h2>Raw response</h2><p>Payload terakhir dari layanan SIKP</p></div></div><div class="card-pad"><pre>{{ json_encode(['sertifikat' => $sertifikat ?? [], 'klaim' => $klaim ?? []], JSON_PRETTY_PRINT) }}</pre></div></div>
</section>
@endsection
