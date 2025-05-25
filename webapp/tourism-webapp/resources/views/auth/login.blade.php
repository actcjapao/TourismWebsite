@extends('layouts.public-master')
@section('view_title', 'Login')

@section('view_content')
<div class="container py-5 mt-5">
  <div class="row">
    <div class="col-sm-3"></div>  
    <div class="col-sm-6 justify-content-center bg-light pt-4 pb-5 px-5">
      <h2 class="text-center fw-bold mb-4">Login Account</h2>
      <form action="#" method="POST">
        @csrf

        <!-- Username -->
        <div class="mb-2">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" >
        </div>

        <!-- Password -->
        <div class="mb-2">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-5">
          <button type="submit" class="btn btn-orange btn-lg px-4">Login</button>
        </div>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>
@endsection