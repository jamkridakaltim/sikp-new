@extends('layouts.app')

@section('content')

<h2 style="margin-bottom:20px;">Dashboard</h2>

<div class="grid">

    <div class="card">
        <div style="color:#64748b;">Total Sertifikat</div>
        <div class="stat">{{ $totalSertifikat }}</div>
    </div>

    <div class="card">
        <div style="color:#64748b;">Nilai Dijamin</div>
        <div class="stat">
            Rp {{ number_format($totalNilai,0,',','.') }}
        </div>
    </div>

    <div class="card">
        <div style="color:#64748b;">Total Klaim</div>
        <div class="stat">
            Rp {{ number_format($totalKlaim,0,',','.') }}
        </div>
    </div>

    <div class="card">
        <div style="color:#64748b;">Status API</div>
        <div class="stat" style="color:green;">● Online</div>
    </div>

</div>

<br>

<div class="grid" style="grid-template-columns: 1fr 1fr;">

    <!-- Sertifikat -->
    <div class="card">
        <h3>Data Sertifikat Terbaru</h3>

        @if(is_array($sertifikat) && count($sertifikat))
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nilai</th>
                    <th>Tgl</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sertifikat as $s)
                <tr>
                    <td>{{ $s['nama'] }}</td>
                    <td>Rp {{ number_format($s['nilai_dijamin'],0,',','.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($s['tgl_akad'])->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Tidak ada data</p>
        @endif
    </div>

    <!-- Klaim -->
    <div class="card">
        <h3>Data Klaim Terbaru</h3>

        @if(is_array($klaim) && count($klaim))
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nilai Klaim</th>
                    <th>Tgl</th>
                </tr>
            </thead>
            <tbody>
                @foreach($klaim as $k)
                <tr>
                    <td>{{ $k['nama'] ?? '-' }}</td>
                    <td>Rp {{ number_format($k['nilai_klaim'] ?? 0,0,',','.') }}</td>
                    <td>
                        {{ isset($k['tgl_persetujuan_klaim'])
                            ? \Carbon\Carbon::parse($k['tgl_persetujuan_klaim'])->format('d-m-Y')
                            : '-' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Tidak ada data</p>
        @endif
    </div>

</div>

<br>

<div class="card">
    <h3>Quick Action</h3>

    <a href="/sertifikat/create">
        <button class="btn">+ Tambah Sertifikat</button>
    </a>

    <a href="/klaim/create">
        <button class="btn" style="background:#10b981;">+ Tambah Klaim</button>
    </a>
</div>

@endsection
