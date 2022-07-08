@extends('template.auth')
<!-- partial:index.partial.html -->
@section('content')
<div class="login-form">
  <form method="POST" action="{{url('/register')}}" >
    @csrf
    <h1>Register</h1>
    <div class="content">
      <div class="input-field">
        <input type="text" placeholder="Username" autocomplete="off" required name="username">
      </div>
      <div class="input-field">
      <select name="division_id" >
          @foreach($division as $divisi)
         <option value="{{$divisi->id}}">{{$divisi->name}}</option>
          @endforeach
        </select>
      </div>      
    </div>
    <div class="action">
      <button class="button"> <a href="/login"> Already Have Account</a></button>
      <input type="submit" value="Register" class="button">
    </div>
  </form>
</div>
<!-- partial -->
@endsection