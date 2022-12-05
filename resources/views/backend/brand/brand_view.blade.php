@extends('admin.admin_master')
@section('admin')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Brands <span class="bage badge-pill badge-danger" style="font-size: 18px;">{{ count($brands) }}</span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Brand Name</th>
                                    <th>Urdu Name</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $key=>$item )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->brand_name_en}}</td>
                                    <td>{{$item->brand_name_ur}}</td>
                                    <td>
                                        <img src="{{asset($item->brand_image)}}" style="width: 70px; height:40px;">
                                    </td>
                                    <td>
                                        <a title="Edit" href="{{route('brand.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" href="{{route('brand.delete',$item->id)}}" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
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
                        <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5> Brand Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_en" placeholder="Enter Brand Name" class="form-control">
                                    @error('brand_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Urdu Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_ur" placeholder="برانڈ کا نام درج کریں۔" class="form-control text-right">
                                    @error('brand_name_ur')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Brand Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="brand_image" class="form-control">
                                    @error('brand_image')
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