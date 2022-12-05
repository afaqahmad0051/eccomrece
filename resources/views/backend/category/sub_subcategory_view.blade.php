@extends('admin.admin_master')
@section('admin')
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-9">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">SubCategory <span class="bage badge-pill badge-danger" style="font-size: 18px;">{{ count($subsubcategories) }}</span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>S.SubCategory Name</th>
                                    <th>Urdu Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subsubcategories as $key=>$item )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item['category']['category_name_en']}}</td>
                                    <td>{{$item['subcategory']['subcategory_name_en']}}</td>
                                    <td>{{$item->subsubcategory_name_en}}</td>
                                    <td>{{$item->subsubcategory_name_ur}}</td>
                                    <td width="50%">
                                        <a title="Edit" href="{{route('subsubcategory.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" href="{{route('subsubcategory.delete',$item->id)}}" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
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
        <div class="col-3">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Create</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('subsubcategory.store')}}">
                            @csrf
                            <div class="form-group">
                                <h5>Category<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" id="category_id" class="form-control">
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
                                <h5>SubCategory<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                        <option value="" selected disabled>Select SubCategory</option>

                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> S.SubCategory Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_en" class="form-control">
                                    @error('subsubcategory_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Urdu Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_ur" class="form-control text-right">
                                    @error('subsubcategory_name_ur')
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
        $('#category_id').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('#subcategory_id').empty();
                        var d = $('#subcategory_id').append('<option value="" selected disabled>' + 'Select SubCategory' + '</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory_id').append('<option value="' + value.id + '">' + value.subcategory_name_en + ' - ' + value.subcategory_name_ur + '</option>');
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