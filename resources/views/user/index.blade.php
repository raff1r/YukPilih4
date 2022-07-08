@extends('template.dashboard')

@section('content')    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left m-0 mt-1 p-0">User Management</h5> 
                    <a href="/user/create" class="btn btn-primary float-right btn-sm">New User</a></div>
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table">
                            <tr class="text-center">
                                <th class="text-left">#</th>
                                <th class="text-left">Name</th>
                                <th>Division</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>

                            @foreach($user as $us)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$us->username}}</td>
                                <td class="text-center">{{$us->Division->name}}</td>
                                <td class="text-capitalize text-center">{{$us->role}}</td>
                                <td class="text-center">
                                    <a href="/user/edit/{{$us->id}}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                    <a href="/user/delete/{{$us->id}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection