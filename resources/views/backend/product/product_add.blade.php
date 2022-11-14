@extends('admin.admin_master')
@section('admin')
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<!-- Main content -->
<section class="content">
    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Product</h4>
            <a href="{{route('all.product')}}" style="float: right;" class="btn btn-rounded btn-secondary mb-5">Back</a>
            </h6>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <!-- Start 1st Row  -->
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <h5>Brand<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="brand_id" id="" class="form-control">
                                                    <option value="" selected disabled>Select Brand</option>
                                                    @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{$brand->brand_name_en}} - {{$brand->brand_name_ur}}</option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-3">
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
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-3">
                                        <div class="form-group">
                                            <h5>SubCategory<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                                    <option value="" selected disabled>Select SubCategory</option>

                                                </select>
                                                @error('subcategory_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <!-- End Col  -->
                                    <div class="col-3">
                                        <div class="form-group">
                                            <h5>S.SubCategory<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subsubcategory_id" id="subsubcategory_id" class="form-control">
                                                    <option value="" selected disabled>Select Sub SubCategory</option>

                                                </select>
                                                @error('subsubcategory_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                                <!-- End 1s Row  -->
                                <!-- Start 2nd Row  -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Product Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_name_en" class="form-control">
                                                @error('product_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Urdu Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" style="text-align:right;" name="product_name_ur" class="form-control">
                                                @error('product_name_ur')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                                <!-- End 2nd Row  -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Product Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_code" class="form-control">
                                                @error('product_code')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Product Quantity <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_qty" class="form-control">
                                                @error('product_qty')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Start 3rd Row  -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>English Tags <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_tags_en" class="form-control" data-role="tagsinput">
                                                @error('product_tags_en')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Urdu Tags <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_tags_ur" class="form-control" style="text-align:right;" data-role="tagsinput">
                                                @error('product_tags_ur')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                                <!-- End 3rd Row  -->
                                <!-- Start 4th Row  -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Product Size English<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_size_en" class="form-control" data-role="tagsinput">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Product Size Urdu <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_size_ur" class="form-control" style="text-align:right;" data-role="tagsinput">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                                <!-- End 4th Row  -->
                                <!-- Start 5th Row  -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Product Color English<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_en" class="form-control" data-role="tagsinput">
                                                @error('product_color_en')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Product Color Urdu <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_ur" class="form-control" style="text-align:right;" data-role="tagsinput">
                                                @error('product_color_ur')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                                <!-- End 5th Row  -->
                                <!-- Start 6th Row  -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Selling Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="selling_price" class="form-control">
                                                @error('selling_price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Discount Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount_price" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                                <!-- End 6th Row  -->
                                <!-- Strat 7th Row  -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="product_thumbnail" class="form-control" onchange="mainThumUrl(this)">
                                                @error('product_thumbnail')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <img src="" id="mainTumb">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>More Images<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="multi_img[]" class="form-control" multiple id="multiImg">
                                                <div class="form-control-feedback text-warning"><small>You Can Select Multiple Images Here</small></div>
                                                @error('multi_img')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="row" id="preview_img">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                                <!-- End 7th Row  -->
                                <!-- Strat 8th Row  -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Short Description English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_desc_en" id="textarea" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Short Description Urdu <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_desc_ur" id="textarea" style="text-align:right;" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                                <!-- End 8th Row  -->
                                <!-- Strat 9th Row  -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Long Description English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea id="editor1" name="long_desc_en" rows="10" cols="80"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Long Description Urdu <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea id="editor2" name="long_desc_ur" rows="10" cols="80"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                                <!-- End 10th Row  -->
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" name="hot_deals" id="checkbox_2" value="1">
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" name="featured" id="checkbox_3" value="1">
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" name="special_offer" id="checkbox_4" value="1">
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" name="special_deals" id="checkbox_5" value="1">
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" style="float: right;" class="btn btn-rounded btn-success mb-5" value="Create">
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->


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
                        var d = $('#subsubcategory_id').empty();
                        var d = $('#subsubcategory_id').append('<option value="" selected disabled>' + 'Select Sub SubCategory' + '</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory_id').append('<option value="' + value.id + '">' + value.subcategory_name_en + ' - ' + value.subcategory_name_ur + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

        $('#subcategory_id').on('change', function() {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('#subsubcategory_id').empty();
                        var d = $('#subsubcategory_id').append('<option value="" selected disabled>' + 'Select Sub SubCategory' + '</option>');
                        $.each(data, function(key, value) {
                            $('#subsubcategory_id').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + ' - ' + value.subsubcategory_name_ur + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

<!-- For Main Thumbnail Picture -->
<script>
    function mainThumUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainTumb').attr('src', e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- For Multi Image -->
<script>
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                    .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
@endsection