@extends('admin.admin_master')
@section('admin')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Search By Date</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('search-by-date')}}">
                            @csrf
                            <div class="form-group">
                                <h5> Select Date </h5>
                                <div class="controls">
                                    <input type="date" name="date" class="form-control">
                                    @error('date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" style="float: right;" class="btn btn-rounded btn-success mb-5" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Search By Month</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('search-by-month')}}">
                            @csrf
                            <div class="form-group">
                                <h5> Select Month</h5>
                                <div class="controls">
                                    <select name="month" class="form-control">
                                        <option label="Select Month" selected></option>
                                        <option value="January">January</option>
                                        <option value="Febrauary">Febrauary</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5> Select Year</h5>
                                <div class="controls">
                                    <select name="year_name" class="form-control">
                                        <option label="Select Year" selected></option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" style="float: right;" class="btn btn-rounded btn-success mb-5" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Search By Year</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('search-by-year')}}">
                            @csrf
                            <div class="form-group">
                                <h5> Select Year</h5>
                                <div class="controls">
                                    <select name="year" class="form-control">
                                        <option label="Select Year" selected></option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" style="float: right;" class="btn btn-rounded btn-success mb-5" value="Search">
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