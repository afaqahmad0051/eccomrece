@extends('admin.admin_master')
@section('admin')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Product</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key=>$item )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <img src="{{ asset($item->product_thumbnail) }}" style="width: 60px; height:50px;">
                                    </td>
                                    <td>{{$item->product_name_en}}</td>
                                    <td>Rs: {{$item->selling_price}}</td>
                                    <td>
                                        @if($item->discount_price == NULL)
                                        <span class="badge badge-pill badge-primary">No Discount</span>
                                        @else
                                        @php
                                        $amount = (int)$item->selling_price - (int)$item->discount_price;
                                        $discount = ((int)$amount/(int)$item->selling_price)*100;
                                        @endphp
                                        <span class="badge badge-pill badge-warning">{{ round($discount) }}%</span>
                                        @endif
                                    </td>
                                    <td>{{$item->product_qty}} pieces</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td width="30%">
                                        <a title="Details" href="{{route('product.edit',$item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        <a title="Edit" href="{{route('product.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" href="{{route('product.delete',$item->id)}}" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                                        @if($item->status == 1)
                                        <a title="Deactive" href="{{route('product.inactive',$item->id)}}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                        <a title="Active" href="{{route('product.active',$item->id)}}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
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
</section>
@endsection