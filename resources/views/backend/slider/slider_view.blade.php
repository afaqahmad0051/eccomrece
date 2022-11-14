@extends('admin.admin_master')
@section('admin')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Sliders</h3>
                    <a href="{{route('add.slider')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Create</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $key=>$item )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        @if($item->title_en == NULL)
                                        <span class="badge badge-pill badge-danger">No Title Entered</span>
                                        @else
                                        {{$item->title_en}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->desc_en == NULL)
                                        <span class="badge badge-pill badge-danger">No Description Entered</span>
                                        @else
                                        {{$item->desc_en}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{asset($item->slider_image)}}" style="width: 70px; height:40px;">
                                    </td>
                                    <td width="25%">
                                        <a title="Edit" href="{{route('slider.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" href="{{route('slider.delete',$item->id)}}" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                                        @if($item->status == 1)
                                        <a title="Deactive" href="{{route('slider.inactive',$item->id)}}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                        <a title="Active" href="{{route('slider.active',$item->id)}}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
                                        @endif
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
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="float: right;">سلائیڈرز</h3>
                    <a href="{{route('add.slider')}}" style="float: left;" class="btn btn-rounded btn-success mb-5">نیا بنائیں</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-right">مزید</th>
                                    <th class="text-right">تصویر</th>
                                    <th class="text-right">سٹیٹس</th>
                                    <th class="text-right">تفصیل</th>
                                    <th class="text-right">عنوان</th>
                                    <th class="text-right">#نمبر</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $key=>$item )
                                <tr>
                                    <td class="text-right" width="25%">
                                        @if($item->status == 1)
                                        <a title="غیر فعال" href="{{route('slider.inactive',$item->id)}}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                        <a title="فعال" href="{{route('slider.active',$item->id)}}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
                                        @endif
                                        <a title="حذف کریں" href="{{route('slider.delete',$item->id)}}" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                                        <a title="ترمیم کریں" href="{{route('slider.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <img src="{{asset($item->slider_image)}}" style="width: 70px; height:40px; float:right;">
                                    </td>
                                    <td class="text-right">
                                        @if($item->status == 1)
                                        <span class="badge badge-pill badge-success">فعال</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">غیر فعال</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        @if($item->desc_ur == NULL)
                                        <span class="badge badge-pill badge-danger">کوئی تفصیل درج نہیں کی گئی۔</span>
                                        @else
                                        {{$item->desc_ur}}
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        @if($item->title_ur == NULL)
                                        <span class="badge badge-pill badge-danger">کوئی عنوان درج نہیں کیا گیا۔</span>
                                        @else
                                        {{$item->title_ur}}
                                        @endif
                                    </td>
                                    <td class="text-right">{{$key+1}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection