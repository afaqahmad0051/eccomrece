@extends('admin.admin_master')
@section('admin')
<script src="{{asset('backend/js/jquery.min.js')}}"></script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- Add Brand  -->
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('area.update',$areas->id)}}">
                            @csrf
                            <div class="form-group">
                                <h5>Country<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="division_id" id="division_id" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>Select Country</option>
                                        @foreach($divisions as $division)
                                        <option value="{{ $division->id }}" {{ ($division->id == $areas->division_id)?'selected':'' }}>{{$division->division_name}}</option>
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
                                        @foreach($districts as $district)
                                        <option value="{{ $district->id }}" {{ ($district->id == $areas->district_id)?'selected':'' }}>{{$district->district_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="area_name" value="{{ $areas->area_name }}" class="form-control">
                                    @error('area_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" style="float: right;" class="btn btn-rounded btn-success mb-5" value="Update">
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