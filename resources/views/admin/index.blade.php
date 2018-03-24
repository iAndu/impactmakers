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
                    method: 'post',
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
                })
            });
        })
    </script>
@endpush