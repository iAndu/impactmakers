@extends('admin.main')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="box">
        <div class="box-body">
            <table id="institutions" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>-
                <th>Address</th>
                <th>Description</th>
                <th>Institution Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($institutions as $institution)
                <tr data-id="{{ $institution->id }}">
                    <td>{{ $institution->name }}</td>
                    <td>{{ $institution->address }}</td>
                    <td>{{ $institution->description }}</td>
                    <td>{{ $institution->type->name }}</td>
                    <td>
                        <input class="update-status" type="checkbox" {{ $institution->status ? 'checked' : '' }}/>
                        <span>{{ $institution->status ? 'Approved' : 'Pending' }}</span>
                    </td>
                    <td class="text-center">
                        <a class="delete" href="{{ route('institutions.delete', $institution->id) }}">
                            <i class="fa fa-trash" style="color: #000; font-size: 18px;"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Description</th>
                <th>Institution Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- DataTables -->
    <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#institutions').DataTable();

            $('#institutions').on('change', 'input.update-status', function () {
                let $this = $(this);
                let id = $this.closest('tr').data('id');
                let route = "{!! route('institutions.update', 'id') !!}";

                $.ajax({
                    url: route.replace('id', id),
                    method: 'put',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id
                    },
                    success: function (resp) {
                        let text = $this.is(':checked') ? 'Approved' : 'Pending';
                        $this.siblings('span').first().html(text);
                    },
                    error: function (err) {
                        $this.attr('checked', !$this.is(':checked'));
                        alert('Something went wrong. Update failed.');
                    }
                });
            });

            $('#institutions').on('click', 'a.delete', function (e) {
                e.preventDefault();
                let $this = $(this);

                let result = confirm("Do you want to delete this institution?");

                if (result) {
                    $.ajax({
                        url: $this.attr('href'),
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (resp) {
                            $this.closest('tr').remove();
                        },
                        error: function (err) {
                            alert('Something went wrong. Deletion failed.');
                        }
                    });
                }
            });
        })
    </script>
@endpush