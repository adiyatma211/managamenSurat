@extends('layouts.base')
@section('konten')
<div class="page-heading">
    <h3>Dashboard Managemen</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div
                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pengguna</h6>
                                    <h6 class="font-extrabold mb-0">{{$totaluser}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div
                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Surat Masuk</h6>
                                    <h6 class="font-extrabold mb-0">{{$totalmasuk}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div
                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Surat Keluar</h6>
                                    <h6 class="font-extrabold mb-0">{{$totalkeluar}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div
                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Surat Masuk dan Keluar</h4>
                        </div>
                        <div class="card-body">
                            <section class="section">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Export Dalam Format
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" href="/export/excel/dash">
                                                            <span class="badge bg-success text-white me-2">
                                                                <i class="fas fa-file-excel"></i>
                                                            </span>
                                                            Excel
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" href="/export/pdf/dash">
                                                            <span class="badge bg-danger text-white me-2">
                                                                <i class="fas fa-file-pdf"></i>
                                                            </span>
                                                            PDF
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>No Agenda</th>
                                                        <th>Kode Surat</th>
                                                        <th>File Surat</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->no_agenda }}</td>
                                                        <td>{{ $item->kode_surat }}</td>
                                                        {{-- <td>{{$item->file_surat}}</td> --}}
                                                        <td>
                                                            @if ($item->file_surat)
                                                                @if ($item->status === 'masuk')
                                                                    <a href="{{ asset('suratmasuk/' . $item->file_surat) }}" target="_blank"> {{$item->file_surat}} </a>
                                                                @elseif ($item->status === 'keluar')
                                                                    <a href="{{ asset('suratkeluar/' . $item->file_surat) }}" target="_blank">{{$item->file_surat}}</a>
                                                                @endif
                                                            @else
                                                                Tidak Ada File
                                                            @endif
                                                        </td>
                                                        
                                                        <td>{{ $item->status }}</td>
                                                    </tr>
                                                    @endforeach
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
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('dist/assets/compiled/jpg/1.jpg') }}" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">Hai {{ Auth::user()->name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="card"> 
                <div class="card-header">
                    <h4>Surat Masuk</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach ($suratmasuk as $masuk)
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <i class="fas fa-file-pdf fa-3x text-danger"></i>
                        </div>                        
                        <div class="name ms-4">
                            <a href="{{ asset('suratmasuk/' . $masuk->file_surat) }}" target="_blank">
                                {{ $masuk->file_surat ?? 'Judul Tidak Diketahui' }}
                            </a>
                            <h6 class="text-muted mb-0">{{ $masuk->tgl_masuk ?? 'Tanggal Tidak Tersedia' }}</h6>
                        </div>
                    </div>
                    @endforeach
                    <div class="px-4">
                        <a href="/suratmasuks" class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="card"> 
                <div class="card-header">
                    <h4>Surat Keluar</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach ($suratkeluar as $keluar)
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <i class="fas fa-file-pdf fa-3x text-danger"></i>
                        </div>                        
                        <div class="name ms-4">
                            <a href="{{ asset('suratkeluar/' . $keluar->file_surat_keluar) }}" target="_blank">
                                {{ $keluar->file_surat_keluar ?? 'Judul Tidak Diketahui' }}
                            </a>
                            <h6 class="text-muted mb-0">{{ $keluar->tgl_surat_keluar ?? 'Tanggal Tidak Tersedia' }}</h6>
                        </div>
                    </div>
                    @endforeach
                    <div class="px-4">
                        <a href="/suratkeluars" class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>   
@endsection