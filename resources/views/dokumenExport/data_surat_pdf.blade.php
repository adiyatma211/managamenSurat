<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Surat</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Surat</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>No Agenda</th>
                <th>Kode Surat</th>
                <th>File Surat</th>
                <th>Status</th>
                <th>Tipe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->no_agenda }}</td>
                <td>{{ $item->kode_surat }}</td>
                <td>{{ $item->file_surat }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->tipe }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
