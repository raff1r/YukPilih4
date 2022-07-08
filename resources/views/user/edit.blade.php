@extends('template.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 mt-1 p-0">Edit User</h5></div>
                <div class="card-body"> 
                    <form action="/user/update/{{$id->id}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{$id->username}}">    
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="password" class="form-control" name="password">    
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" selected disabled>Choose role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="division_id">Division</label>
                            <select name="division_id" id="division_id" class="form-control">
                                <option value="" selected disabled>Choose Division</option>
                                @foreach($division as $divisi)
                                <option value="{{$divisi->id}}">{{$divisi->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group mt-3">
                            <a href="/user" class="btn btn-secondary mr-1">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection