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
                    <a href="{{route('all.category')}}" class="btn btn-rounded btn-secondary btn-small" style="float: right;">Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('category.update')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="form-group">
                                <h5> Category Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_en" value="{{$category->category_name_en}}" class="form-control">
                                    @error('category_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Urdu Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_ur" value="{{$category->category_name_ur}}" class="form-control text-right">
                                    @error('category_name_ur')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Category Icon <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_icon" value="{{$category->category_icon}}" class="form-control">
                                    @error('category_icon')
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