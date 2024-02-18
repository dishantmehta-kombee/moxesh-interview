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
                    <div class="card-header" style="display: flex;justify-content: space-between">Add New Permission
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back to Permission List</a>
                    </div>

                    <div class="card-body">
                        <form id="create-permission-form" method="POST" action="{{ route('permissions.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary" id="submit-btn">
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
        $(document).ready(function() {
            $('#submit-btn').on('click', function() {
                let formData = $('#create-permission-form').serialize();
                $.ajax({
                    url: $('#create-permission-form').attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Display success message
                        $('#success-message').removeClass('d-none').html(response.message);
                        // Clear form fields
                        $('#create-permission-form')[0].reset();
                        // Hide error message if displayed
                        $('#error-message').addClass('d-none');
                        location.href = '{{route('permissions.index')}}';
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        // Display error message
                        $('#error-message').removeClass('d-none').html(xhr.responseJSON.errors);
                        // Hide success message if displayed
                        $('#success-message').addClass('d-none');
                    }
                });
            });
        });
    </script>
@endpush
