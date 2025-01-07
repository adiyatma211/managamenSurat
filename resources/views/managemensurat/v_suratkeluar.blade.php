@extends('layouts.base')
@section('konten')
    <div class="page-heading">
        <h3>Dashboard Managemen Surat Keluar</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Surat Keluar</h4>
                            </div>
                            <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm">
                                            <i class="fas fa-plus"></i> Add Surat Keluar
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Export Dalam Format
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('suratkeluar.export.excel') }}">
                                                        <span class="badge bg-success text-white me-2">
                                                            <i class="fas fa-file-excel"></i>
                                                        </span>
                                                        Excel
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="{{ route('suratkeluar.exportPdf') }}">
                                                        <span class="badge bg-danger text-white me-2">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </span>
                                                        PDF
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="table-responsive  mt-3">
                                        <table class="table text-center" id="table1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nomor Agenda</th>
                                                    <th class="text-center">Tanggal Surat</th>
                                                    <th class="text-center">Tujuan Surat</th>
                                                    <th class="text-center">Kode Surat</th>
                                                    <th class="text-center">Nomor Surat</th>
                                                    <th class="text-center">Prihal</th>
                                                    <th class="text-center">Tanggal Surat Keluar</th>
                                                    <th class="text-center">File Surat</th>
                                                    <th class="text-center">Pengirim</th>
                                                    <th class="text-center">Penerima</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($suratKeluar as $key => $item)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $key + 1 }}</td>
                                                        <!-- Nomor urut -->
                                                        <td class="text-center align-middle">{{ $item->no_agenda_keluar }}
                                                        </td> <!-- Nomor Agenda -->
                                                        <td class="text-center align-middle">{{ $item->tanggal_surat }}</td>
                                                        <!-- Tanggal Surat -->
                                                        <td class="text-center align-middle">{{ $item->tujuan_surat }}</td>
                                                        <!-- Tujuan Surat -->
                                                        <td class="text-center align-middle">{{ $item->kode_surat }}</td>
                                                        <!-- Kode Surat -->
                                                        <td class="text-center align-middle">{{ $item->no_surat_keluar }}
                                                        </td> <!-- Nomor Surat -->
                                                        <td class="text-center align-middle">
                                                            {{ $item->prihal_surat_keluar }}</td> <!-- Prihal -->
                                                        <td class="text-center align-middle">{{ $item->tgl_surat_keluar }}
                                                        </td> <!-- Tanggal Surat Keluar -->
                                                        <td class="text-center align-middle">
                                                            @if ($item->file_surat_keluar)
                                                                <a href="{{ asset('suratkeluar/' . $item->file_surat_keluar) }}"
                                                                    target="_blank"
                                                                    class="btn btn-primary btn-sm text-truncate"
                                                                    style="max-width: 250px;">
                                                                    {{ $item->file_surat_keluar }}
                                                                </a>
                                                            @else
                                                                Tidak Ada File
                                                            @endif
                                                        </td>
                                                        <td class="text-center align-middle">{{ $item->pengirim_keluar }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{ $item->penerima_surat_keluar }}</td>
                                                        <td class="text-center align-middle">
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <button class="btn btn-sm btn-primary me-2 btn-edit"
                                                                    data-id="{{ $item->id }}">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </button>
                                                                <button class="btn btn-sm btn-info me-2 btn-view"
                                                                    data-id="{{ $item->id }}">
                                                                    <i class="fas fa-eye"></i> View
                                                                </button>
                                                                @if (auth()->user()->role !== 'user')
                                                                    <button class="btn btn-sm btn-danger btn-delete"
                                                                        data-id="{{ $item->id }}">
                                                                        <i class="fas fa-trash"></i> Delete
                                                                    </button>
                                                                @endif
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
        </section>
    </div>
    {{-- Modal --}}
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Surat Masuk</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form id="formSuratKeluar" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="csrf" value="{{ csrf_token() }}">
                    <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                        <label for="no_agenda_keluar">Nomor Agenda: </label>
                        <div class="form-group">
                            <input id="no_agenda_keluar" type="text" name="no_agenda_keluar"
                                placeholder="Nomor Agenda" class="form-control">
                        </div>
                        <label for="tanggal_surat">Tanggal Surat: </label>
                        <div class="form-group position-relative">
                            <input id="tanggal_surat" type="date" name="tanggal_surat"
                                class="form-control flatpickr-no-config" placeholder="Tanggal Surat ">
                            <i class="fas fa-calendar-alt position-absolute"
                                style="right: 10px; top: 50%; transform: translateY(-50%); color: #6c757d; pointer-events: none;"></i>
                        </div>

                        <label for="tujuan_surat">Tujuan Surat: </label>
                        <div class="form-group">
                            <input id="tujuan_surat" type="text" name="tujuan_surat" placeholder="Tujuan Surat"
                                class="form-control">
                        </div>
                        <label for="kode_surat">Kode Surat: </label>
                        <div class="form-group">
                            <input id="kode_surat" type="text" name="kode_surat" placeholder="Kode Surat"
                                class="form-control">
                        </div>
                        <label for="no_surat_keluar">Nomor Surat: </label>
                        <div class="form-group">
                            <input id="no_surat_keluar" type="text" name="no_surat_keluar" placeholder="Nomor Surat"
                                class="form-control">
                        </div>
                        <label for="prihal_surat_keluar">Prihal: </label>
                        <div class="form-group">
                            <textarea id="prihal_surat_keluar" placeholder="Prihal" name="prihal_surat_keluar" class="form-control"
                                rows="4"></textarea>
                        </div>
                        <label for="tgl_surat_keluar">Tanggal Surat Keluar: </label>
                        <div class="form-group position-relative">
                            <input id="tgl_surat" type="date" name="tgl_surat_keluar"
                                class="form-control  flatpickr-no-config" placeholder="Tanggal Surat Keluar">
                            <i class="fas fa-calendar-alt position-absolute"
                                style="right: 10px; top: 50%; transform: translateY(-50%); color: #6c757d; pointer-events: none;"></i>
                        </div>
                        <div class="form-group">
                            <label for="file_surat_keluar">File Surat:</label>
                            <input id="file_surat" name="file_surat_keluar" type="file" class="form-control"
                                accept=".pdf">
                        </div>
                        <div class="form-group">
                            <label for="file_surat_keluar_display" id="label_file_surat" style="display: none;">Nama
                                File:</label>
                            <input id="file_surat_display" name="file_surat_keluar_display" type="text"
                                class="form-control" readonly style="display: none;">
                        </div>

                        <label for="penerima_surat_keluar">Penerima: </label>
                        <div class="form-group">
                            <input id="penerima_surat_keluar" name="penerima_surat_keluar" type="text"
                                placeholder="Penerima" class="form-control">
                        </div>
                        <label for="pengirim_keluar">Pengirim: </label>
                        <div class="form-group">
                            <input id="pengirim_keluar" name="pengirim_keluar" type="text" placeholder="Penerima"
                                class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" id="btnSimpan" class="btn btn-primary ms-1" data-bs-dismiss="modal">
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
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
            $('#inlineForm .btn-primary').on('click', function(e) {
                e.preventDefault();

                // Validation
                let isValid = true;

                $('#inlineForm input:not(#csrf), #inlineForm textarea').each(function() {
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
                formData.append('no_agenda_keluar', $('#no_agenda_keluar').val());
                formData.append('kode_surat', $('#kode_surat').val());
                formData.append('no_surat_keluar', $('#no_surat_keluar').val());
                formData.append('tgl_surat_keluar', $('#tgl_surat').val());
                formData.append('tanggal_surat', $('#tanggal_surat').val());
                formData.append('tujuan_surat', $('#tujuan_surat').val());
                formData.append('prihal_surat_keluar', $('#prihal_surat_keluar').val());
                formData.append('pengirim_keluar', $('#pengirim_keluar').val());
                formData.append('penerima_surat_keluar', $('#penerima_surat_keluar').val());
                formData.append('file_surat_keluar', $('#file_surat')[0]?.files[0]);

                const id = $(this).data('id');
                const url = id ? `/surat-keluar/update/${id}` : '{{ route('suratkeluar.store') }}';

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
                                $('#inlineForm').modal('hide');
                                resetModal(); // Reset modal state
                                window.location.reload(); // Reload halaman
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
            $(document).on('click', '.btn-edit', function() {
                resetModal(); // Pastikan modal kosong sebelum digunakan
                const id = $(this).data('id');
                $('#inlineForm .modal-title').text('Edit Surat Keluar');
                $.ajax({
                    url: `/surat-keluar/edit/${id}`,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            // Populate fields
                            $('#no_agenda_keluar').val(response.data.no_agenda_keluar);
                            $('#kode_surat').val(response.data.kode_surat);
                            $('#no_surat_keluar').val(response.data.no_surat_keluar);
                            $('#tgl_surat').val(response.data.tgl_surat_keluar);
                            $('#tanggal_surat').val(response.data.tanggal_surat);
                            $('#tujuan_surat').val(response.data.tujuan_surat);
                            $('#prihal_surat_keluar').val(response.data.prihal_surat_keluar);
                            $('#pengirim_keluar').val(response.data.pengirim_keluar);
                            $('#penerima_surat_keluar').val(response.data
                            .penerima_surat_keluar);

                            if (response.data.file_surat_keluar) {
                                $('#file_surat_display').val(response.data.file_surat_keluar)
                                    .attr('type', 'text');
                                $('label[for="file_surat_display"]').show();
                            }

                            $('#inlineForm .btn-primary').data('id', id);
                            $('#inlineForm').modal('show');
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
            $(document).on('click', '.btn-view', function() {
                resetModal(); // Pastikan modal kosong sebelum digunakan
                const id = $(this).data('id');
                $('#inlineForm .modal-title').text('View Surat Keluar');
                $.ajax({
                    url: `/surat-keluar/edit/${id}`,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            // Populate fields
                            $('#no_agenda_keluar').val(response.data.no_agenda_keluar).prop(
                                'disabled', true);
                            $('#kode_surat').val(response.data.kode_surat).prop('disabled',
                                true);
                            $('#no_surat_keluar').val(response.data.no_surat_keluar).prop(
                                'disabled', true);
                            $('#tgl_surat').val(response.data.tgl_surat_keluar).prop('disabled',
                                true);
                            $('#tanggal_surat').val(response.data.tanggal_surat).prop(
                                'disabled', true);
                            $('#tujuan_surat').val(response.data.tujuan_surat).prop('disabled',
                                true);
                            $('#prihal_surat_keluar').val(response.data.prihal_surat_keluar)
                                .prop('disabled', true);
                            $('#pengirim_keluar').val(response.data.pengirim_keluar).prop(
                                'disabled', true);
                            $('#penerima_surat_keluar').val(response.data.penerima_surat_keluar)
                                .prop('disabled', true);

                            if (response.data.file_surat_keluar) {
                                $('#file_surat_display').val(response.data.file_surat_keluar)
                                    .attr('type', 'text').prop('disabled', true);
                                $('label[for="file_surat_display"]').show();
                            }

                            $('#inlineForm').modal('show');
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

            // Reset modal function
            function resetModal() {
                $('#inlineForm .modal-title').text('Tambah Surat Keluar');
                $('#inlineForm input, #inlineForm textarea')
                    .val('')
                    .prop('disabled', false)
                    .removeClass('is-invalid');
                $('#file_surat_display').val('').attr('type', 'hidden');
                $('label[for="file_surat_display"]').hide();
                $('#inlineForm .btn-primary').data('id', null);
            }

            // Reset modal on close
            $('#inlineForm').on('hidden.bs.modal', function() {
                resetModal();
            });
            $(document).on('click', '.btn-delete', function() {
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
                            url: `surat-keluar/delete/${id}`,
                            type: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content') // Kirim token CSRF
                            },
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
                                Swal.fire('Error!', 'Terjadi kesalahan pada server!', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
