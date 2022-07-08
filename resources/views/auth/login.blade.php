@extends('template.auth')

<!-- partial:index.partial.html -->
@section('content')
<div class="login-form">
  <form method="post" action="/login">
    @csrf
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="text" placeholder="Username" autocomplete="off" required name="username">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" autocomplete="off" required name="password">
      </div>
    </div>
    <div class="action">
      <button class="button"> <a href="/register"> Register</a></button>
      <input type="submit" value="Sign In" class="button">
    </div>
  </form>
</div>
<!-- partial -->
@endsection