<?php

namespace App\Exports;

use App\Models\MdlSuratKeluar;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratKeluarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Hanya kolom tertentu yang akan diekspor
        return MdlSuratKeluar::select( 'no_agenda_keluar' 	,'tanggal_surat' ,	'tgl_surat_keluar' ,	'tujuan_surat' ,	'kode_surat' ,	'no_surat_keluar' 	,'prihal_surat_keluar' ,	'file_surat_keluar' 	,'penerima_surat_keluar' 	,'pengirim_keluar')->get();
    }

    /**
     * Header untuk file Excel.
     */
    public function headings(): array
    {
        return [
            'No Agenda',
            'Tanggal Surat',
            'Tanggal Surat Keluar',
            'Tujuan Surat',
            'Tanggal Terima',
            'Kode Surat',
            'Prihal',
            'File Surat',
            'Penerima',
            'Pengirim',
        ];
    }
}
