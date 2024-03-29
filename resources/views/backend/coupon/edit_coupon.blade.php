@extends('admin.admin_master')
@section('admin')

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- Add Coupon  -->
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('coupon.update',$coupons->id)}}">
                            @csrf
                            <div class="form-group">
                                <h5> Coupon Code <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="coupon_name" value="{{ $coupons->coupon_name }}" class="form-control">
                                    @error('coupon_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Coupon Discount(%) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="coupon_discount" value="{{ $coupons->coupon_discount }}" class="form-control text-right">
                                    @error('coupon_discount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Coupon Valid Till <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="coupon_validity" value="{{ $coupons->coupon_validity }}" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error('coupon_validity')
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