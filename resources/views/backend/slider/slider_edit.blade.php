@extends('admin.admin_master')
@section('admin')
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<style>
    form{
        overflow: hidden
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Create</h3>
                    <a href="{{route('all.slider')}}" style="float: right;" class="btn btn-rounded btn-secondary mb-5">Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('slider.update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$slider->id}}">
                            <input type="hidden" name="old_image" value="{{ $slider->slider_image }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title_en" value="{{ $slider->title_en }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> Urdu Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title_ur" value="{{ $slider->title_ur }}" class="form-control text-right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="desc_en" id="textarea" class="form-control">{{ $slider->desc_en }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> Description Urdu <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="desc_ur" id="textarea" style="text-align:right;" class="form-control">{{ $slider->desc_ur }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> Slider Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_image" class="form-control" onchange="mainThumUrl(this)">
                                            <img src="" id="mainTumb">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="{{asset($slider->slider_image)}}">
                                    </div>
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
@endsection