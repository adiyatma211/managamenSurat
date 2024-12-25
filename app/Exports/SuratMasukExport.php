<?php

namespace App\Exports;

use App\Models\MdlSuratMasuk;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratMasukExport implements FromCollection, WithHeadings
{
    /**
     * Data yang akan diekspor.
     */
    public function collection()
    {
        // Hanya kolom tertentu yang akan diekspor
        return MdlSuratMasuk::select('no_agenda' ,	'kode_surat' ,'nomor_surat' 	,'tgl_masuk','tgl_terima' ,'asal_surat' ,'prihal','file_surat' ,'penerima')->get();
    }

    /**
     * Header untuk file Excel.
     */
    public function headings(): array
    {
        return [
            'No Agenda',
            'Kode Surat',
            'Nomor Surat',
            'Tanggal Surat Masuk',
            'Tanggal Terima',
            'Asal Surat',
            'Prihal',
            'File Surat',
            'Penerima',
        ];
    }
}