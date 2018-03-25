@extends('admin.main')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <style>
        table th {
            text-align: center;
        }

        table#institutions th, table#institutions td {
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div class="box">
        <div class="box-body">
            <table id="institutions" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Description</th>
                <th>Institution Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($institutions as $institution)
                <tr data-id="{{ $institution->id }}" data-object='{!! json_encode($institution) !!}'>
                    <td>{{ $institution->name }}</td>
                    <td>{{ $institution->address }}</td>
                    <td>{{ $institution->short_description }}</td>
                    <td>{{ $institution->type->name }}</td>
                    <td class="text-center">
                        @if (!$institution->status)
                            <button type="button" class="btn btn-warning btn-status">Pending</button>
                        @else
                            <button type="button" class="btn btn-success btn-status">Approved</button>
                        @endif
                    </td>
                    <td class="text-center">
                        <a class="edit" href="#" data-toggle="modal" data-target="#edit-modal">
                            <i class="text-info fa fa-edit" style="font-size: 18px;"></i>
                        </a>
                        <a class="delete" href="{{ route('institutions.delete', $institution->id) }}">
                            <i class="text-danger fa fa-trash" style="font-size: 18px;"></i>
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

    <!-- Modal -->
    <div id="edit-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit institution</h4>
            </div>
            <div class="modal-body">
                    <form method='put' class="form-horizontal" action="{{ route('institutions.update', 'id') }}" role="form">
                            <fieldset>

                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Name</label>
                                <div class="col-sm-4">
                                  <input type="text" name="name" placeholder="Name" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Type</label>
                                <div class="col-sm-4">
                                    <select name="type_id" class="form-control">
                                        @foreach ($institutionTypes as $institutionType)
                                            <option value="{{ $institutionType->id }}">{{ $institutionType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                    
                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Address</label>
                                <div class="col-sm-4">
                                  <input type="text" name="address" placeholder="Address" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Owner</label>
                                <div class="col-sm-4">
                                  <input type="text" name="owner_name" placeholder="Owner name" class="form-control">
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Short desc.</label>
                                <div class="col-sm-4">
                                  <input type="text" name="short_description" placeholder="Short description" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Website</label>
                                <div class="col-sm-4">
                                  <input type="text" name="website" placeholder="Website" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Short desc.</label>
                                <div class="col-sm-4">
                                    <input type="text" name="short_description" placeholder="Short description" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Website</label>
                                <div class="col-sm-4">
                                    <input type="text" name="website" placeholder="Website" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Email</label>
                                <div class="col-sm-4">
                                    <input type="text" name="email" placeholder="Contact email" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Phone</label>
                                <div class="col-sm-4">
                                    <input type="text" name="phone_number" placeholder="Phone number" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Facebook</label>
                                <div class="col-sm-4">
                                    <input type="text" name="fb_page" placeholder="Facebook page" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Twitter</label>
                                <div class="col-sm-4">
                                    <input type="text" name="twitter_page" placeholder="Twitter page" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Instagram</label>
                                <div class="col-sm-4">
                                    <input type="text" name="ig_page" placeholder="Instagram page" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Ratio</label>
                                <div class="col-sm-4">
                                    <input type="text" name="ratio" placeholder="Women ratio" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>
                   
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <div class="pull-right">
                                    <button data-dismiss="modal" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                  </div>
                                </div>
                              </div>
                    
                            </fieldset>
                          </form>
            </div>
            </div>

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

            $('#institutions').on('click', 'button.btn-status', function () {
                let $this = $(this);
                let id = $this.closest('tr').data('id');
                let route = "{!! route('institutions.changeStatus', 'id') !!}";

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
                        $this.toggleClass('btn-success btn-warning');

                        let text = resp.institution.status ? 'Approved' : 'Pending';
                        $this.html(text);
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

            $('#edit-modal').on('show.bs.modal', function (e) {
                let target = $(e.relatedTarget).closest('tr');
                let object = target.data('object');
                let route = $(this).find('form').attr('action');
                let index = route.lastIndexOf('/');
                $(this).find('form').attr('action', route.slice(0, index + 1) + object.id);

                $(this).find(':input').not('button').each(function (index, element) {
                    let $element = $(element);
                    $element.val(object[$element.attr('name')]);
                });
            });

            $('#edit-modal').find('form').on('submit', function (e) {
                e.preventDefault();
                let $this = $(this);
                let formData = $this.serialize();

                $.ajax({
                    url: $this.attr('action'),
                    method: 'put',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function (resp) {
                        location.reload();
                    }
                })
            })
        })
    </script>
@endpush