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
                    <h3 class="text-center"><span class="text-danger">Profile Update</h3>
                    <div class="card-body">
                        <form action="{{route('user.profile.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{$user->phone}}" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Image <span class="text-danger">*</span></label>
                                <input type="file" name="profile_photo_path" class="form-control unicase-form-control text-input">
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