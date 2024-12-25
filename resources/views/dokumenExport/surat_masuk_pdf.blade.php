<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Masuk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Surat Masuk</h1>
    <table>
        <thead>
            <tr>
                <th>No Agenda</th>
                <th>Kode Surat</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat Masuk</th>
                <th>Tanggal Terima</th>
                <th>Asal Surat</th>
                <th>Prihal</th>
                <th>Penerima</th>
                <th>File Surat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratMasuk as $item)
                <tr>
                    <td>{{ $item->no_agenda }}</td>
                    <td>{{ $item->kode_surat }}</td>
                    <td>{{ $item->nomor_surat }}</td>
                    <td>{{ $item->tgl_masuk }}</td>
                    <td>{{ $item->tgl_terima }}</td>
                    <td>{{ $item->asal_surat }}</td>
                    <td>{{ $item->prihal }}</td>
                    <td>{{ $item->penerima }}</td>
                    <td>{{ $item->file_surat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
