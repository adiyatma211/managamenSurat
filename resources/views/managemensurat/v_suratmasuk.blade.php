@extends('layouts.base')
@section('konten')
    <div class="page-heading">
        <h3>Dashboard Managemen Surat Masuk</h3>
    </div>
    <div class="page-content">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Surat Masuk</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col d-flex align-items-center">
                                    <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
                                        <i class="fas fa-plus"></i> Add New Surat Masuk
                                    </button>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Export Dalam Format
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('suratmasuk.export.excel') }}">
                                                    <span class="badge bg-success text-white me-2">
                                                        <i class="fas fa-file-excel"></i>
                                                    </span>
                                                    Excel
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="/suratmasuk/export-pdf">
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
                            


                            <div class="table-responsive mt-3">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nomor Agenda</th>
                                            <th class="text-center">Kode Surat</th>
                                            <th class="text-center">Nomor Surat</th>
                                            <th class="text-center">Tanggal Surat Masuk</th>
                                            <th class="text-center">Tanggal Terima</th>
                                            <th class="text-center">Asal Surat</th>
                                            <th class="text-center">Prihal</th>
                                            <th class="text-center">File Surat</th>
                                            <th class="text-center">Penerima</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suratMasuk as $item)
                                            <tr>
                                                <td>{{ $loop->iteration ?? 'kosong' }}</td>
                                                <td>{{ $item->no_agenda ?? 'kosong' }}</td>
                                                <td>{{ $item->kode_surat ?? 'kosong' }}</td>
                                                <td>{{ $item->nomor_surat ?? 'kosong' }}</td>
                                                <td>{{ $item->tgl_masuk ?? 'kosong' }}</td>
                                                <td>{{ $item->tgl_terima ?? 'kosong' }}</td>
                                                <td>{{ $item->asal_surat ?? 'kosong' }}</td>
                                                <td>{{ $item->prihal ?? 'kosong' }}</td>
                                                <td>
                                                    @if ($item->file_surat)
                                                        <a href="{{ route('suratmasuk.view', $item->file_surat) }}"
                                                            target="_blank" class="btn btn-primary btn-sm">
                                                            {{ $item->file_surat }}
                                                        </a>
                                                    @else
                                                        Kosong
                                                    @endif
                                                </td>
                                                <td>{{ $item->penerima ?? 'kosong' }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <button class="btn btn-primary btn-sm editButton"
                                                            data-id="{{ $item->id ?? '' }}">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                        <button class="btn btn-danger btn-sm deleteButton"
                                                            data-id="{{ $item->id ?? '' }}">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                        <button class="btn btn-info btn-sm viewButton"
                                                            data-id="{{ $item->id ?? '' }}">
                                                            <i class="fas fa-eye"></i> View
                                                        </button>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Surat Masuk</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="csrf" value="{{ csrf_token() }}">
                    <div class="modal-body" style="max-height: 800px; overflow-y: auto;">
                        <label for="no_agenda">Nomor Agenda: </label>
                        <div class="form-group">
                            <input id="no_agenda" type="text" placeholder="Nomor Agenda" class="form-control">
                        </div>
                        <label for="kode_surat">Kode Surat: </label>
                        <div class="form-group">
                            <input id="kode_surat" type="text" placeholder="Kode Surat" class="form-control">
                        </div>
                        <label for="nomor_surat">Nomor Surat: </label>
                        <div class="form-group">
                            <input id="nomor_surat" type="text" placeholder="Nomor Surat" class="form-control">
                        </div>
                        <label for="tgl_masuk">Tanggal Surat Masuk: </label>
                        <div class="form-group">
                            <input id="tgl_masuk" type="date" class="form-control mb-3 flatpickr-no-config"
                                placeholder="Tanggal Surat Masuk">
                        </div>
                        <label for="tgl_terima">Tanggal Terima: </label>
                        <div class="form-group">
                            <input id="tgl_terima" type="date" class="form-control mb-3 flatpickr-no-config"
                                placeholder="Tanggal Surat diterima">
                        </div>
                        <label for="asal_surat">Asal Surat: </label>
                        <div class="form-group">
                            <input id="asal_surat" type="text" placeholder="Asal Surat" class="form-control">
                        </div>
                        <label for="prihal">Prihal: </label>
                        <div class="form-group">
                            <textarea id="prihal" placeholder="Prihal" class="form-control" rows="4"></textarea>
                        </div>
                        <label for="file_surat">File Surat: </label>
                        <div class="form-group">
                            <input id="file_surat" type="file" placeholder="File Surat" class="form-control"
                                accept=".pdf">
                        </div>
                        <label for="file_surat_display">Nama File:</label>
                        <div class="form-group">
                            <input id="file_surat_display" type="hidden" placeholder="Nama File Surat"
                                class="form-control">
                        </div>
                        <label for="penerima">Penerima: </label>
                        <div class="form-group">
                            <input id="penerima" type="text" placeholder="Penerima" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Setup CSRF Token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('#csrf').val()
                }
            });

            // Handle file input change: show/hide fields
            $('#file_surat').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const fileName = file.name;
                    $('#file_surat_display').val(fileName).attr('type', 'hidden');
                    $('label[for="file_surat_display"]').hide();
                } else {
                    $('#file_surat_display').val('').attr('type', 'hidden');
                    $('label[for="file_surat_display"]').hide();
                }
            });

            // Initialize: Hide file name label and field
            $('label[for="file_surat_display"]').hide();
            $('#file_surat_display').attr('type', 'hidden');

            // Handle Add/Edit operation submission
            $('#exampleModalScrollable .btn-primary').on('click', function(e) {
                e.preventDefault();

                // Validation
                let isValid = true;
                $('#exampleModalScrollable input, #exampleModalScrollable textarea').each(function() {
                    if ($(this).val() === '' && $(this).attr('id') !== 'file_surat') {
                        $(this).addClass('is-invalid');
                        isValid = false;
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (!isValid) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Harap lengkapi semua data yang diperlukan!',
                    });
                    return;
                }

                // Prepare form data
                let formData = new FormData();
                formData.append('no_agenda', $('#no_agenda').val());
                formData.append('kode_surat', $('#kode_surat').val());
                formData.append('nomor_surat', $('#nomor_surat').val());
                formData.append('tgl_masuk', $('#tgl_masuk').val());
                formData.append('tgl_terima', $('#tgl_terima').val());
                formData.append('asal_surat', $('#asal_surat').val());
                formData.append('prihal', $('#prihal').val());
                formData.append('file_surat', $('#file_surat')[0]?.files[0]);
                formData.append('penerima', $('#penerima').val());

                if ($('#file_surat')[0]?.files[0]) {
                    const newFileName = $('#file_surat')[0]?.files[0].name;
                    formData.append('file_surat_display', newFileName);
                }

                const id = $(this).data('id');
                const url = id ? `/suratmasuk/update/${id}` : '{{ route('suratmasuk.save') }}';

                // AJAX request
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message || 'Data berhasil disimpan!',
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.message || 'Data gagal disimpan!',
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan pada server!',
                        });
                    }
                });
            });

            // Handle Edit button click
            $(document).on('click', '.editButton', function() {
                const id = $(this).data('id');
                $('#exampleModalScrollableTitle').text('Edit Surat Masuk'); // Update title
                $.ajax({
                    url: `/suratmasuk/edit/${id}`,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            // Populate fields
                            $('#no_agenda').val(response.data.no_agenda);
                            $('#kode_surat').val(response.data.kode_surat);
                            $('#nomor_surat').val(response.data.nomor_surat);
                            $('#tgl_masuk').val(response.data.tgl_masuk);
                            $('#tgl_terima').val(response.data.tgl_terima);
                            $('#asal_surat').val(response.data.asal_surat);
                            $('#prihal').val(response.data.prihal);
                            $('#penerima').val(response.data.penerima);

                            if (response.file_name) {
                                $('#file_surat_display').val(response.file_name).attr('type',
                                    'text');
                                $('label[for="file_surat_display"]').show();
                            } else {
                                $('#file_surat_display').val('').attr('type', 'hidden');
                                $('label[for="file_surat_display"]').hide();
                            }

                            $('#exampleModalScrollable .btn-primary').data('id', id);
                            $('#exampleModalScrollable').modal('show');
                        } else {
                            Swal.fire('Error', response.message ||
                                'Gagal memuat data untuk edit!', 'error');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        Swal.fire('Error', 'Terjadi kesalahan pada server!', 'error');
                    }
                });
            });

            // Handle View button click
            $(document).on('click', '.viewButton', function() {
                const id = $(this).data('id');
                $('#exampleModalScrollableTitle').text('View Surat Masuk'); // Update title
                $.ajax({
                    url: `/suratmasuk/edit/${id}`,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            // Populate fields
                            $('#no_agenda').val(response.data.no_agenda).prop('disabled', true);
                            $('#kode_surat').val(response.data.kode_surat).prop('disabled',
                                true);
                            $('#nomor_surat').val(response.data.nomor_surat).prop('disabled',
                                true);
                            $('#tgl_masuk').val(response.data.tgl_masuk).prop('disabled', true);
                            $('#tgl_terima').val(response.data.tgl_terima).prop('disabled',
                                true);
                            $('#asal_surat').val(response.data.asal_surat).prop('disabled',
                                true);
                            $('#prihal').val(response.data.prihal).prop('disabled', true);
                            $('#penerima').val(response.data.penerima).prop('disabled', true);

                            if (response.data.file_surat) {
                                $('#file_surat_display').val(response.data.file_surat).attr(
                                    'type', 'text').prop('disabled', true);
                                $('label[for="file_surat_display"]').show();
                            } else {
                                $('#file_surat_display').val('').attr('type', 'hidden');
                                $('label[for="file_surat_display"]').hide();
                            }

                            $('#file_surat').hide();
                            $('#exampleModalScrollable').modal('show');
                        } else {
                            Swal.fire('Error', response.message ||
                                'Gagal memuat data untuk ditampilkan!', 'error');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        Swal.fire('Error', 'Terjadi kesalahan pada server!', 'error');
                    }
                });
            });

            // Reset modal on close
            $('#exampleModalScrollable').on('hidden.bs.modal', function() {
                $('#exampleModalScrollableTitle').text('Tambah Surat Masuk'); // Reset title
                $('#exampleModalScrollable input, #exampleModalScrollable textarea').prop('disabled', false)
                    .removeClass('is-invalid');
                $('#file_surat').show();
                $('#file_surat_display').attr('type', 'hidden');
                $('label[for="file_surat_display"]').hide();
            });

            // Handle Delete button click
            $(document).on('click', '.deleteButton', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/suratmasuk/delete/${id}`,
                            type: 'DELETE',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Berhasil!', response.message, 'success')
                                        .then(() => location.reload());
                                } else {
                                    Swal.fire('Gagal!', response.message, 'error');
                                }
                            },
                            error: function(xhr) {
                                console.error(xhr.responseText);
                                Swal.fire('Error!', 'Terjadi kesalahan pada server!',
                                    'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
