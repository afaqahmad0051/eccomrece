@extends('admin.admin_master')
@section('admin')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Category <span class="bage badge-pill badge-danger" style="font-size: 18px;">{{ count($categories) }}</span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Icon</th>
                                    <th>Category Name</th>
                                    <th>Urdu Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $key=>$item )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <span>
                                            <i class="{{$item->category_icon}}"></i>
                                        </span>
                                    </td>
                                    <td>{{$item->category_name_en}}</td>
                                    <td>{{$item->category_name_ur}}</td>
                                    <td>
                                        <a title="Edit" href="{{route('category.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" href="{{route('category.delete',$item->id)}}" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
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
                        <form method="POST" action="{{route('category.store')}}">
                            @csrf
                            <div class="form-group">
                                <h5> Category Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_en" class="form-control">
                                    @error('category_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Urdu Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_ur" class="form-control text-right">
                                    @error('category_name_ur')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Category Icon <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_icon" class="form-control">
                                    @error('category_icon')
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