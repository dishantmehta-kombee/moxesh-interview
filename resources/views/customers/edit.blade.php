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
                    <div class="card-header" style="display: flex;justify-content: space-between">Edit Customer
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customer List</a>
                    </div>

                    <div class="card-body">
                        <form id="create-customer-form" method="POST"
                              action="{{ route('customers.update', ['id' => $customer->id]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ $customer->name }}" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_active"
                                               value="1" {{ old('status') == '1' ? 'checked' : '' }} {{$customer->status == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_inactive"
                                               value="0" {{ old('status') == '0' ? 'checked' : '' }} {{$customer->status == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_inactive">
                                            Inactive
                                        </label>
                                    </div>

                                    @error('status')
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
        $(document).ready(function () {
            $('#submit-btn').on('click', function () {
                console.log('fd')
                var formData = $('#create-customer-form').serialize();
                $.ajax({
                    url: $('#create-customer-form').attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Display success message
                        $('#success-message').removeClass('d-none').html(response.message);
                        // Clear form fields
                        $('#create-customer-form')[0].reset();
                        // Hide error message if displayed
                        $('#error-message').addClass('d-none');
                        location.href = '{{route('customers.index')}}';
                    },
                    error: function (xhr) {
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
