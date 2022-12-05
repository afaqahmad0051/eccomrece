@extends('admin.admin_master')
@section('admin')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">SubCategory <span class="bage badge-pill badge-danger" style="font-size: 18px;">{{ count($subcategories) }}</span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Category</th>
                                    <th>Sub Category Name</th>
                                    <th>Urdu Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategories as $key=>$item )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item['category']['category_name_en']}}</td>
                                    <td>{{$item->subcategory_name_en}}</td>
                                    <td>{{$item->subcategory_name_ur}}</td>
                                    <td width="30%">
                                        <a title="Edit" href="{{route('subcategory.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" href="{{route('subcategory.delete',$item->id)}}" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
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
                        <form method="POST" action="{{route('subcategory.store')}}">
                            @csrf
                            <div class="form-group">
                                <h5>Category<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" id="" class="form-control">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->category_name_en}} - {{$category->category_name_ur}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> SubCategory Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_en" class="form-control">
                                    @error('subcategory_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Urdu Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_ur" class="form-control text-right">
                                    @error('subcategory_name_ur')
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