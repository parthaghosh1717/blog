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
        <div class="col-lg-12 col-md-12">
           
            <div class="col-md-8 ol-lg-8 float-right">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <h4>Welcome to admin dashboard</h4>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
