@extends('admin.main')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<style type="text/css">

  .select2-container .select2-selection--single {
    height: 54px;
  }
  .max-50px{
    max-width: 50px;
    max-height: 50px;
  }
</style>
@endpush

@section('content')	

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Create institution type</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    
    <form method="post" action="/institution-types/store" enctype="multipart/form-data">
      @csrf

      <div class="form-group col-md-6">
        <label>Institution type name</label>
        <input id="institution_type" class="form-control" name="institution_type" type="text"
        value="{{old('institution_type', '')}}">
      </div>

      <div class="col-md-12 row">
        <div class="form-group col-md-6">
            <label>Select a marker from list</label>
            <select id="icon_id" class="form-control" name="icon_id" 
            data-default-option="{{ old('icon_id', '')}}">
                <option value="">-</option>
                @foreach ($icons as $icon)
                    <option value="{{ $icon->id }}"
                   data-image="{{ $icon->path }}">  
                    {{ $icon->name }}
                    </option>
                @endforeach
            </select>
        </div>
      </div>

      <input type="hidden" name="has_upload" id="has_upload" value="false">

      <div class="col-md-12">
        <p>
        <button  id="upload-toggle" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#upload" aria-expanded="false" aria-controls="collapseExample">Or upload your own...</button></p>

      </div>

      <div id="upload" class="collapse">
        <div class="form-group col-md-6">
          <label for="icon">Upload</label>
          <input
          type="file"
          id="icon"
          name="icon"
          value="{{ old('icon', "") }}" class="form-control">
        </div>
        <div class="form-group col-md-6">
          <label>Marker name</label>
          <input id="marker_name" class="form-control" name="marker_name" type="text"
          value="{{old('marker_name', '')}}">
        </div>
      </div>

      <div id="saveActions" class="form-group col-md-12">
        <button type="submit" class="btn btn-success" >
          <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
          <span data-value="save_and_back">Save</span>
        </button>

        <a href="{{ url()->previous() }}" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;Cancel</a>
      </div>
    </form>

<!-- /.box-body -->
</div>

<!-- /.box-footer-->
</div>
<!-- /.box -->
@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 <script>
    $(function () {

      $("#upload-toggle").on("click", function(){
        var value =  $("#has_upload").val();

        if(value == "true") {
          $("#has_upload").val("false");  
          $("#icon_id").prop('disabled', false);
          $("#upload-toggle").removeClass("btn-danger");
        } else {
          $("#has_upload").val("true");  
          $("#upload-toggle").addClass("btn-danger");
          $("#icon_id").prop('disabled', 'disabled');
        }
        
      });
    });


    $("#icon_id").select2({
        templateResult: addUserPic,
        templateSelection: addUserPic
    });
      
    function addUserPic (opt) {
      if (!opt.id) {
        return opt.text;
      }               
      var optimage = $(opt.element).data('image'); 
      if(!optimage){
        return opt.text;
      } else {
        var $opt = $(
        '<span class="userName"><img src="' + optimage + '" class="userPic max-50px" /> ' + $(opt.element).text() + '</span>'
        );
        return $opt;
      }
    };


    </script>
@endpush