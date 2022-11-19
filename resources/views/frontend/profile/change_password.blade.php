@extends('frontend.home_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <!-- End Col  -->
            <div class="col-md-2">

            </div>
            <!-- End Col  -->
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Change Password</h3>
                    <div class="card-body">
                        <form action="{{route('user.password.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password <span class="text-danger">*</span></label>
                                <input type="password" id="current_password" name="oldpassword" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Col  -->
        </div>
        <!-- End Row  -->
    </div>
</div>
@endsection