<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MdlSuratMasuk;
use App\Models\MdlSuratKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class PagesController extends Controller
{
    public function dashboard()
    {
        $totalmasuk = MdlSuratMasuk::count(); // Menghitung total surat masuk
        $totalkeluar = MdlSuratKeluar::count(); // Menghitung total surat keluar
        $totaluser = User::count();
        $suratmasuk = MdlSuratMasuk::orderBy('tgl_masuk', 'desc')->paginate(5);
        $suratkeluar = MdlSuratKeluar::orderBy('tgl_surat_keluar', 'desc')->paginate(5);
        // Ambil semua data dan tambahkan kolom tipe
        $suratmasuktabel = MdlSuratMasuk::select(
            'id',
            'no_agenda',
            'kode_surat',
            'file_surat',
            'status',
            DB::raw("'Masuk' as tipe")
        );
    
        // Query untuk Surat Keluar
        $suratkeluartabel = MdlSuratKeluar::select(
            'id',
            'no_agenda_keluar as no_agenda',
            'kode_surat',
            'file_surat_keluar as file_surat',
            'status',
            DB::raw("'Keluar' as tipe")
        );
        $data = $suratmasuktabel->union($suratkeluartabel)->orderBy('id', 'desc')->get();
        // Kirim data ke view
        return view('dashboard.v_dash', compact('totalmasuk', 'totalkeluar', 'data','suratmasuk','suratkeluar','totaluser'));
    }
    public function exportPdf()
    {
        // Data yang akan diekspor
        $suratmasuktabel = MdlSuratMasuk::select(
            'id',
            'no_agenda',
            'kode_surat',
            'file_surat',
            'status',
            DB::raw("'Masuk' as tipe")
        );
    
        $suratkeluartabel = MdlSuratKeluar::select(
            'id',
            'no_agenda_keluar as no_agenda',
            'kode_surat',
            'file_surat_keluar as file_surat',
            'status',
            DB::raw("'Keluar' as tipe")
        );
    
        $data = $suratmasuktabel->union($suratkeluartabel)->orderBy('id', 'desc')->get();
    
        // Render PDF menggunakan view
        $pdf = Pdf::loadView('dokumenExport.data_surat_pdf', compact('data'));
    
        // Unduh PDF
        return $pdf->download('data_surat.pdf');
    }
    public function exportExcel()
{
    // Data yang akan diekspor
    $suratmasuktabel = MdlSuratMasuk::select(
        'id',
        'no_agenda',
        'kode_surat',
        'file_surat',
        'status',
        DB::raw("'Masuk' as tipe")
    );

    $suratkeluartabel = MdlSuratKeluar::select(
        'id',
        'no_agenda_keluar as no_agenda',
        'kode_surat',
        'file_surat_keluar as file_surat',
        'status',
        DB::raw("'Keluar' as tipe")
    );

    $data = $suratmasuktabel->union($suratkeluartabel)->orderBy('id', 'desc')->get();

    // Export ke Excel
    return Excel::download(new class($data) implements \Maatwebsite\Excel\Concerns\FromCollection, \Maatwebsite\Excel\Concerns\WithHeadings {
        protected $data;
        public function __construct($data) { $this->data = $data; }
        public function collection() { return $this->data; }
        public function headings(): array {
            return ['ID', 'No Agenda', 'Kode Surat', 'File Surat', 'Status', 'Tipe'];
        }
    }, 'data_surat.xlsx');
}

    public function suratmasuk(){
        $suratMasuk = MdlSuratMasuk::where('deleteSts', 0)->get();
        return view ('managemensurat.v_suratmasuk', compact('suratMasuk'));
    }
    public function suratkeluar(){
        $suratKeluar = MdlSuratKeluar::where('deleteSts', 0)->get();
        return view ('managemensurat.v_suratkeluar',compact('suratKeluar'));
    }

    public function manageuser(){
        $users = User::all();
        return view ('managemenuser.v_user', compact('users'));
    }

}
