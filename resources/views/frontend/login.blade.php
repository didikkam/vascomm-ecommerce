@extends('layouts.auth')

@section('title', 'Login')

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
                                <h5 style="color:#3E3E3E; font-size: 24px;">Selamat Datang Admin</h5>
                                <p style="color: #9B9B9B;">Silahkan masukkan email atau nomor telepon dan password
                                    Anda untuk mulai menggunakan aplikasi</p>
                                <form class="mt-3" id="form-data">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email / Nomor Telpon</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Contoh: admin@gmail.com">
                                        <div class="text-danger text-invalid" id="email_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Masukkan passward">
                                        <div class="text-danger text-invalid" id="password_error"></div>
                                    </div>
                                    <div class="d-grid mt-5">
                                        <button href="{{ route('admin.index') }}" id="submit" type="submit"
                                            class="btn btn-primary">MASUK</button>
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
                var link = "{{ route('doLogin') }}";
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
                            console.log({errors});
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
