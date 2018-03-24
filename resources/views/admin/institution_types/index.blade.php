@extends('admin.main')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@section('content')	

 <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Institution types</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row form-group">
            <div class="col-md-12">
              <a href="/institution-types/create" class="btn btn-primary">
                <span><i class="fa fa-plus"></i></span>
                Add new
              </a>
            </div>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Institution type</th>
              <th>Badge</th>
            </tr>
            </thead>
            <tbody>
            @foreach($institutionTypes as $institutionType)
	            <tr>
	            	<td>{{ $institutionType->name }}</td>
	            	<td>{{ $institutionType->badge }}</td>
	            </tr>
           	@endforeach
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
    </div>
          
    <!-- /.box-footer-->
</div>
<!-- /.box -->

@endsection

@push('scripts')

<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script>


$(function () {
	$('#example1').DataTable()
})

</script>
@endpush