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
                    <h3 class="text-center"><span class="text-danger">Hi..</span><strong>{{Auth::user()->name }} </strong>Welcome To Emart</h3>
                </div>
            </div>
            <!-- End Col  -->
        </div>
        <!-- End Row  -->
    </div>
</div>
@endsection