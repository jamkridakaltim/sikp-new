<!DOCTYPE html>
<html>
<head>
    <title>SIKP Penjamin</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .nav a { margin-right: 10px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 6px; font-size: 12px; }
        th { background: #eee; }
        input, button { padding: 5px; margin: 2px; }
    </style>
</head>
<body>

<div class="nav">
    <a href="/">Dashboard</a>
    <a href="/sertifikat">Sertifikat</a>
    <a href="/sertifikat/create">Tambah Sertifikat</a>
</div>

<hr>

@yield('content')

</body>
</html>
