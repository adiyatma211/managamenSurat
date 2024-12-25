@extends('layouts.base')
@section('konten')
    <div class="page-heading">
        <h3>Dashboard Managemen Master Surat</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel  Master Surat Masuk dan Keluar</h4>
                            </div>
                            <div class="card-body">
                                <section class="section">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center">
                                                <button class="btn btn-secondary me-2">
                                                    <i class="fas fa-file-export"></i> Export Semua Data
                                                </button>
                                                <button class="btn btn-success me-2">
                                                    <i class="fas fa-file-excel"></i> Export Surat Masuk
                                                </button>
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-file-pdf"></i> Export Surat Keluar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor Agenda</th>
                                                            <th>Kode Surat</th>
                                                            <th>Nomor Surat</th>
                                                            <th>Asal Surat</th>
                                                            <th>Prihal</th>
                                                            <th>File Surat</th>
                                                            <th>Penerima</th>
                                                            <th>Keluar Oleh</th>
                                                            <th>Status</th>
                                                            <th>Tanggal Surat Masuk</th>
                                                            <th>Tanggal Surat Keluar</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle">1</td>
                                                            <td class="text-center align-middle">123</td>
                                                            <td class="text-center align-middle">ABC123</td>
                                                            <td class="text-center align-middle">456/DEF/2024</td>
                                                            <td class="text-center align-middle">Instansi A</td>
                                                            <td class="text-center align-middle">Permohonan Informasi</td>
                                                            <td class="text-center align-middle">
                                                                <button class="btn btn-primary btn-sm text-truncate" style="max-width: 200px;">
                                                                    file_surat.pdf
                                                                </button>
                                                            </td>
                                                            <td class="text-center align-middle">Admin Pusat</td>
                                                            <td class="text-center align-middle">John Doe</td>
                                                            <td class="text-center align-middle">
                                                                <span class="badge bg-danger">Keluar</span>
                                                            </td>
                                                            <td class="text-center align-middle">2024-12-25</td>
                                                            <td class="text-center align-middle">2024-12-26</td>
                                                            <td class="text-center align-middle">
                                                                <div class="d-flex justify-content-center align-items-center">
                                                                    <button class="btn btn-sm btn-primary me-2">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </button>
                                                                    <button class="btn btn-sm btn-info me-2">
                                                                        <i class="fas fa-eye"></i> View
                                                                    </button>
                                                                    <button class="btn btn-sm btn-danger">
                                                                        <i class="fas fa-trash"></i> Delete
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center align-middle">1</td>
                                                            <td class="text-center align-middle">123</td>
                                                            <td class="text-center align-middle">ABC123</td>
                                                            <td class="text-center align-middle">456/DEF/2024</td>
                                                            <td class="text-center align-middle">Instansi A</td>
                                                            <td class="text-center align-middle">Permohonan Informasi</td>
                                                            <td class="text-center align-middle">
                                                                <button class="btn btn-primary btn-sm text-truncate" style="max-width: 200px;">
                                                                    file_surat.pdf
                                                                </button>
                                                            </td>
                                                            <td class="text-center align-middle">Admin Pusat</td>
                                                            <td class="text-center align-middle">John Doe</td>
                                                            <td class="text-center align-middle">
                                                                <span class="badge bg-success">Masuk</span>
                                                            </td>
                                                            <td class="text-center align-middle">2024-12-25</td>
                                                            <td class="text-center align-middle">2024-12-26</td>
                                                            <td class="text-center align-middle">
                                                                <div class="d-flex justify-content-center align-items-center">
                                                                    <button class="btn btn-sm btn-primary me-2">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </button>
                                                                    <button class="btn btn-sm btn-info me-2">
                                                                        <i class="fas fa-eye"></i> View
                                                                    </button>
                                                                    <button class="btn btn-sm btn-danger">
                                                                        <i class="fas fa-trash"></i> Delete
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>                                                
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
