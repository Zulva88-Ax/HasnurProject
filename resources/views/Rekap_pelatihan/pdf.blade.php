
<!DOCTYPE html>
<html>
<head>
    <title>Rekap Pelatihan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Rekap Pelatihan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Trainer</th>
                <th>Tanggal</th>
                <th>Sesi</th>
                <th>Waktu</th>
                <th>Topik</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelatihan as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama_trainer }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->sesi }}</td>
                    <td>{{ $p->waktu }}</td>
                    <td>{{ $p->topik }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
