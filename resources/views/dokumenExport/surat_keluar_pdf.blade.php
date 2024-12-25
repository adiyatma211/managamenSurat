<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keluar</title>
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
    <h1>Daftar Surat Keluar</h1>
    <table>
        <thead>
            <tr>
                <th>No Agenda</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Surat Keluar</th>
                <th>Tujuan Surat</th>
                <th>Kode Surat</th>
                <th>Nomor Surat</th>
                <th>Prihal</th>
                <th>Penerima</th>
                <th>Pengirim</th>
                <th>File Surat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratKeluar as $item)
                <tr>
                    <td>{{ $item->no_agenda_keluar }}</td>
                    <td>{{ $item->tanggal_surat }}</td>
                    <td>{{ $item->tgl_surat_keluar }}</td>
                    <td>{{ $item->tujuan_surat }}</td>
                    <td>{{ $item->kode_surat }}</td>
                    <td>{{ $item->no_surat_keluar }}</td>
                    <td>{{ $item->prihal_surat_keluar }}</td>
                    <td>{{ $item->penerima_surat_keluar }}</td>
                    <td>{{ $item->pengirim_keluar }}</td>
                    <td>{{$item->file_surat_keluar}}</td>
                    {{-- <td>
                        @if($item->file_surat_keluar)
                            <a href="{{ asset('suratkeluar/' . $item->file_surat_keluar) }}" target="_blank">
                               {{$item->file_surat_keluar}}
                            </a>
                        @else
                            Tidak Ada File
                        @endif
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
