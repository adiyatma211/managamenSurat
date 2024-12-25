<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\MdlSuratKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SuratKeluarExport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class SuratKeluarController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'no_agenda_keluar' => 'nullable|integer',
            'kode_surat' => 'nullable|string|max:255',
            'no_surat_keluar' => 'nullable|string|max:255',
            'tgl_surat_keluar' => 'nullable|date',
            'tanggal_surat' => 'nullable|date',
            'tujuan_surat' => 'nullable|string|max:255',
            'prihal_surat_keluar' => 'nullable|string|max:255',
            'file_surat_keluar' => 'nullable|file|mimes:pdf|max:2048',
            'penerima_surat_keluar' => 'nullable|string|max:255',
            'pengirim_keluar' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $fileName = null;

            if ($request->hasFile('file_surat_keluar')) {
                $file = $request->file('file_surat_keluar');
                Log::info('File diterima: ' . $file->getClientOriginalName());

                $destinationPath = public_path('suratkeluar');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                    Log::info('Folder suratkeluar dibuat: ' . $destinationPath);
                }

                $fileName = $request->input('no_agenda_keluar') . '_' . $request->input('kode_surat') . '_' . $request->input('no_surat_keluar') . '.pdf';
                $file->move($destinationPath, $fileName);
                Log::info('File berhasil diupload ke: ' . $destinationPath . '/' . $fileName);
            } else {
                Log::info('Tidak ada file yang diunggah.');
            }

            $createdBy = Auth::user()->name;

            $suratKeluar = MdlSuratKeluar::create([
                'no_agenda_keluar' => $request->input('no_agenda_keluar'),
                'kode_surat' => $request->input('kode_surat'),
                'no_surat_keluar' => $request->input('no_surat_keluar'),
                'tgl_surat_keluar' => $request->input('tgl_surat_keluar'),
                'tanggal_surat' => $request->input('tanggal_surat'),
                'tujuan_surat' => $request->input('tujuan_surat'),
                'prihal_surat_keluar' => $request->input('prihal_surat_keluar'),
                'file_surat_keluar' => $fileName,
                'penerima_surat_keluar' => $request->input('penerima_surat_keluar'),
                'pengirim_keluar' => $request->input('pengirim_keluar'),
                'deleteSts' => '0',
                'createdBy' => $createdBy,
                'status' => 'keluar',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Surat keluar berhasil disimpan',
                'data' => $suratKeluar
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error saat menyimpan surat keluar: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan surat keluar',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $suratKeluar = MdlSuratKeluar::find($id);
    
        if (!$suratKeluar) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $suratKeluar,
            'file_name' => $suratKeluar->file_surat_keluar, // Tambahkan nama file
        ], 200);
    }
    
        /**
         * Update the specified resource.
         */
        // public function update(Request $request, $id)
        // {
        //     $suratKeluar = MdlSuratKeluar::find($id);
        
        //     if (!$suratKeluar) {
        //         return response()->json([
        //             'success' => false,
        //             'message' => 'Data tidak ditemukan!',
        //         ], 404);
        //     }
        
        //     try {
        //         // Ambil semua input yang diperlukan
        //         $input = $request->only([
        //             'no_agenda_keluar', 'tanggal_surat', 'tgl_surat_keluar',
        //             'tujuan_surat', 'kode_surat', 'no_surat_keluar',
        //             'prihal_surat_keluar', 'penerima_surat_keluar', 'pengirim_keluar'
        //         ]);
        
        //         // Buat array untuk menyimpan perubahan
        //         $dataToUpdate = [];
        
        //         // Periksa setiap field untuk melihat apakah nilainya berbeda
        //         foreach ($input as $key => $value) {
        //             if ($value !== null && $suratKeluar->$key != $value) {
        //                 $dataToUpdate[$key] = $value;
        //             }
        //         }
        
        //         // Tangani file jika ada
        //         if ($request->hasFile('file_surat_keluar')) {
        //             // Hapus file lama jika ada
        //             if ($suratKeluar->file_surat_keluar && file_exists(public_path('suratkeluar/' . $suratKeluar->file_surat_keluar))) {
        //                 unlink(public_path('suratkeluar/' . $suratKeluar->file_surat_keluar));
        //             }
        
        //             // Tentukan nama file baru
        //             $fileName = sprintf(
        //                 '%s_%s_%s.pdf',
        //                 $input['no_agenda_keluar'] ?? 'noagenda',
        //                 $input['kode_surat'] ?? 'kodesurat',
        //                 $input['no_surat_keluar'] ?? 'nomorsurat'
        //             );
        
        //             // Simpan file baru
        //             $request->file('file_surat_keluar')->move(public_path('suratkeluar'), $fileName);
        
        //             // Tambahkan nama file ke array perubahan
        //             $dataToUpdate['file_surat_keluar'] = $fileName;
        //         }
        
        //         // Update hanya jika ada perubahan
        //         if (!empty($dataToUpdate)) {
        //             $dataToUpdate['updatedBy'] = Auth::user()->name; // Tambahkan updatedBy
        //             $suratKeluar->update($dataToUpdate);
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
    $suratKeluar = MdlSuratKeluar::find($id);

    if (!$suratKeluar) {
        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan!',
        ], 404);
    }

    try {
        // Ambil semua input yang diperlukan
        $input = $request->only([
            'no_agenda_keluar', 'tanggal_surat', 'tgl_surat_keluar',
            'tujuan_surat', 'kode_surat', 'no_surat_keluar',
            'prihal_surat_keluar', 'penerima_surat_keluar', 'pengirim_keluar'
        ]);

        // Buat array untuk menyimpan perubahan
        $dataToUpdate = [];

        // Periksa setiap field untuk melihat apakah nilainya berbeda
        foreach ($input as $key => $value) {
            if ($value !== null && $suratKeluar->$key != $value) {
                $dataToUpdate[$key] = $value;
            }
        }

        // Tangani file jika ada file baru
        if ($request->hasFile('file_surat_keluar')) {
            // Hapus file lama jika ada
            if ($suratKeluar->file_surat_keluar && file_exists(public_path('suratkeluar/' . $suratKeluar->file_surat_keluar))) {
                unlink(public_path('suratkeluar/' . $suratKeluar->file_surat_keluar));
            }

            // Tentukan nama file baru
            $fileName = sprintf(
                '%s_%s_%s.pdf',
                $input['no_agenda_keluar'] ?? 'noagenda',
                $input['kode_surat'] ?? 'kodesurat',
                $input['no_surat_keluar'] ?? 'nomorsurat'
            );

            // Simpan file baru
            $request->file('file_surat_keluar')->move(public_path('suratkeluar'), $fileName);

            // Tambahkan nama file ke array perubahan
            $dataToUpdate['file_surat_keluar'] = $fileName;
        } elseif (!empty(array_intersect_key($dataToUpdate, ['no_agenda_keluar' => '', 'kode_surat' => '', 'no_surat_keluar' => '']))) {
            // Jika salah satu dari no_agenda_keluar, kode_surat, atau no_surat_keluar berubah, rename file
            if ($suratKeluar->file_surat_keluar && file_exists(public_path('suratkeluar/' . $suratKeluar->file_surat_keluar))) {
                $newFileName = sprintf(
                    '%s_%s_%s.pdf',
                    $input['no_agenda_keluar'] ?? $suratKeluar->no_agenda_keluar,
                    $input['kode_surat'] ?? $suratKeluar->kode_surat,
                    $input['no_surat_keluar'] ?? $suratKeluar->no_surat_keluar
                );

                // Rename file lama
                rename(
                    public_path('suratkeluar/' . $suratKeluar->file_surat_keluar),
                    public_path('suratkeluar/' . $newFileName)
                );

                // Tambahkan nama file baru ke array perubahan
                $dataToUpdate['file_surat_keluar'] = $newFileName;
            }
        }

        // Update hanya jika ada perubahan
        if (!empty($dataToUpdate)) {
            $dataToUpdate['updatedBy'] = Auth::user()->name; // Tambahkan updatedBy
            $suratKeluar->update($dataToUpdate);
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
    public function destroy($id)
    {
        try {
            // Find the record by ID
            $suratKeluar = MdlSuratKeluar::findOrFail($id);

            // Update the deleteSts field to 1
            $suratKeluar->update(['deleteSts' => 1]);

            return response()->json([
                'success' => true,
                'message' => 'Surat Keluar deleted successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function exportExcel()
    {
        // Format nama file dengan prefix datetime
        $fileName = 'surat_keluar_' . date('Y-m-d_H-i-s') . '.xlsx';
    
        return Excel::download(new SuratKeluarExport, $fileName);
    }
    public function exportPdf()
    {
        $suratKeluar = MdlSuratKeluar::select(
           'no_agenda_keluar',
           'tanggal_surat' ,
           'tgl_surat_keluar' ,
           'tujuan_surat' ,	
           'kode_surat' ,	
           'no_surat_keluar' ,
           'prihal_surat_keluar',
           'penerima_surat_keluar',
           'pengirim_keluar',
           'file_surat_keluar',

        )->get();
        
        $pdf = Pdf::loadView('dokumenExport.surat_keluar_pdf', compact('suratKeluar'))
        ->setPaper('a4', 'landscape');
        
        // Nama file dengan datetime prefix
        $fileName = 'surat_keluar_' . date('Y-m-d_H-i-s') . '.pdf';
        
        return $pdf->download($fileName);
    }

}
