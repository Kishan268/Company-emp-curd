@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        </div>
                    @endif
                     <a href="/" class="btn btn-success">Back</a>
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
                    <form action="{{route('empImport')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Import Employees</label>
                            <input type="file" name="file">
                            <input type="submit" name="submit" class="btn btn-primary" value="Import User">
                    </form>
                        <a href="{{route('empExport')}}" class="btn btn-primary">Export Employees</a>
                    </div>

                </div>
                    <table id="example" class="table table-striped table-bordered mt-3" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    @foreach($users as $data)
                     <tbody>
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->first_name}}</td>
                            <td>{{$data->last_name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td><a href="{{route('employees.edit',$data->id)}}" class="btn btn-success">Edit
                                </a>
                                <a href="{{route('emp_delete',$data->id)}}" class="btn btn-danger" onclick="return checkDelete()">Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script> 

@endsection
