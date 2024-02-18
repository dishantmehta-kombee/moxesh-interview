@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <div class="alert alert-success d-none" id="success-message" role="alert">
                                <!-- Success message will be displayed here -->
                            </div>
                            <div class="alert alert-danger d-none" id="error-message" role="alert">
                                <!-- Error message will be displayed here -->
                            </div>
                            <form {{--action="{{ route('login.post') }}"--}} method="POST" id="login-user"
                                  name="login-user">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control" name="email" required
                                               autofocus autocomplete="off">
                                        <span id="email_error" class="text-danger"></span>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="password" id="password" class="form-control" name="password"
                                                   required autocomplete="off">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary toggle-password"
                                                        id="toggle-password">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <span id="password_error" class="text-danger"></span>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="remember" id="remember" name="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')

    <script>
        $("#login-user").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    customEmail: true,
                },
                password: {
                    required: true,
                    customPassword: true
                },
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address",
                    customEmail: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter a password"
                },
            },
            errorPlacement: function (error, element) {
                // error.insertAfter($("#" + element.attr("name") + "_error"));
                $("#" + element.attr("name") + "_error").html(error);
            },
            submitHandler: function (form) {
                callLoginAjaxRequest();
            }
        });

        function callLoginAjaxRequest() {

            $.ajax({
                url: "{{ route('login.post') }}",
                type: "POST",
                data: {
                    email: $("#email").val(),
                    password: $("#password").val(),
                    remember: $("#remember").val(),
                    '_token': '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.code == 200) {
                        localStorage.setItem('access_token', data.result.token);
                        location.href = '{{route('dashboard')}}';
                    } else {
                        // Display error message
                        $('#error-message').removeClass('d-none').html(data.message);
                        // Hide success message if displayed
                        $('#success-message').addClass('d-none');
                    }
                }
            });
        }

        $.validator.addMethod("customEmail", function (value, element) {
            // Regular expression for email with specific TLDs
            var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return this.optional(element) || regex.test(value);
        }, "Please enter a valid email address");


        jQuery.validator.addMethod("customPassword", function (value, element) {
            return this.optional(element) || /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/.test(value);
        }, "Enter password with minimum 8 characters. at least one uppercase letter, one lowercase letter, one number and one special character (!@#$%^&*)");

        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('#toggle-password');
            const password = document.querySelector('#password');
            togglePassword.addEventListener('click', function () {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // this.classList.toggle('active');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endpush
