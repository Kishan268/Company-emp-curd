@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-8">
                        <a href="{{route('companies.create')}}" class="btn btn-success">Add Company</a>|| 
                    <a href="{{route('employees.create')}}" class="btn btn-success">Add Empaloyee</a>
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
                    <form action="{{route('emp')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="form-row">
                        <div class="form-group col-md-8">
                            <label>Import User</label>
                            <input type="file" name="file">
                            <input type="submit" name="submit" class="btn btn-primary" value="Import User">
                    </form>
                        <a href="{{route('exp')}}" class="btn btn-primary">Export Data</a>
                        </div>
                    </div>
                </div>
                    <table id="example" class="table table-striped table-bordered mt-3" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    @foreach($users as $data)
                     <tbody>
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td><img src="{{asset("storage/images/$data->logo")}}" height="30px" width="30px" /></td>
                            <td>
                                <a href="{{route('companies.show',$data->id)}}" class="btn btn-primary">Show Employees</a>
                                <a href="{{route('companies.edit',$data->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{route('comp_delete',$data->id)}}" class="btn btn-danger" onclick="return checkDelete()">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                {{ $users->links() }}
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
