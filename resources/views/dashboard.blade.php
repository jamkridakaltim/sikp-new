@extends('layouts.app')

@section('content')

<h2 style="margin-bottom:20px;">Dashboard</h2>

<div class="grid">

    <div class="card">
        <div style="color:#64748b;">Total Sertifikat</div>
        <div class="stat">{{ $totalSertifikat ?? 0 }}</div>
    </div>

    <div class="card">
        <div style="color:#64748b;">Nilai Dijamin</div>
        <div class="stat">
            Rp {{ number_format($totalNilai ?? 0,0,',','.') }}
        </div>
    </div>

    <div class="card">
        <div style="color:#64748b;">Total Klaim</div>
        <div class="stat">
            Rp {{ number_format($totalKlaim ?? 0,0,',','.') }}
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
                    <td>{{ $s['nama'] ?? '-' }}</td>
                    <td>Rp {{ number_format($s['nilai_dijamin'] ?? 0,0,',','.') }}</td>
                    <td>
                        {{ isset($s['tgl_akad'])
                            ? \Carbon\Carbon::parse($s['tgl_akad'])->format('d-m-Y')
                            : '-' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p style="color:#94a3b8;">Tidak ada data</p>
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
            <table>
                <tr>
                    <td colspan="3" style="text-align:center; color:#94a3b8;">
                        Belum ada data klaim
                    </td>
                </tr>
            </table>
        @endif
    </div>

</div>

<br>

<div class="card">
    <h3>Quick Action</h3>

    <a href="/sertifikat/create">
        <button class="btn" style="background:#2563eb;">+ Sertifikat</button>
    </a>

    <a href="/klaim/create">
        <button class="btn" style="background:#10b981;">+ Klaim</button>
    </a>
</div>

<br>

<!-- SYSTEM INFO -->
<div class="card">
    <h3>System Info</h3>

    <div style="font-size:13px; color:#64748b;">
        <div><strong>Last sync:</strong> {{ now() }}</div>
        <div><strong>Source:</strong> SIKP API</div>
        <div style="color:#22c55e;">● Live Data</div>
    </div>
</div>

<br>

<!-- RAW RESPONSE -->
<div class="card">
    <h3>Raw Response (SIKP API)</h3>

    <div style="max-height:250px; overflow:auto; background:#0f172a; color:#e2e8f0; padding:10px; border-radius:6px; font-size:12px;">
        <pre>{{ json_encode($sertifikat ?? [], JSON_PRETTY_PRINT) }}</pre>
    </div>

    <br>

    <div style="max-height:250px; overflow:auto; background:#0f172a; color:#e2e8f0; padding:10px; border-radius:6px; font-size:12px;">
        <pre>{{ json_encode($klaim ?? [], JSON_PRETTY_PRINT) }}</pre>
    </div>
</div>

<br>

<div style="font-size:12px; color:#94a3b8;">
    Last update: {{ now()->format('d-m-Y H:i:s') }}
</div>

@endsection
