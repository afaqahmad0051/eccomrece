@extends('frontend.home_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/blank.jpg')}}" class="card-im-top" style="border-radius: 50%;" height="100%" width="100%"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile</a>
                    <a href="{{route('user.password')}}" class="btn btn-primary btn-sm btn-block">Password</a>
                    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
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