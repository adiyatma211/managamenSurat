<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

Route::middleware('auth','role:admin,user')->group(function () {
    Route::get('/', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/export/excel/dash', [PagesController::class, 'exportExcel'])->name('export.excel.dash');
    Route::get('/export/pdf/dash', [PagesController::class, 'exportPdf'])->name('export.pdf.dash');
});


Route::middleware('auth','role:admin,user')->group(function () {
    Route::get('/suratmasuks', [PagesController::class, 'suratmasuk'])->name('suratmasuk.index');
    Route::post('/suratmasuk/save', [SuratMasukController::class, 'store'])->name('suratmasuk.save');
    Route::get('/suratmasuk/view/{filename}', function ($filename) {
        $path = public_path('suratmasuk/' . $filename);
        if (!file_exists($path)) {
            abort(404); // Tampilkan error 404 jika file tidak ditemukan
        }
        return response()->file($path, [
            'Content-Type' => 'application/pdf', // Pastikan browser mengenali file sebagai PDF
        ]);
    })->name('suratmasuk.view');

    Route::get('/suratmasuk/edit/{id}', [SuratMasukController::class, 'edit'])->name('suratmasuk.edit');
    Route::post('/suratmasuk/update/{id}', [SuratMasukController::class, 'update'])->name('suratmasuk.update');

    Route::delete('/suratmasuk/delete/{mdlSuratMasuk}', [SuratMasukController::class, 'destroy'])->name('suratmasuk.destroy');
    Route::get('/export/excel', [SuratMasukController::class, 'exportExcel'])->name('suratmasuk.export.excel');
    Route::get('/suratmasuk/export-pdf', [SuratMasukController::class, 'exportPdf'])->name('suratmasuk.exportPdf');
});


Route::middleware('auth','role:admin,user')->group(function () {
    Route::get('/suratkeluars', [PagesController::class, 'suratkeluar']);
    // Tambah Surat Keluar
    Route::post('/surat-keluar/store', [SuratKeluarController::class, 'store'])->name('suratkeluar.store');

    // Edit Surat Keluar (Form Edit)
    Route::get('/surat-keluar/edit/{id}', [SuratKeluarController::class, 'edit'])->name('suratkeluar.edit');

    // Update Surat Keluar
    Route::post('/surat-keluar/update/{id}', [SuratKeluarController::class, 'update'])->name('suratkeluar.update');

    // Hapus Surat Keluar
    Route::post('/surat-keluar/delete/{id}', [SuratKeluarController::class, 'destroy'])->name('suratkeluar.destroy');

    Route::get('/surat-keluar/view/{filename}', function ($filename) {
        $path = public_path('suratkeluar/' . $filename);
        if (!file_exists($path)) {
            abort(404); // Tampilkan error 404 jika file tidak ditemukan
        }
        return response()->file($path, [
            'Content-Type' => 'application/pdf', // Pastikan browser mengenali file sebagai PDF
        ]);
    })->name('suratkeluar.view');

    Route::get('/exportKeluar/excel', [SuratKeluarController::class, 'exportExcel'])->name('suratkeluar.export.excel');
    Route::get('/suratkeluar/export-pdf', [SuratKeluarController::class, 'exportPdf'])->name('suratkeluar.exportPdf');
});


Route::middleware('auth','role:admin,user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/manageUser', [PagesController::class, 'manageuser']);
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

});


require __DIR__ . '/auth.php';
