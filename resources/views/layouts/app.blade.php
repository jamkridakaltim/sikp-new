<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SIKP Penjamin') · Jamkrida Kaltim</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@php($current = request()->path())
<div class="app-shell">
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <a href="/" class="brand-logo"><img src="/logo-jamkrida-kaltim.png" alt="Jamkrida Kaltim"></a>
        </div>
        <nav class="sidebar-nav" aria-label="Navigasi utama">
            <div class="nav-group">
                <p class="nav-label">Overview</p>
                <a class="nav-item {{ $current === '/' ? 'active' : '' }}" href="/"><span class="nav-icon">⌂</span> Dashboard</a>
            </div>
            <div class="nav-group">
                <p class="nav-label">Penjaminan</p>
                <a class="nav-item {{ str_starts_with($current, 'sertifikat') ? 'active' : '' }}" href="/sertifikat"><span class="nav-icon">▣</span> Sertifikat</a>
                <a class="nav-item {{ $current === 'sertifikat/create' ? 'active' : '' }}" href="/sertifikat/create"><span class="nav-icon">＋</span> Tambah Sertifikat</a>
            </div>
            <div class="nav-group">
                <p class="nav-label">Klaim</p>
                <a class="nav-item {{ $current === 'klaim' ? 'active' : '' }}" href="/klaim"><span class="nav-icon">↩</span> Klaim</a>
                <a class="nav-item {{ $current === 'klaim/create' ? 'active' : '' }}" href="/klaim/create"><span class="nav-icon">＋</span> Tambah Klaim</a>
            </div>
            <div class="nav-footer"><a class="nav-item" href="/logout"><span class="nav-icon">↪</span> Keluar</a></div>
        </nav>
    </aside>
    <div class="main-shell">
        <header class="topbar">
            <button class="menu-toggle" type="button" aria-label="Buka navigasi" onclick="document.getElementById('sidebar').classList.toggle('open')">☰</button>
            <div class="topbar-title"><strong>SIKP</strong><span>Sistem Informasi Kredit Program</span></div>
            <div class="topbar-meta"><span class="status-dot"></span> SIKP API <strong>Online</strong></div>
        </header>
        <main class="content">
            @if(session('success'))<div class="flash success">✓ {{ session('success') }}</div>@endif
            @if(session('error'))<div class="flash error">! {{ session('error') }}</div>@endif
            @yield('content')
        </main>
    </div>
</div>
<div class="sidebar-backdrop" onclick="document.getElementById('sidebar').classList.remove('open')"></div>
</body>
</html>
