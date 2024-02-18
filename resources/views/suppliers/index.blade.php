@extends('layout')

@section('content')
    <div class="container">
        @can('supplier-create')
            <a  href="{{route('suppliers.create')}}" class="edit btn btn-primary btn-sm mt-3 mb-2" style="float: right">ADD</a>
        @endcan
        <h2>Suppliers</h2>
        <table class="table table-bordered" id="suppliers-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
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
        $(function() {
            $('#suppliers-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('suppliers.index')}}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
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
