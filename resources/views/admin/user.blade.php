@extends('layouts.admin')

@section('title', 'Manajemen User')

@push('after-styles')
    <style>
        .badge {
            border-radius: 30px;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <h4>Manajemen User</h4>
            </div>
            <div class="col-md-6 text-end">
                <button id="btnCreate" type="button" class="btn btn-primary">TAMBAH USER</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tb_data" class="table table-striped">
                                <thead class="">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No. Telepon</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center w-100" id="dataModalLabel">Tambah USER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-5">
                    <form class="mt-3" id="form-data">
                        <input type="hidden" id="id" name="id" value="">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Masukkan Nama">
                            <div class="text-danger text-invalid" id="name_error"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Masukkan Email">
                            <div class="text-danger text-invalid" id="email_error"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                placeholder="Masukkan Telepon">
                            <div class="text-danger text-invalid" id="phone_error"></div>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <div class="d-grid my-3">
                            <button type="submit" id="simpan" class="btn btn-primary mt-3">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <link rel="stylesheet" href="{{ asset('assets/plugins/dataTables/bootstrap4.min.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/plugins/dataTables/dataTables.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/plugins/dataTables/bootstrap4.min.js') }}"></script>
    <script>
        var tabel = null;
        var aktif = `<span class="badge bg-success px-3 py-2">AKTIF</span>`;
        var nonAktif = `<span class="badge bg-danger px-3 py-2">TIDAK AKTIF</span>`;
        var columns = [{
                data: 'id',
                orderable: false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                className: "text-center",
            },
            {
                data: "name"
            },
            {
                data: "email"
            },
            {
                data: "phone"
            },
            {
                data: "status",
                render: function(data, type, row, meta) {
                    if (data) {
                        return aktif;
                    } else {
                        return nonAktif;
                    }
                },
                className: "text-center",
            },
            {
                data: "id",
                render: function(data, type, row, meta) {
                    return ` <span title="Lihat" data-id="` + row.id + `" class="btnShow badge bg-success p-0 pointer"><img
                                src="{{ asset('assets/images/ic_eye.png') }}" alt="Logo"
                                height="30"></span>
                        <span title="Edit" data-id="` + row.id + `" class="btnEdit badge bg-warning p-0 pointer"><img
                                src="{{ asset('assets/images/ic_edit.png') }}" alt="Logo"
                                height="30"></span>`;
                },
            },
        ];
        $(document).on('click', '.btnEdit', function() {
            var id = $(this).data('id');
            $("#dataModalLabel").html('Edit User');
            $("#dataModal").modal('show');
            var link = "{{ route('admin.users.index') }}/" + id;
            $.ajax({
                url: link,
                type: "GET",
                dataType: 'json',
                contentType: false,
                processData: false,
                error: function(response) {
                    var errors = $.parseJSON(data.responseText);
                    toastr.error(errors.message);
                },
                success: function(response) {
                    var data = response.data;
                    $('#id').val(data?.id);
                    $('#name').val(data?.name);
                    $('#email').val(data?.email);
                    $('#phone').val(data?.phone);
                },
            });
        });
        $(document).on('click', '.btnShow', function() {
            $("#dataModal").modal('show');
        });
        $(document).ready(function() {
            tabel = $('#tb_data').DataTable({
                order: [
                    [0, 'desc']
                ],
                "processing": true,
                "responsive": true,
                "serverSide": true,
                "autoWidth": false,
                "ordering": true, // Set true agar bisa di sorting
                "ajax": {
                    "url": "{{ route('admin.users.datatable') }}",
                    "type": "GET",
                },
                "columns": columns,
            });
            $("#btnCreate").click(function() {
                $('#id').val("");
                $('#name').val("");
                $('#email').val("");
                $('#phone').val("");
                $("#dataModalLabel").html('Tambah User');
                $("#dataModal").modal('show');
            });

            $("#form-data").submit(function(e) {
                e.preventDefault();
                var form_data = new FormData($('#form-data')[0]);
                var link = "{{ route('admin.users.store') }}";
                $.ajax({
                    url: link,
                    type: "POST",
                    data: form_data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#simpan').attr('disabled', true);
                        $('.text-invalid').html('');
                        $('.form-control').removeClass("is-invalid").removeClass("is-valid");
                    },
                    error: function(response) {
                        if (response.status == 422) {
                            var data = $.parseJSON(response.responseText);
                            var errors = data?.data?.errors;
                            $.each(errors, function(key, value) {
                                var i = key;
                                var item = value[0];
                                $('#' + i + '_error').html(item);
                                $('#' + i + '_error').show();
                                if (item) {
                                    $('#' + i).removeClass("is-valid").addClass(
                                        "is-invalid");
                                } else {
                                    $('#' + i).removeClass("is-invalid").addClass(
                                        "is-valid");
                                }
                            });
                            toastr.error(data.message);
                        } else {
                            var errors = $.parseJSON(data.responseText);
                            toastr.error(errors.message);
                        }
                    },
                    success: function(data) {
                        toastr.info(data.message);
                        $("#dataModal").modal('hide');
                        tabel.ajax.reload();
                    },
                    complete: function() {
                        $('#simpan').attr('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush
