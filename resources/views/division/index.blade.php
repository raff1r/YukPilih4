@extends('template.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left m-0 mt-1 p-0">Division Management</h5> 
                    <a href="/division/create" class="btn btn-primary float-right btn-sm">New Division</a></div>
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>

                            @foreach($division as $divisi)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$divisi->name}}</td>
                                <td>
                                    <a href="/division/edit/{{$divisi->id}}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                    <a href="/division/delete/{{$divisi->id}}" class="btn btn-danger btn-sm">Delete</a>
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