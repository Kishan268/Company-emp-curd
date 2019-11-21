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
@endforeach

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Employee') }}</div>

                <div class="card-body">

                   <a href="{{route('home')}}" class="btn btn-success ">Back</a>
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
                   <form action="{{route('employees.update',$data->id)}}" method="POST">
                   	@csrf
                   	@method('PATCH')
						<input type="hidden" name ="id" class="form-control" id="id" value="{{$data->id}}">
					  <div class="form-row">
					  	 <div class="form-group col-md-6">
					      <label for="first_name"> First Name</label>
					      <input type="text" class="form-control" id="first_name" name="first_name" value="{{$data->first_name}}"  placeholder="First Name">
					    </div>
					     <div class="form-group col-md-6">
					      <label for="last_name"> Last Name</label>
					      <input type="text" name="last_name" value="{{$data->last_name}}"  class="form-control"  id="last_name" placeholder="Last Name">
					    </div>
						    <div class="form-group col-md-6">
						      <label for="company_id"></label>
						      <select id="company_id" class="form-control" name ="company_id">
                    		@foreach($company as $data1)
						     <option  name ="company_id" value="{{$data1->id}}">{{$data1->name}}
						     </option>
						     {{-- </option>

						        <option >{{$data1->name}}</option> --}}
                    		@endforeach
						      </select>
						    </div>

					    <div class="form-group col-md-6">
					      <label for="email">Email</label>
					      <input type="email" name="email" value="{{$data->email}}"  class="form-control" id="email" placeholder="Email">
					    </div>
					    
					  <!-- <div class="form-row"> -->
					    <div class="form-group col-md-6">
					      <label for="phone">Phone</label>
					      <input type="number"  value="{{$data->phone}}" name="phone"  class="form-control" id="phone" placeholder="phone" >
					    </div>
					  
					    
					  <!-- </div> -->
					</div>
					  <button type="submit" class="btn btn-primary">Update</button>
					</form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
