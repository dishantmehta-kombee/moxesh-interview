@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <div class="alert alert-success d-none" id="success-message" role="alert">
                                <!-- Success message will be displayed here -->
                            </div>
                            <div class="alert alert-danger d-none" id="error-message" role="alert">
                                <!-- Error message will be displayed here -->
                            </div>
                            <form {{-- action="{{ route('register.post') }}" --}} method="POST" id="register-user"
                                  name="register-user"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First
                                        Name<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="first_name" class="form-control" name="first_name"
                                               required autofocus autocomplete="off">
                                        <span id="first_name_error" class="text-danger"></span>
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="last_name" class="form-control" name="last_name" required
                                               autofocus autocomplete="off">
                                        <span id="last_name_error" class="text-danger"></span>
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
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
                                    <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm
                                        Password<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="password" id="confirm_password" class="form-control"
                                                   name="confirm_password" required autocomplete="off">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary toggle-password"
                                                        id="toggle-confirm-password">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <span id="confirm_password_error" class="text-danger"></span>
                                        @if ($errors->has('confirm_password'))
                                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="tel" id="mobile" class="form-control" name="mobile" required
                                               autocomplete="off" maxlength="10">
                                        <span id="mobile_error" class="text-danger"></span>
                                        @if ($errors->has('mobile'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="postal_code" class="col-md-4 col-form-label text-md-right">Postal
                                        Code<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="postal_code" class="form-control" name="postal_code"
                                               maxlength="6" required autocomplete="off">
                                        <span id="postal_code_error" class="text-danger"></span>
                                        @if ($errors->has('postal_code'))
                                            <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="state" class="col-md-4 col-form-label text-md-right">State<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <select onchange="getCities(this.value)" id="state_id" class="form-control"
                                                name="state_id" required>
                                            <option value="">Select State</option>
                                            @if (isset($states))
                                                @foreach ($states as $i => $state)
                                                    <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span id="state_id_error" class="text-danger"></span>
                                        @if ($errors->has('state_id'))
                                            <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">City<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <select id="city_id" class="form-control" name="city_id" required>
                                            <option value="">Select City</option>
                                        </select>
                                        <span id="city_id_error" class="text-danger"></span>
                                        @if ($errors->has('city_id'))
                                            <span
                                                class="text-danger">{{ $errors->first('https://api-ajobman.63-141-249-130.plesk.page/api/candidate/getData/skill') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Gender<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                   value="1">
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                   value="2">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="other"
                                                   value="3">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                        <span id="gender_error" class="text-danger"></span>
                                        @if ($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="profile_picture" class="col-md-4 col-form-label text-md-right">Profile
                                        Picture<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="file" id="profile_picture" class="form-control-file"
                                               name="profile_picture" multiple
                                               accept="image/jpeg, image/jpg, image/png">
                                        <span id="profile_picture_error" class="text-danger"></span>
                                        @if ($errors->has('profile_picture'))
                                            <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hobbies" class="col-md-4 col-form-label text-md-right">Hobbies<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        @if (isset($hobbies))
                                            @foreach ($hobbies as $i => $hobby)
                                                <div class="form-check">
                                                    <input class="form-check-input hobby_ids" type="checkbox"
                                                           name="hobby_ids"
                                                           value="{{ $hobby['id'] }}" id="hobby-{{ $i }}">
                                                    <label class="form-check-label"
                                                           for="hobby-{{ $i }}">{{ $hobby['name'] }}</label>
                                                </div>
                                            @endforeach
                                        @endif
                                        <!-- Add more hobbies checkboxes as needed -->
                                        <span id="hobby_ids_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role_ids" class="col-md-4 col-form-label text-md-right">Roles<span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <select class="form-control role_ids" name="role_ids" multiple="multiple"
                                                id="role_ids"
                                                multiple>
                                            @if (isset($roles))
                                                @foreach ($roles as $i => $role)
                                                    <option value="{{ $role['name'] }}">{{ $role['name'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span id="role_ids_error" class="text-danger"></span>
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
                                        Register
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
        $(document).ready(function () {
            $('.role_ids').select2();
        });
        $("#register-user").validate({
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                    customAlphanumeric: true
                },
                email: {
                    required: true,
                    email: true,
                    customEmail: true,
                },
                password: {
                    required: true,
                    customPassword: true
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
                mobile: {
                    required: true,
                },
                postal_code: {
                    required: true,
                    maxlength: 6
                },
                state_id: {
                    required: true,
                },
                city_id: {
                    required: true,
                },
                gender: {
                    required: true,
                },
                profile_picture: {
                    required: true,
                    // accept: "image/jpeg,image/jpg,image/png"
                },
                hobby_ids: {
                    required: true
                },
                role_ids: {
                    required: true
                },
            },
            messages: {
                first_name: "Please enter your first name",
                last_name: {
                    required: "Please enter your last name",
                    customAlphanumeric: "Last name must contain at least one alphabetic and one numeric character"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address",
                    customEmail: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter a password"
                },
                confirm_password: {
                    required: "Please confirm your password",
                    equalTo: "Password and Confirm Password does not match"
                },
                mobile: {
                    required: "Please enter your mobile number",
                },
                postal_code: {
                    required: "Please enter your postal code",
                    maxlength: "Postal code must not exceed 6 characters"
                },
                state_id: {
                    required: "Please select your state",
                },
                city_id: {
                    required: "Please select your city",
                },
                gender: {
                    required: "Please select your gender",
                },
                profile_picture: {
                    required: "Please select a profile picture",
                    accept: "Please upload an image with a valid file extension (jpg, jpeg, png)"
                },
                hobby_ids: {
                    required: "Please select at least one hobby"
                },
                role_ids: {
                    required: "Please select at least one role"
                }
            },
            errorPlacement: function (error, element) {
                $("#" + element.attr("name") + "_error").html(error);
            },
            submitHandler: function (form) {
                console.log(form);
                callSignUpAjaxRequest();
            }
        });

        function getCities(stateId) {
            $.ajax({
                url: "{{ route('get-cities') }}",
                type: "POST",
                data: {
                    state_id: stateId,
                    '_token': '{{ csrf_token() }}'
                },
                success: function (data) {
                    $('#city_id').html('<option value="">Select City</option>');
                    $.each(data.data, function (key, value) {
                        $("#city_id").append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                }
            });
        }

        function callSignUpAjaxRequest() {
            let hobbyCheckboxes = document.querySelectorAll('.hobby_ids:checked');
            let hobbyCheckboxValues = [];
            hobbyCheckboxes.forEach(function (checkbox) {
                hobbyCheckboxValues.push(checkbox.value);
            });

            let formData = new FormData();
            formData.append('first_name', $("#first_name").val());
            formData.append('last_name', $("#last_name").val());
            formData.append('email', $("#email").val());
            formData.append('password', $("#password").val());
            formData.append('confirm_password', $("#confirm_password").val());
            formData.append('mobile', $("#mobile").val());
            formData.append('postal_code', $("#postal_code").val());
            formData.append('state_id', $("#state_id").val());
            formData.append('city_id', $("#city_id").val());
            formData.append('gender', $('input[name="gender"]:checked').val());
            formData.append('hobby_ids', hobbyCheckboxValues);
            formData.append('role_ids', $("#role_ids").val());
            formData.append('remember', $("#remember").val());

            // Append each selected profile_picture file separately
            let profilePictureFiles = $("#profile_picture")[0].files;
            for (let i = 0; i < profilePictureFiles.length; i++) {
                formData.append('profile_picture[]', profilePictureFiles[i]);
            }

            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route('register.post') }}",
                type: "POST",
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting contentType
                data: formData,
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
                },
                error: function (err) {
                    // Display error message
                    $('#error-message').removeClass('d-none').html(err);
                    // Hide success message if displayed
                    $('#success-message').addClass('d-none');
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

        $.validator.addMethod("customAlphanumeric", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9\s]*$/.test(value);
        }, "Last name must contain alphabetic and/or numeric characters only");

        $('#first_name').on('input', function () {
            var sanitized = $(this).val().replace(/[^A-Za-z\s]/g, '');
            $(this).val(sanitized);
        });

        $('#last_name').on('input', function () {
            var sanitized = $(this).val().replace(/[^A-Za-z0-9\s]/g, '');
            $(this).val(sanitized);
        });

        $('#mobile').on('input', function () {
            // Only allow numbers in the input
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });

        $('#postal_code').on('input', function () {
            // Only allow numbers in the input
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });

        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('#toggle-password');
            const toggleConfirmPassword = document.querySelector('#toggle-confirm-password');
            const password = document.querySelector('#password');
            const confirm_password = document.querySelector('#confirm_password');
            togglePassword.addEventListener('click', function () {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // this.classList.toggle('active');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
            toggleConfirmPassword.addEventListener('click', function () {
                const type = confirm_password.getAttribute('type') === 'password' ? 'text' : 'password';
                confirm_password.setAttribute('type', type);
                // this.classList.toggle('active');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endpush
