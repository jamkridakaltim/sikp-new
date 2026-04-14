<!DOCTYPE html>
<html>
<head>
    <title>SIKP Penjamin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Inter, Arial;
            margin: 0;
            background: #f5f7fb;
        }

        .mono {
            font-family: 'IBM Plex Mono', monospace;
            letter-spacing: 0.5px;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #1e293b;
            color: white;
            position: fixed;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: #cbd5f5;
            padding: 8px;
            text-decoration: none;
            border-radius: 6px;
        }

        .sidebar a:hover {
            background: #334155;
        }

        .content {
            margin-left: 240px;
            padding-left: 60px;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .stat {
            font-size: 22px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #eee;
            font-size: 13px;
        }

        th {
            background: #f1f5f9;
            text-align: left;
        }

        .btn {
            padding: 6px 10px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input {
            padding: 6px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body class="mono">

<div class="sidebar">
    <h2>SIKP Penjamin</h2>
    <a href="/">Dashboard</a>
    <a href="/sertifikat">Sertifikat</a>
    <a href="/sertifikat/create">Tambah Sertifikat</a>
    <a href="/klaim">Klaim</a>
    <a href="/klaim/create">Tambah Klaim</a>
    <a href="/logout">Keluar</a>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>
