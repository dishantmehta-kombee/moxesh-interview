@extends('layout')

@section('content')
    <div class="container">
        {{--@can('user-create')
            <a href="{{route('users.create')}}" class="edit btn btn-primary btn-sm mt-3 mb-2"
               style="float: right">ADD</a>
        @endcan--}}
        <h2>Users</h2>
        <table class="table table-bordered" id="users-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('users.index')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        function deleteRecordData(model_url) {
            $.ajax({
                url: model_url,
                type: "GET",
                dataType: 'json',
                success: function (result) {
                    if (result) {
                        $('#success-message').removeClass('d-none').html(result.message);
                        location.reload();
                    } else {
                        console.log('something went wrong.');
                    }
                },
                error: function (err) {
                    console.log(err)
                }
            });
        }
    </script>
@endpush
