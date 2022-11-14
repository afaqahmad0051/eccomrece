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
                    <a href="{{route('all.subcategory')}}" class="btn btn-rounded btn-secondary btn-small" style="float: right;">Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('subcategory.update')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$subcategory->id}}">p
                            <div class="form-group">
                                <h5>Category<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" id="" class="form-control">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"{{ ($category->id == $subcategory->category_id)?'selected':'' }}>{{$category->category_name_en}} - {{$category->category_name_ur}}</option>
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
                                    <input type="text" value="{{$subcategory->subcategory_name_en}}" name="subcategory_name_en" class="form-control">
                                    @error('subcategory_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Urdu Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{$subcategory->subcategory_name_ur}}" name="subcategory_name_ur" class="form-control text-right">
                                    @error('subcategory_name_ur')
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
@endsection