@extends('template.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left m-0 mt-1 p-0">Poll Management</h5> 
                    <a href="/poll/create" class="btn btn-primary float-right btn-sm">New Poll</a></div>
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                            @foreach($poll as $po)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$po->title}}</td>
                                <td>{{$po->deadline}}</td>
                                <td>
                                    <a href="/poll/edit/{{$po->id}}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                    <a href="/poll/delete/{{$po->id}}" class="btn btn-danger btn-sm">Delete</a>
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