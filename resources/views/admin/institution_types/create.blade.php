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
                    <option value="{{ $icon->id }}"><span><img src="" alt="image here"></span>{{ $icon->name }}
                    </option>
                @endforeach
            </select>
        </div>
      </div>

      <input type="hidden" name="has_upload" value="true">

      <div class="col-md-12">
        <p>Or upload your own...</p>
      </div>

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

@push('scrips')
 <script>
        
        $(icon).on("click", "#save_icon_btn", function () {

            // function saveIcon() {
            $("personal-record-form").submit(function(event) {
                event.preventDefault();

                var formData = new FormData($(this)[0]);
                alert(formData);
                alert(formData[0]);

                // var icon_path = $(this).data('path');
                var title = $(this).data('title');
                var type_id = $(this).data('type_id');
                var description = $(this).data('description');
                var icon = $(this).data('icon');

                alert(title);

                $.ajax({
                     url: 'institution-types/uploadIcon',
                        type: 'POST',
                        data: {
                            title: title,
                            icon: icon,
                            // icon_path: icon_path
                        },
                    success: function (data) {
                        alert(data)
                    },
                    error: function(file, response) {
                        console.log('error');
                        console.log(file);
                        console.log(response);
                    },

                    cache: false,
                    processData: false
                });

                return false;
                });
        });

        $(icon).on("click", "#delete_icon_btn", function () {

               $("personal-record-form").submit(function(event) {
                event.preventDefault();


                    var icon = $(this).data('icon');

                      $.ajax({
                         url: 'institution-types/deleteIcon',
                            type: 'POST',
                            data: {
                                title: title,
                                icon_path: icon,
                                icon_id: icon_id,
                                // icon_path: icon_path
                            },
                        success: function (data) {
                            alert(data)
                        },
                           error: function(file, response) {
                            console.log('error');
                            console.log(file);
                            console.log(response);
                        },
                    });
            }
            }
        });
        });
    </script>
@endpush