@extends('layouts.app')
@section('title')
@if(@$getcompany)Edite Company @else Add Company @endif
@endsection
@section('sidebar')
@include('admin.includes.sidebar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 float-right">
            <div class="card">
                <div class="card-header">@if(@$getcompany)Edite Company @else Add Company @endif
                    <a href="{{route('manage.company')}}" class="float-right  btn btn-primary">Back</a>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <h2>@if(@$getcompany)Edite Company @else Add Company @endif</h2>
                    <div class="col-md-8">
                        <form action="{{route('store.company')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden"  name="company_id" value="{{@$getcompany->id}}">
                            <div class="form-group ">
                                <label for="text">Company Name:</label>
                                <input type="text" class="form-control" id="text" placeholder="Enter company name" name="company_name" value="{{@$getcompany->company_name}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('company_name')}}</b></span>
                            </div>

                            <div class="form-group ">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter company email" name="email" value="{{@$getcompany->email}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('email')}}</b></span>
                            </div>
                            <div class="form-group ">
                                <label for="company_website">Company Website:</label>
                                <input type="text" class="form-control" id="company_website" placeholder="E.g - www.bizzmanweb.com" name="company_website" value="{{@$getcompany->website}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('company_website')}}</b></span>
                            </div>
                            <div class="form-group row "> 
                                <label for="exampleInputimage" class="col-sm-3 col-form-label">Company Logo</label> 
                                <input type="file" name="logo"  onchange="previewImage(event)"> 

                                <div class="polaroid ">
                                   
                                  @if(@$getcompany->logo)
                                    <img src="{{ asset('storage/app/public/images/companylogo/'.@$getcompany->logo) }}"   style="width: 100px;height: 120px;" id="imagefields">
                                    @else
                                    <img src="{{url('public/images/company_logo.png')}}" alt="5 Terre" style="width: 100px;height: 120px;" id="imagefields">
                                  @endif 
                                </div><span style="color:#cc0000;"><b>{{$errors->first('logo')}}</b></span>
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
<!-- Image Select -->
    <script type="text/javascript">
        function previewImage(event){
            var reader = new FileReader();
            var imageField = document.getElementById('imagefields')

            reader.onload = function(){
                if(reader.readyState == 2){
                    imageField.src = reader.result;
                }
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
<!-- End of Image Select -->

@endsection