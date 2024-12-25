@extends('layouts.base')
@section('konten')
<div class="page-heading">
    <h3>Dashboard Managemen User</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#inlineForm">
                            <i class="fas fa-plus"></i> Add User
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td class="text-center align-middle">{{ $key + 1 }}</td>
                                    <td class="text-center align-middle">{{ $user->name }}</td>
                                    <td class="text-center align-middle">{{ $user->email }}</td>
                                    <td class="text-center align-middle">{{ $user->role }}</td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="btn btn-sm btn-primary me-2 btn-edit" data-id="{{ $user->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $user->id }}">
                                                <i class="fas fa-trash"></i> Delete
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
    </section>
</div>

{{-- Modal --}}
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah/Edit User</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="formUser" method="POST">
                <input type="hidden" name="_token" id="csrf" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <label for="name">Nama User: </label>
                    <div class="form-group">
                        <input id="name_user" type="text" name="name" placeholder="Nama User" class="form-control">
                    </div>
                    <label for="email">Email User: </label>
                    <div class="form-group">
                        <input id="email" type="email" name="email" placeholder="Email User" class="form-control">
                    </div>
                    <label for="role">Role User: </label>
                    <div class="form-group">
                        <select id="role" name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="btnSimpan" class="btn btn-primary ms-1">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        // Handle Add/Edit submission
        $('#btnSimpan').on('click', function () {
            const id = $(this).data('id');
            const name = $('#name_user').val();
            const email = $('#email').val();
            const role = $('#role').val();
            const url = id ? `/user/update/${id}` : '{{ route('user.store') }}';

            if (!name || !email || !role) {
                Swal.fire('Peringatan', 'Nama, Email, dan Role harus diisi!', 'warning');
                return;
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    name: name,
                    email: email,
                    role: role,
                    _token: $('#csrf').val(),
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire('Berhasil', response.message, 'success').then(() => {
                            $('#inlineForm').modal('hide');
                            location.reload();
                        });
                    } else {
                        Swal.fire('Gagal', response.message, 'error');
                    }
                },
                error: function (xhr) {
                    Swal.fire('Error', 'Terjadi kesalahan pada server!', 'error');
                },
            });
        });

        // Handle Edit button
        $(document).on('click', '.btn-edit', function () {
            const id = $(this).data('id');

            $.ajax({
                url: `/user/edit/${id}`,
                type: 'GET',
                success: function (response) {
                    if (response.success) {
                        $('#name_user').val(response.data.name);
                        $('#email').val(response.data.email);
                        $('#role').val(response.data.role);
                        $('#btnSimpan').data('id', id);
                        $('#inlineForm').modal('show');
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function (xhr) {
                    Swal.fire('Error', 'Terjadi kesalahan pada server!', 'error');
                },
            });
        });

        // Handle Delete button
        $(document).on('click', '.btn-delete', function () {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/user/delete/${id}`,
                        type: 'POST',
                        data: { _token: $('#csrf').val() },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire('Berhasil!', response.message, 'success').then(() => location.reload());
                            } else {
                                Swal.fire('Gagal!', response.message, 'error');
                            }
                        },
                        error: function (xhr) {
                            Swal.fire('Error!', 'Terjadi kesalahan pada server!', 'error');
                        },
                    });
                }
            });
        });
    });
</script>
@endsection
