@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="alert alert-success d-none" id="success-message" role="alert">
                    <!-- Success message will be displayed here -->
                </div>
                <div class="alert alert-danger d-none" id="error-message" role="alert">
                    <!-- Error message will be displayed here -->
                </div>
                <div class="card">
                    <div class="card-header" style="display: flex;justify-content: space-between">Edit Permission
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back to Permission List</a>
                    </div>

                    <div class="card-body">
                        <form id="edit-permission-form" method="POST"
                              action="{{ route('permissions.update', ['id' => $permission_data->id]) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') ?? $permission_data->name }}" required autofocus>
                                    <span id="name_error" class="text-danger"></span>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="submit-btn">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#edit-permission-form').validate({
                rules: {
                    name: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a permission name"
                    },
                },
                errorPlacement: function (error, element) {
                    // error.insertAfter($("#" + element.attr("name") + "_error"));
                    $("#" + element.attr("name") + "_error").html(error);
                },
                submitHandler: function (form) {
                    let formData = $(form).serialize();
                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            // Display success message
                            $('#success-message').removeClass('d-none').html(response.message);
                            // Clear form fields
                            $(form)[0].reset();
                            // Hide error message if displayed
                            $('#error-message').addClass('d-none');
                            location.href = '{{route('permissions.index')}}';
                        },
                        error: function (xhr) {
                            console.log(xhr);
                            // Display error message
                            $('#error-message').removeClass('d-none').html(xhr.responseJSON.errors);
                            // Hide success message if displayed
                            $('#success-message').addClass('d-none');
                        }
                    });
                }
            });
        });
    </script>
@endpush
