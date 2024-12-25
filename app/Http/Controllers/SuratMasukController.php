<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MdlSuratMasuk;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SuratMasukExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateMdlSuratMasukRequest;

class SuratMasukController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'no_agenda' => 'nullable|integer',
            'kode_surat' => 'nullable|string|max:255',
            'nomor_surat' => 'nullable|string|max:255',
            'tgl_masuk' => 'nullable|date',
            'tgl_terima' => 'nullable|date',
            'asal_surat' => 'nullable|string|max:255',
            'prihal' => 'nullable|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf|max:2048', // Validasi file PDF
            'penerima' => 'nullable|string|max:255',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Simpan file jika ada
            $filePath = null;
            if ($request->hasFile('file_surat')) {
                // Pastikan folder "public/suratmasuk" ada
                if (!file_exists(public_path('suratmasuk'))) {
                    mkdir(public_path('suratmasuk'), 0777, true);
                }

                // Ambil informasi dari input untuk nama file
                $noAgenda = $request->input('no_agenda') ?? 'noagenda';
                $kodeSurat = $request->input('kode_surat') ?? 'kodesurat';
                $nomorSurat = $request->input('nomor_surat') ?? 'nomorsurat';

                // Format nama file
                $fileName = "{$noAgenda}_{$kodeSurat}_{$nomorSurat}.pdf";

                // Simpan di folder public/suratmasuk
                $filePath = $request->file('file_surat')->move(public_path('suratmasuk'), $fileName);
            }

            // Ambil user yang sedang login
            $createdBy = Auth::user()->name; // Sesuaikan dengan atribut user Anda

            // Buat data surat masuk
            $suratMasuk = MdlSuratMasuk::create([
                'no_agenda' => $request->input('no_agenda'),
                'kode_surat' => $request->input('kode_surat'),
                'nomor_surat' => $request->input('nomor_surat'),
                'tgl_masuk' => $request->input('tgl_masuk'),
                'tgl_terima' => $request->input('tgl_terima'),
                'asal_surat' => $request->input('asal_surat'),
                'prihal' => $request->input('prihal'),
                'file_surat' => $fileName, // Simpan relative path
                'penerima' => $request->input('penerima'),
                'deleteSts'=> '0',
                'createdBy' => $createdBy,
                'status' => 'masuk',
            ]);

            // Berhasil disimpan
            return response()->json([
                'success' => true,
                'message' => 'Surat masuk berhasil disimpan',
                'data' => $suratMasuk
            ], 201);

        } catch (\Exception $e) {
            // Jika terjadi kesalahan
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan surat masuk',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suratMasuk = MdlSuratMasuk::find($id);
    
        if (!$suratMasuk) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $suratMasuk,
            'file_name' => $suratMasuk->file_surat, // Tambahkan nama file
        ], 200);
    }
    


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $suratMasuk = MdlSuratMasuk::find($id);
    
    //     if (!$suratMasuk) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data tidak ditemukan!',
    //         ], 404);
    //     }
    
    //     try {
    //         // Ambil semua input yang diperlukan
    //         $input = $request->only([
    //             'no_agenda', 'kode_surat', 'nomor_surat',
    //             'tgl_masuk', 'tgl_terima', 'asal_surat',
    //             'prihal', 'penerima'
    //         ]);
    
    //         // Buat array untuk menyimpan perubahan
    //         $dataToUpdate = [];
    
    //         // Periksa setiap field untuk melihat apakah nilainya berbeda
    //         foreach ($input as $key => $value) {
    //             if ($value !== null && $suratMasuk->$key != $value) {
    //                 $dataToUpdate[$key] = $value;
    //             }
    //         }
    
    //         // Tangani file jika ada
    //         if ($request->hasFile('file_surat')) {
    //             // Hapus file lama jika ada
    //             if ($suratMasuk->file_surat && file_exists(public_path('suratmasuk/' . $suratMasuk->file_surat))) {
    //                 unlink(public_path('suratmasuk/' . $suratMasuk->file_surat));
    //             }
    
    //             // Tentukan nama file baru
    //             $fileName = sprintf(
    //                 '%s_%s_%s.pdf',
    //                 $input['no_agenda'] ?? 'noagenda',
    //                 $input['kode_surat'] ?? 'kodesurat',
    //                 $input['nomor_surat'] ?? 'nomorsurat'
    //             );
    
    //             // Simpan file baru
    //             $request->file('file_surat')->move(public_path('suratmasuk'), $fileName);
    
    //             // Tambahkan nama file ke array perubahan
    //             $dataToUpdate['file_surat'] = $fileName;
    //         }
    
    //         // Update hanya jika ada perubahan
    //         if (!empty($dataToUpdate)) {
    //             $suratMasuk->update($dataToUpdate);
    //         }
    
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Data berhasil diperbarui!',
    //             'updated_fields' => $dataToUpdate,
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Terjadi kesalahan saat memperbarui data!',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }
    public function update(Request $request, $id)
    {
        $suratMasuk = MdlSuratMasuk::find($id);
    
        if (!$suratMasuk) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 404);
        }
    
        try {
            // Ambil semua input yang diperlukan
            $input = $request->only([
                'no_agenda', 'kode_surat', 'nomor_surat',
                'tgl_masuk', 'tgl_terima', 'asal_surat',
                'prihal', 'penerima'
            ]);
    
            // Buat array untuk menyimpan perubahan
            $dataToUpdate = [];
    
            // Periksa setiap field untuk melihat apakah nilainya berbeda
            foreach ($input as $key => $value) {
                if ($value !== null && $suratMasuk->$key != $value) {
                    $dataToUpdate[$key] = $value;
                }
            }
    
            // Tangani file jika ada
            if ($request->hasFile('file_surat')) {
                // Hapus file lama jika ada
                if ($suratMasuk->file_surat && file_exists(public_path('suratmasuk/' . $suratMasuk->file_surat))) {
                    unlink(public_path('suratmasuk/' . $suratMasuk->file_surat));
                }
    
                // Tentukan nama file baru
                $fileName = sprintf(
                    '%s_%s_%s.pdf',
                    $input['no_agenda'] ?? $suratMasuk->no_agenda,
                    $input['kode_surat'] ?? $suratMasuk->kode_surat,
                    $input['nomor_surat'] ?? $suratMasuk->nomor_surat
                );
    
                // Simpan file baru
                $request->file('file_surat')->move(public_path('suratmasuk'), $fileName);
    
                // Tambahkan nama file ke array perubahan
                $dataToUpdate['file_surat'] = $fileName;
            } elseif (!empty(array_intersect_key($dataToUpdate, ['no_agenda' => '', 'kode_surat' => '', 'nomor_surat' => '']))) {
                // Jika no_agenda, kode_surat, atau nomor_surat berubah, rename file
                if ($suratMasuk->file_surat && file_exists(public_path('suratmasuk/' . $suratMasuk->file_surat))) {
                    $newFileName = sprintf(
                        '%s_%s_%s.pdf',
                        $input['no_agenda'] ?? $suratMasuk->no_agenda,
                        $input['kode_surat'] ?? $suratMasuk->kode_surat,
                        $input['nomor_surat'] ?? $suratMasuk->nomor_surat
                    );
    
                    // Rename file lama
                    rename(
                        public_path('suratmasuk/' . $suratMasuk->file_surat),
                        public_path('suratmasuk/' . $newFileName)
                    );
    
                    // Tambahkan nama file baru ke array perubahan
                    $dataToUpdate['file_surat'] = $newFileName;
                }
            }
    
            // Update hanya jika ada perubahan
            if (!empty($dataToUpdate)) {
                $suratMasuk->update($dataToUpdate);
            }
    
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui!',
                'updated_fields' => $dataToUpdate,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdlSuratMasuk $mdlSuratMasuk)
    {
        try {
            // Update kolom DeleteSts menjadi 1
            $mdlSuratMasuk->update([
                'deleteSts' => 1,
            ]);

            // Berhasil dihapus (soft delete)
            return response()->json([
                'success' => true,
                'message' => 'Surat masuk berhasil dihapus !',
            ], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus surat masuk!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function exportExcel()
    {
        // Format nama file dengan prefix datetime
        $fileName = 'surat_masuk_' . date('Y-m-d_H-i-s') . '.xlsx';
    
        return Excel::download(new SuratMasukExport, $fileName);
    }
    public function exportPdf()
    {
        $suratMasuk = MdlSuratMasuk::select(
            'no_agenda',
            'kode_surat',
            'nomor_surat',
            'tgl_masuk',
            'tgl_terima',
            'asal_surat',
            'prihal',
            'penerima',
            'file_surat'
        )->get();
        
        $pdf = Pdf::loadView('dokumenExport.surat_masuk_pdf', compact('suratMasuk'))
        ->setPaper('a4', 'landscape');
        
        // Nama file dengan datetime prefix
        $fileName = 'surat_masuk_' . date('Y-m-d_H-i-s') . '.pdf';
        
        return $pdf->download($fileName);
    }
    
}
