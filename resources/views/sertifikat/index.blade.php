<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat</title>
</head>
<body>

<h1>Data Sertifikat</h1>

<form method="GET">
    <input type="text" name="kode_bank" placeholder="Kode Bank">
    <button type="submit">Filter</button>
</form>

<hr>

@if(isset($data['error']) && !$data['error'])
    <table border="1" cellpadding="5">
        <tr>
            <th>Kode Bank</th>
            <th>No Rekening</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Nilai Dijamin</th>
        </tr>

        @foreach($data as $item)
            <tr>
                <td>{{ $item['kode_bank'] }}</td>
                <td>{{ $item['nomor_rekening'] }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['nik'] }}</td>
                <td>{{ $item['nilai_dijamin'] }}</td>
            </tr>
        @endforeach
    </table>
@else
    <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>
@endif

</body>
</html>
