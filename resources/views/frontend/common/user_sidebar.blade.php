@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id)
@endphp
<div class="col-md-2"><br>
    <img src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/blank.jpg')}}" class="card-im-top" style="border-radius: 50%;" height="100%" width="100%"><br><br>
    <ul class="list-group list-group-flush">
        <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile</a>
        <a href="{{route('user.password')}}" class="btn btn-primary btn-sm btn-block">Password</a>
        <a href="{{route('my.orders')}}" class="btn btn-primary btn-sm btn-block">My Orders</a>
        <a href="{{route('return.orders')}}" class="btn btn-primary btn-sm btn-block">Order Return Request</a>
        <a href="{{route('cancelled.orders.list')}}" class="btn btn-primary btn-sm btn-block">Cancelled Orders</a>
        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div>