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
                <div class="card-header">Manage company
                    <a href="{{route('add.company')}}" class="float-right  btn btn-primary">Add Company</a>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <h4>Company List</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20%">Name</th>
                                <th style="width: 15%">Email</th>
                                <th style="width: 20%">Website</th>
                                <th style="width: 20%">Logo</th>
                                <th style="width: 17%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companylist as $display)
                                <tr>
                                    <td>{{$display->company_name}}</td>
                                    <td>{{$display->email}}</td>
                                    <td>{{$display->website}}</td>
                                    <td> <img  src="{{ asset('storage/app/public/images/companylogo/'.@$display->logo) }}" style="width: 80px;height: 60px;"></td>
                                    <td><a href="{{route('edit.company',[$display->id])}}" class="btn btn-success">Edit</a><a href="{{route('delete.company',[$display->id])}}" class="btn btn-danger ml-2" onclick="return confirm('Do you want to delete this company ?')">Delete</a></td>
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