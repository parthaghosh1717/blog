@extends('layouts.app')
@section('title')
Manage Company
@endsection
@section('sidebar')
@include('admin.includes.sidebar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 float-right">
            <div class="card">
                <div class="card-header">Manage employee
                    <a href="{{route('add.employee')}}" class="float-right  btn btn-primary">Add Employee</a>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <h4>Employee List</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>PAN No</th>
                                <th>Company Name</th>
                                <th style="width: 17%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emplist as $display)
                                <tr>
                                    <td>{{$display->first_name}} {{$display->last_name}}</td>
                                    <td>{{$display->email}}</td>
                                    <td>{{$display->phone_no}}</td>
                                    <td>{{$display->pan_no}}</td>
                                    <td>{{$display->gerCompanyName->company_name}}</td>
                                    <td><a href="{{route('edit.employee',[$display->id])}}" class="btn btn-success">Edit</a><a href="{{route('delete.employee',[$display->id])}}" class="btn btn-danger ml-2" onclick="return confirm('Do you want remove this employee?')">Delete</a></td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection