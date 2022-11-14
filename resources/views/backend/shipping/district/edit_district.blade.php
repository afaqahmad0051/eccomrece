@extends('admin.admin_master')
@section('admin')

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
                        <form method="POST" action="{{route('district.update',$districts->id)}}">
                            @csrf
                            <div class="form-group">
                                <h5>Country<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="division_id" class="form-control select2">
                                        <option value="" selected disabled>Select Country</option>
                                        @foreach($divisions as $division)
                                        <option value="{{ $division->id }}" {{ $division->id == $districts->division_id ? 'selected':''}}>{{$division->division_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="district_name" value="{{ $districts->district_name }}" class="form-control">
                                    @error('district_name')
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
@endsection