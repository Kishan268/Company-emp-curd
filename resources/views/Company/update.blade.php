@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($errors) > 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

@foreach ($users as $data)

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Company') }}</div>
                <div class="card-body">
                   <a href="{{route('home')}}" class="btn btn-success">Back</a>
                   @if(session()->has('message'))
				    <div class="alert alert-success">
				        {{ session()->get('message') }}
				    </div>
					@endif
					@if(session()->has('messageError'))
				    <div class="alert alert-success">
				        {{ session()->get('messageError') }}
				    </div>
					@endif
                 	<form action="{{route('companies.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                   	@csrf
                   	@method('PATCH')
					<input type="hidden" name ="id" class="form-control" id="id" value="{{$data->id}}">

					  <div class="form-row">
					  	 <div class="form-group col-md-6">
					      <label for="name">Name</label>
					      <input type="text" name ="name" class="form-control" id="name" value="{{$data->name}}" placeholder="Company Name">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="email">Email</label>
					      <input type="email" name="email" value="{{$data->email}}" class="form-control" id="email" placeholder="Email">
					    </div>
					    
					  <!-- <div class="form-row"> -->
					    <div class="form-group col-md-6">
					      <label for="logo">logo</label>
					      <input type="file" name="logo" value="{{$data->logo}}" class="form-control" id="logo" >
					     <img src="{{asset("storage/images/$data->logo")}}" height="50px" width="50px" />
                           
					    </div>
					   <div class="form-group col-md-6">
					      <label for="website">website</label>
					      <input type="text" name="website" class="form-control" id="website" value="{{$data->website}}" placeholder="website">
					    </div>
					    
					  <!-- </div> -->
					</div>
					  <button type="submit" class="btn btn-primary">Update</button>
					</form>
                </div>
            </div>
        </div>
    </div>
@endforeach

</div>
@endsection
