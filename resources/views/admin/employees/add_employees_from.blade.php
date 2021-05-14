@extends('layouts.app')
@section('title')
@if(@$getemp)Edite Employee @else Add Employee @endif
@endsection
@section('sidebar')
@include('admin.includes.sidebar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 float-right">
            <div class="card">
                <div class="card-header">@if(@$getemp)Edite Employee @else Add Employee @endif
                    <a href="{{route('manage.employee')}}" class="float-right  btn btn-primary">Back</a>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <h2>Add Employee</h2>
                    <div class="col-md-8">
                        <form action="{{route('store.employee')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden"  name="emp_id" value="{{@$getemp->id}}">
                            <div class="form-group ">
                                <label for="text">First Name:</label>
                                <input type="text" class="form-control" id="text" placeholder="Enter First Name" name="first_name" value="{{@$getemp->first_name}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('first_name')}}</b></span>
                            </div>
                            <div class="form-group ">
                                <label for="text">Last Name:</label>
                                <input type="text" class="form-control" id="text" placeholder="Enter Last Name" name="last_name" value="{{@$getemp->last_name}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('last_name')}}</b></span>
                            </div>
                            <div class="form-group ">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="partha@gmail.com" name="email" value="{{@$getemp->email}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('email')}}</b></span>
                            </div>
                            <div class="form-group ">
                                <label for="text">Mobile No</label>
                                <input type="text" class="form-control" id="text" placeholder="10 digit Mobile No" name="phone_no" value="{{@$getemp->phone_no}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('phone_no')}}</b></span>
                            </div>
                            <div class="form-group ">
                                <label for="text">PAN Card No</label>
                                <input type="text" class="form-control" id="text" placeholder="PAN Card No" name="pan_no" value="{{@$getemp->pan_no}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('pan_no')}}</b></span>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Select Company</label>
                                <select class="form-control" id="sel1" name="company_id">
                                    <option value="">select</option>
                                    @foreach(@$companylist as $display)
                                        <option value="{{@$display->id}}" {{@$getemp->id==@$display->id ? 'selected' : ''}}>{{$display->company_name}}</option>
                                    @endforeach
                                </select>
                                <span style="color:#cc0000;"><b>{{$errors->first('company_id')}}</b></span>
                            </div>
                             
                             
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
 

@endsection