@extends('admin.admin_master')
@section('admin')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Total Users <span class="bage badge-pill badge-danger" style="font-size: 18px;">{{ count($users) }}</span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key=>$user )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <img src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/blank.jpg')}}"  style="width: 50px; height:50px;">
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        @if ($user->UserOnline())                                            
                                            <span class="badge badge-pill badge-success">Active Now</span>
                                            @else                                            
                                            <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a title="Edit" href="" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a title="Delete" href="" id="delete" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
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