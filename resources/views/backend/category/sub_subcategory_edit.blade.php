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
                    <a href="{{route('all.subsubcategory')}}" class="btn btn-rounded btn-secondary btn-small" style="float: right;">Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('subsubcategory.update')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$subsubcategories->id}}">
                            <div class="form-group">
                                <h5>Category<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{($category->id == $subsubcategories->category_id)?'selected':''}} >{{$category->category_name_en}} - {{$category->category_name_ur}}</option>
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
                                        @foreach($subcategories as $sub)
                                        <option value="{{ $sub->id }}" {{($sub->id == $subsubcategories->subcategory_id)?'selected':''}}>{{$sub->subcategory_name_en}} - {{$sub->subcategory_name_ur}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> S.SubCategory Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_en" value="{{$subsubcategories->subsubcategory_name_en}}" class="form-control">
                                    @error('subsubcategory_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Urdu Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_ur" value="{{$subsubcategories->subsubcategory_name_ur}}" class="form-control text-right">
                                    @error('subsubcategory_name_ur')
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