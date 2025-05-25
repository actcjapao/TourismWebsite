@extends('layouts.public-master')
@section('view_title', 'Login')

@section('view_content')
<div class="container py-5 bg-light" id="book">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h2 class="text-center fw-bold mb-4">Book Your Bohol Adventure</h2>
      <p class="text-center text-muted mb-4">Choose your destination, set your date, and we'll handle the rest!</p>

      <form action="#" method="POST">
        @csrf

        <!-- Full Name -->
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Your full name" required>
        </div>

        <!-- Email Address -->
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.com" required>
        </div>

        <!-- Contact Number -->
        <div class="mb-3">
          <label for="contact_number" class="form-label">Contact Number</label>
          <input type="tel" class="form-control" id="contact_number" name="contact_number" placeholder="e.g. +63 912 345 6789" required>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-5">
          <button type="submit" class="btn btn-orange btn-lg px-4">Submit Booking</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection