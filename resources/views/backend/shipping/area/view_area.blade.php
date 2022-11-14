@extends('admin.admin_master')
@section('admin')
<script src="{{asset('backend/js/jquery.min.js')}}"></script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Area</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Name</th>
                                    <th>Area Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($areas as $key=>$item )
                                <tr>
                                    <td>{{$item->division->division_name}}</td>
                                    <td>{{$item->district->district_name}}</td>
                                    <td>{{$item->area_name}}</td>
                                    <td width="40%">
                                        <a title="Edit" href="{{route('area.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" href="{{route('area.delete',$item->id)}}" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <!-- Add Brand  -->
        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Create</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('area.store')}}">
                            @csrf
                            <div class="form-group">
                                <h5>Country<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="division_id" id="division_id" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>Select Country</option>
                                        @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">{{$division->division_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>City<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="district_id" id="district_id" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>Select City</option>

                                    </select>
                                    @error('district_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="area_name" class="form-control">
                                    @error('area_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" style="float: right;" class="btn btn-rounded btn-success mb-5" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#division_id').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{  url('/shipping/district/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('#district_id').empty();
                        var d = $('#district_id').append('<option value="" selected disabled>' + 'Select City' + '</option>');
                        $.each(data, function(key, value) {
                            $('#district_id').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection