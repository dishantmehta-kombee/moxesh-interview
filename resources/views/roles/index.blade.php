@extends('layout')

@section('content')
    <div class="container">
        @can('role-create')
            <a href="{{route('roles.create')}}" class="edit btn btn-primary btn-sm mt-3 mb-2" style="float: right">ADD</a>
        @endcan
        <h2>Roles</h2>
        <table class="table table-bordered" id="roles-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
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
            $('#roles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                dom: 'Bfrtip', // Add the buttons extension
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', // Specify the export formats
                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
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
