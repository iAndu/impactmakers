@extends('admin.main')

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


      <div class="form-group col-md-12">
        <label>Institution type</label>
        <input id="institution_type" class="form-control" name="institution_type" type="text"
        value="{{old('institution_type', '')}}">
      </div>

      <div class="col-md-12 row">
        <div class="form-group col-md-6">
            <label>Select a marker from list</label>
            <select id="icon_id" class="form-control" name="icon_id" 
            data-default-option="{{ old('icon_id', '')}}">
                <option value="">-</option>
                @foreach ('App\Icon'::all() as $icon)
                    <option value="{{ $icon->id }}"><span><img src="" alt="image here"></span>{{ $icon->name}}
                    </option>
                @endforeach
            </select>
        </div>
      </div>

      <div class="col-md-12 row">
        <div class="form-group col-md-6">
          <label>Or upload your own marker image</label>
          <p>TODO: upload field here</p>
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