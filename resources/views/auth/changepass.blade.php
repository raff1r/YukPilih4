@extends('template.auth')

<!-- partial:index.partial.html -->
@section('content')
<div class="login-form">
  <form method="post" action="/changepassword">
    @csrf
    <h1>CHANGE PASSWORD</h1>
    <div class="content">
      <div class="input-field">
        <input type="password" placeholder="Old Password" autocomplete="off" required name="oldpass">
      </div>

      <div class="input-field">
        <input type="password" placeholder="New Password" autocomplete="off" required name="newpass">
      </div>

      <div class="input-field">
        <input type="password" placeholder="New Password Confirmation" autocomplete="off" required name="newpass_confirmation">
      </div>
    </div>
    <div class="action">
      <input type="submit" value="Change Password" class="button">
    </div>
  </form>
</div>
<!-- partial -->
@endsection