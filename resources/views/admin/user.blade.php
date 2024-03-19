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
                            <table class="table table-striped">
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
                                    @for ($i = 0; $i <= 5; $i++)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>Aden S. Putra</td>
                                            <td>Aden@gmail.com</td>
                                            <td>081287823283</td>
                                            <td class="text-center">
                                                @if ($i % 2)
                                                    <span class="badge bg-success px-3 py-2">AKTIF</span>
                                                @else
                                                    <span class="badge bg-danger px-3 py-2">TIDAK AKTIF</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span title="Lihat" class="btnShow badge bg-success p-0 pointer"><img
                                                        src="{{ asset('assets/images/ic_eye.png') }}" alt="Logo"
                                                        height="30"></span>
                                                <span title="Edit" class="btnEdit badge bg-warning p-0 pointer"><img
                                                        src="{{ asset('assets/images/ic_edit.png') }}" alt="Logo"
                                                        height="30"></span>
                                            </td>
                                        </tr>
                                    @endfor
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
                    <h5 class="modal-title text-center w-100" id="dataModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-5">
                    <form class="mt-3">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" placeholder="Masukkan Email">
                        </div>
                        <div class="d-grid my-3">
                            <a href="{{ route('admin.index') }}" class="btn btn-primary mt-3">SIMPAN</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $("#btnCreate").click(function() {
                $("#dataModal").modal('show');
            });
            $(".btnShow").click(function() {
                $("#dataModal").modal('show');
            });
            $(".btnEdit").click(function() {
                $("#dataModal").modal('show');
            });
        });
    </script>
@endpush
