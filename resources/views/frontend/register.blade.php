@extends('layouts.auth')

@section('title', 'Register')

@push('after-styles')
@endpush

@section('content')
    <section class="container-fluid h-100 ps-0" style="height: 100%;">
        <div class="row h-100">
            <div class="col-md-6 kiri" style="background: #41A0E4;">
                <img src="{{ asset('assets/images/login-right.png') }}" class="d-block w-100" alt="Slider">
            </div>
            <div class="col-md-6 h-100" style="background: #ffffff;">
                <div class="row">
                    <div class="col-md-8 offset-md-2 mt-5 pt-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="color:#3E3E3E; font-size: 24px;">Selamat Datang</h5>
                                <p style="color: #9B9B9B;">Silahkan mendaftar untuk mulai menggunakan aplikasi</p>
                                <form class="mt-3" id="form-data">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Contoh: John Doe">
                                        <div class="text-danger text-invalid" id="name_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" id="email" name="email" class="form-control"
                                            placeholder="Contoh: admin@gmail.com">
                                        <div class="text-danger text-invalid" id="email_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Telpon</label>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            placeholder="Contoh: 081234567890">
                                        <div class="text-danger text-invalid" id="phone_error"></div>
                                    </div>
                                    <div class="d-grid mt-5">
                                        <button type="submit" id="submit" class="btn btn-primary">DAFTAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $("#form-data").submit(function(e) {
                e.preventDefault();
                var form_data = new FormData($('#form-data')[0]);
                var link = "{{ route('doRegister') }}";
                $.ajax({
                    url: link,
                    type: "POST",
                    data: form_data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#submit').attr('disabled', true);
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
                            var errors = $.parseJSON(response.responseText);
                            toastr.error(errors.message);
                        }
                    },
                    success: function(data) {
                        toastr.info(data.message);
                        setTimeout(function() {
                            window.location.href =
                                "{{ route('admin.index') }}";
                        }, 1000);
                    },
                    complete: function() {
                        $('#submit').attr('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush
