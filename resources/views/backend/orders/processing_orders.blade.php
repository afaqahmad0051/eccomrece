@extends('admin.admin_master')
@section('admin')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Processing Orders</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key=>$item )
                                <tr>
                                    <td>{{$item->order_date}}</td>
                                    <td>{{$item->invoice_no}}</td>
                                    <td>${{$item->amount}}</td>
                                    <td>{{$item->payment_method}}</td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">{{$item->status}}</span>
                                    </td>
                                    <td width="25%">
                                        <a title="Details" href="{{route('pending.order.details',$item->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        <a title="Delete" href="{{route('coupon.delete',$item->id)}}" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
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