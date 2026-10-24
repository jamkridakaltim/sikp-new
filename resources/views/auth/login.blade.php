<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login · SIKP Penjamin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--purple:#2d1875;--green:#0dad5a;--ink:#0f172a;--muted:#64748b;--line:#e2e8f0}
        *{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;background:#f6f7fb;color:var(--ink);font-family:'IBM Plex Sans',sans-serif}
        .login-shell{display:grid;grid-template-columns:1.05fr 1fr;width:min(920px,calc(100% - 32px));overflow:hidden;border:1px solid var(--line);border-radius:16px;background:#fff;box-shadow:0 24px 60px rgba(45,24,117,.12)}
        .login-intro{display:flex;flex-direction:column;justify-content:space-between;min-height:480px;padding:38px;background:var(--purple);color:#fff}
        .logo{width:190px;height:48px;display:flex;align-items:center;padding:8px 12px;border-radius:8px;background:#fff}.logo img{max-width:100%;max-height:100%;object-fit:contain}
        .intro-copy{max-width:320px}.intro-copy p{color:rgba(255,255,255,.66);line-height:1.7}.intro-copy h1{margin:0;font-size:32px;line-height:1.12;letter-spacing:-.04em}.intro-foot{font-size:11px;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.42)}
        .login-form{display:flex;flex-direction:column;justify-content:center;padding:44px 48px}.login-form h2{margin:0;font-size:25px;letter-spacing:-.03em}.login-form .sub{margin:8px 0 28px;color:var(--muted)}label{display:block;margin:0 0 7px;color:#475569;font-size:12px;font-weight:600}input{width:100%;height:44px;margin-bottom:16px;border:1px solid #cbd5e1;border-radius:7px;padding:0 13px;font:inherit;outline:none}input:focus{border-color:var(--purple);box-shadow:0 0 0 3px rgba(45,24,117,.1)}button{width:100%;height:44px;border:0;border-radius:7px;background:var(--purple);color:#fff;font:600 14px inherit;cursor:pointer}button:hover{background:#211159}.error{margin-bottom:18px;border-radius:7px;background:#fef2f2;color:#b91c1c;padding:11px 12px;font-size:13px}
        @media(max-width:680px){.login-shell{grid-template-columns:1fr}.login-intro{min-height:260px;padding:26px}.intro-copy{margin-top:44px}.intro-copy h1{font-size:26px}.intro-copy p,.intro-foot{display:none}.login-form{padding:34px 26px}}
    </style>
</head>
<body>
<div class="login-shell">
    <section class="login-intro"><a href="/" class="logo"><img src="/logo-jamkrida-kaltim.png" alt="Jamkrida Kaltim"></a><div class="intro-copy"><h1>Kelola penjaminan lebih terarah.</h1><p>SIKP membantu memantau sertifikat, nilai dijamin, dan klaim dalam satu ruang kerja.</p></div><div class="intro-foot">SIKP · Jamkrida Kaltim</div></section>
    <section class="login-form"><h2>Selamat datang</h2><p class="sub">Masuk ke dashboard SIKP Penjamin.</p>@if(session('error'))<div class="error">{{ session('error') }}</div>@endif<form method="POST">@csrf<label for="username">Username</label><input id="username" name="username" placeholder="Masukkan username" autocomplete="username" required><label for="password">Password</label><input id="password" type="password" name="password" placeholder="Masukkan password" autocomplete="current-password" required><button type="submit">Masuk ke SIKP</button></form></section>
</div>
</body>
</html>
