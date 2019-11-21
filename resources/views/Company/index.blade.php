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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Company') }}</div>
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
                 	<form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                   	@csrf
					  <div class="form-row">
					  	 <div class="form-group col-md-6">
					      <label for="name">Name</label>
					      <input type="text" name ="name" class="form-control" id="name" placeholder="Company Name">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="email">Email</label>
					      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
					    </div>
					    
					  <!-- <div class="form-row"> -->
					    <div class="form-group col-md-6">
					      <label for="logo">logo</label>
					      <input type="file" name="logo" class="form-control" id="logo" >
					    </div>
					   <div class="form-group col-md-6">
					      <label for="website">website</label>
					      <input type="text" name="website" class="form-control" id="website" placeholder="website">
					    </div>
					    
					  <!-- </div> -->
					</div>
					  <button type="submit" class="btn btn-primary">Add</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
