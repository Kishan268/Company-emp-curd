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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Employee') }}</div>

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
                   <form action="{{route('employees.store')}}" method="POST">
                   	@csrf
					  <div class="form-row">
					  	 <div class="form-group col-md-6">
					      <label for="first_name"> First Name</label>
					      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
					    </div>
					     <div class="form-group col-md-6">
					      <label for="last_name"> Last Name</label>
					      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
					    </div>
					     <div class="form-row">

						    <div class="form-group col-md-6">
						      <label for="company_id">Company</label>
						      <select id="company_id" class="form-control" name ="company_id">
						     <option selected>Choose...</option>

                    	@foreach($users as $data)

						        <option name ="company_id" value="{{$data->id}}">{{$data->name}}</option>
                    	@endforeach

						      </select>
						    </div>

					    <div class="form-group col-md-6">
					      <label for="email">Email</label>
					      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
					    </div>
					    
					  <!-- <div class="form-row"> -->
					    <div class="form-group col-md-6">
					      <label for="phone">Phone</label>
					      <input type="number" name="phone" class="form-control" id="phone" placeholder="phone" >
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
