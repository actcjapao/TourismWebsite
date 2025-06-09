@extends('layouts.public-master')
@section('view_title', 'Bohol Tours')

@section('view_content')
<!-- Top Info Bar (Desktop) -->
<div class="bg-orange text-white py-1 small d-none d-md-block fixed-top" id="topInfoBar">
  <div class="container d-flex justify-content-between align-items-center">
    <div>
      <i class="bi bi-telephone-fill me-2"></i> {{ $basicInfo->contact }}
      <span class="mx-3">|</span>
      <i class="bi bi-envelope-fill me-2"></i> {{ $basicInfo->email }}
    </div>
    <div>
      <i class="bi bi-geo-alt-fill me-2"></i> {{ $basicInfo->address }}
    </div>
  </div>
</div>

<!-- Collapsible Info Bar (Mobile Only) -->
<div class="d-md-none bg-orange text-white small fixed-top" id="mobileInfoBar">
  <div class="container py-1">
    <div class="d-flex justify-content-between align-items-center">
      <span class="fw-bold">MJ Bohol Tours</span>
      <button class="btn btn-sm btn-light text-orange fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#mobileContactInfo" aria-expanded="false">
        Contact Info <i class="bi bi-caret-down-fill ms-1"></i>
      </button>
    </div>
    <div class="collapse mt-2" id="mobileContactInfo">
      <div><i class="bi bi-telephone-fill me-2"></i> {{ $basicInfo->contact }}</div>
      <div><i class="bi bi-envelope-fill me-2"></i> {{ $basicInfo->email }}</div>
      <div><i class="bi bi-geo-alt-fill me-2"></i> {{ $basicInfo->address }}</div>
    </div>
  </div>
</div>

<!-- Adjusted Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" id="mainNavbar">
  <div class="container my-0 my-md-2">
    <a class="navbar-brand" href="#">
      <span class="text-orange fw-bold">MJ</span>BoholTours
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item mx-3"><a class="nav-link text-dark" href="#home">Home</a></li>
        <li class="nav-item mx-3"><a class="nav-link text-dark" href="#about">About Us</a></li>
        <li class="nav-item mx-3"><a class="nav-link text-dark" href="#tours">Featured</a></li>
      </ul>
    </div>
  </div>
</nav>


<!-- Hero Section with Full-width Image and Overlayed Text -->
<div class="hero-section position-relative text-white" id="home">
  <img class="img-fluid w-100" src="{{ asset('assets/images/chocolatehills-raw-opacity-min.jpg') }}" alt="Chocolate Hills">

  <!-- Text Content on Top of the Image -->
  <div class="hero-text position-absolute top-50 start-50 translate-middle text-center">
    <h1 class="display-5 fw-bold">Unforgettable Adventures with <span class="text-orange">MJ</span> Bohol Tours</h1>
    <p class="lead">Discover the magic of Bohol — from iconic hills to hidden gems, we bring the island to life just for you.</p>

    <div class="mt-5">
      <a href="#book" class="btn btn-orange btn-lg mt-3 mx-1">Start Your Journey</a>
      <a href="#tours" class="btn btn-orange-outline btn-lg mt-3 mx-1">Explore Tours</a>
    </div>
  </div>
</div>

<!-- About Us Section -->
<div class="container py-5" id="about">
  <div class="row align-items-center">
    <div class="col-md-6">
      <img src="{{ asset('assets/images/chocolatehills-raw-airial-view-1.png') }}" alt="Bohol Tour" class="img-fluid rounded shadow">
    </div>
    <div class="col-md-6 mt-4 mt-md-0">
      <h2 class="fw-bold mb-3">Who We Are</h2>
      <p class="text-muted">
        At <span class="text-orange fw-bold">MJ Bohol Tours</span>, we believe that every journey should be as unforgettable as the destination. Based in the heart of the island, we specialize in providing personalized, comfortable, and exciting van tours across Bohol’s most stunning landscapes and cultural landmarks.
      </p>
      <p class="text-muted">
        Whether you're marveling at the world-famous Chocolate Hills, cruising along the Loboc River, or meeting the tiny yet iconic tarsiers, we make sure every moment is one to remember. Our friendly and knowledgeable local guides are passionate about showcasing the best of Bohol—with safety, convenience, and your happiness as our top priorities.
      </p>
      <p class="text-muted">
        Join us and discover why Bohol is one of the Philippines’ top destinations. With <strong>MJ Bohol Tours</strong>, your adventure begins the moment you step aboard.
      </p>
    </div>
  </div>
</div>

<!-- Tourist Spots Section -->
<div class="container py-5" id="tours">
  <h2 class="text-center fw-bold mb-5">Featured Tourist Spots in Bohol</h2>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

    @foreach($destinations as $d)
      @if ($d->status == "featured")
        <div class="col" destination-id="{{ $d->destination_id }}">
          <div class="card h-100 shadow-sm">
            <div class="ratio ratio-4x3">
              <img src="{{ asset($d->local_url) }}" class="card-img-top object-fit-cover" alt="{{ $d->alt }}">
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold">{{ $d->name }}</h5>
              <p class="card-text text-muted">
                <i class="bi bi-geo-alt-fill text-orange me-2"></i>{{ $d->address }}
              </p>
              <small class="text-secondary d-block mt-2">Source: {{ $d->source }}</small>
            </div>
          </div>
        </div>
      @endif
    @endforeach

  </div>
</div>


<!-- Booking Section -->
<div class="container py-5 bg-light" id="book">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h2 class="text-center fw-bold mb-4">Book Your Bohol Adventure</h2>
      <p class="text-center text-muted mb-4">Choose your destination, set your date, and we'll handle the rest!</p>

      <form action="{{ route('booking.submit')}}" method="POST" id="submitBookingForm">
        @csrf

        <!-- Full Name -->
        <div class="mb-3">
          <label for="fullname" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Your full name">
        </div>

        <!-- Email Address -->
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.com">
        </div>

        <!-- Contact Number -->
        <div class="mb-3">
          <label for="contact_number" class="form-label">Contact Number</label>
          <input type="tel" class="form-control" id="contact_number" name="contact_number" placeholder="e.g. +63 912 345 6789">
        </div>

        <!-- Destinations Dropdown with List -->
        <div class="mb-3">
          <label for="destinationDropdown" class="form-label">Select Destination(s)</label>
          <select id="destinationDropdown" class="form-select">
            <option selected disabled>Choose a destination</option>
            @foreach($destinations as $d)
              <option value="{{ $d->destination_id }}" data-name="{{ $d->name }}">{{ $d->name }}</option>
            @endforeach
          </select>

          <!-- Hidden inputs to store multiple selected destinations -->
          <div id="selectedDestinations" class="mt-3 d-flex flex-wrap gap-2"></div>
        </div>

        <!-- Number of Guests -->
        <div class="mb-3">
          <label for="guests" class="form-label">Number of Guests</label>
          <input type="number" class="form-control" id="guests" name="guests" min="1" max="30" placeholder="e.g. 2 persons">
        </div>

        <!-- Pickup Location and Time -->
        <div class="mb-3">
          <div class="row">
            <!-- Pickup Location -->
            <div class="col-md-7">
              <label for="tour_date" class="form-label">Select Tour Date</label>
              <input type="date" class="form-control" id="tour_date" name="tour_date">
            </div>

            <!-- Pickup Time -->
            <div class="col-md-5">
              <label for="pickup_time" class="form-label">Pickup Time</label>
              <input type="time" class="form-control" id="pickup_time" name="pickup_time">
            </div>
          </div>
        </div>

        <!-- Pickup Location -->
        <div class="mb-3">
          <label for="pickup_location" class="form-label">Pickup Location</label>
          <input type="text" class="form-control" id="pickup_location" name="pickup_location" placeholder="Enter your hotel or location">
        </div>

         <!-- Notes -->
        <div class="mb-3">
          <label for="notes" class="form-label">Notes (optional)</label>
          <textarea class="form-control" name="notes" id="notes" cols="30" rows="5"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-5">
          <button type="submit" class="btn btn-orange btn-lg px-4" id="btnSubmitBooking">Submit Booking</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Testimonials Section -->
<div class="container py-5" id="testimonials">
  <h2 class="text-center fw-bold mb-4">What Our Guests Say</h2>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <div class="col">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <p class="text-muted">"Super sulit! Our family enjoyed every moment — van was clean, driver was very kind."</p>
          <h6 class="fw-bold text-orange mb-0">John D.</h6>
          <small class="text-muted">Cebu City</small>
        </div>
      </div>
    </div>
    <!-- Add more testimonials as needed -->
  </div>
</div>

<!-- Why Choose Us Section -->
<div class="bg-light py-5" id="why">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Why Choose <span class="text-orange">MJ Bohol Tours</span>?</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="p-3">
          <i class="bi bi-person-check-fill fs-1 text-orange"></i>
          <h5 class="fw-bold mt-2">Friendly Local Guides</h5>
          <p class="text-muted small">Our drivers know the island like the back of their hand.</p>
        </div>
      </div>
      <div class="col">
        <div class="p-3">
          <i class="bi bi-wallet2 fs-1 text-orange"></i>
          <h5 class="fw-bold mt-2">Affordable Packages</h5>
          <p class="text-muted small">We make exploring Bohol accessible to every budget.</p>
        </div>
      </div>
      <div class="col">
        <div class="p-3">
          <i class="bi bi-shield-check fs-1 text-orange"></i>
          <h5 class="fw-bold mt-2">Safe & Comfy Rides</h5>
          <p class="text-muted small">Well-maintained vans with air-conditioning and licensed drivers.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="bg-white border-top mt-5">
  <div class="container py-4">
    <div class="row gy-4 gy-md-0">
      
      <!-- Company Info -->
      <div class="col-md-4">
        <h5 class="text-orange fw-bold">{{ $basicInfo->site }}</h5>
        <p class="text-muted small mb-1">Affordable van tours around Bohol, perfect for families and group getaways.</p>
        <p class="text-muted small mb-0">
          <i class="bi bi-geo-alt-fill me-1 text-orange"></i> {{ $basicInfo->address }}<br>
          <i class="bi bi-envelope-fill me-1 text-orange"></i> {{ $basicInfo->email }}<br>
          <i class="bi bi-telephone-fill me-1 text-orange"></i> {{ $basicInfo->contact }}
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4">
        <h6 class="fw-bold">Quick Links</h6>
        <ul class="list-unstyled text-muted small">
          <li><a href="#about" class="text-decoration-none text-muted">About Us</a></li>
          <li><a href="#tours" class="text-decoration-none text-muted">Featured Tours</a></li>
          <li><a href="#book" class="text-decoration-none text-muted">Book Now</a></li>
          <li><a href="#" class="text-decoration-none text-muted">FAQs</a></li>
          <li><a href="#" class="text-decoration-none text-muted">Resource Attributions</a></li>
        </ul>
      </div>

      <!-- Social Media -->
      {{-- <div class="col-md-4">
        <h6 class="fw-bold">Follow Us</h6>
        <div class="d-flex gap-3">
          <a href="#" class="text-orange fs-5"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-orange fs-5"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-orange fs-5"><i class="bi bi-twitter-x"></i></a>
        </div>
        <p class="text-muted small mt-3">Let’s stay connected and make your next trip extra special!</p>
      </div> --}}

    </div>
  </div>
  <div class="bg-light text-center text-muted py-3 small">
    © {{ date('Y') }} MJ Bohol Tours. All rights reserved.
  </div>
</footer>

<!-- Booking Confirmation Modal -->
<div class="modal fade" id="bookingConfirmationModal" tabindex="-1" aria-labelledby="bookingConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-body text-center p-5">
        <div class="text-success mb-4">
          <i class="bi bi-check-circle-fill display-4"></i>
        </div>
        <h4 class="mb-3 fw-semibold">Booking Successfully Submitted!</h4>
        <p class="text-muted mb-4">
          Thank you for booking with <span class="text-orange"><strong>MJ Bohol Tours</strong></span>!<br>
          One of our friendly team members will reach out via email and phone to confirm your booking details.
        </p>
        <button type="button" class="btn btn-outline-success px-4" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('view_scripts')
  <script>
  
    $(document).ready(function () {
      // load defaults
      disablePastDatesOnInput();

      // Smooth scroll for links with hashes (e.g., #home, #about, etc.)
      $("a[href^='#']").on('click', function (e) {
        e.preventDefault(); // Prevent default anchor link behavior

        // Get the target hash (the section ID)
        var target = this.hash;
        scrollNavigate(target);
      });
      
      const selectedValues = new Set();
      let selectedDestArray = [];
      const $dropdown = $("#destinationDropdown");
      const $selectedList = $("#selectedDestinations");

      $dropdown.on("change", function () {
        const selectedOption = $(this).find(":selected");
        const value = selectedOption.val(); // ID
        const name = selectedOption.data("name") || selectedOption.text(); // Display name fallback

        if (value && !selectedDestArray.includes(value)) {
          selectedDestArray.push(value);

          const $hiddenInput = $("<input>", {
            type: "hidden",
            name: "destinations[]",
            value: value,
            "data-destination": value
          });

          const $pill = $(`
            <div class="badge bg-orange text-white d-flex align-items-center" style="padding: 0.6em 0.8em;">
              ${name}
              <button type="button" class="btn-close btn-close-white btn-sm ms-2" aria-label="Remove" data-destination="${value}"></button>
            </div>
          `);

          $pill.find("button").on("click", function () {
            const dest = $(this).data("destination");
             // ✅ Update selected destination_ids
            selectedDestArray = selectedDestArray.filter(item => item !== dest.toString());
            console.log("selectedDestArray", selectedDestArray);
            $selectedList.find(`input[data-destination="${dest}"]`).remove(); // ✅ Remove hidden input
            $(this).parent().remove(); // ✅ Remove pill
          });

          $selectedList.append($hiddenInput).append($pill);
          $dropdown.prop("selectedIndex", 0);
        }
      });

      function resetBookingForm() {
        $('#submitBookingForm')[0].reset();
        selectedDestArray.length = 0;
        $("#selectedDestinations").empty();
      }

      $("#submitBookingForm").submit(function(e) {
        e.preventDefault();
        loadingState($('#btnSubmitBooking'), true, 'Loading...');

        const fullnameInput = $('#fullname');
        const emailInput = $('#email');
        const contactInput = $('#contact_number');
        const destinationsInput = $('#destinationDropdown');
        const guestsInput = $('#guests');
        const tourDateInput = $("#tour_date");
        const pickUpTimeInput = $("#pickup_time");
        const pickUpLocation = $('#pickup_location');
        const notesInput = $('#notes');

        if (
          !notEmpty(fullnameInput) || 
          !notEmpty(emailInput) || 
          !notEmpty(contactInput) || 
          selectedDestArray.length === 0 || 
          !notEmpty(guestsInput) || 
          !notEmpty(tourDateInput) || 
          !notEmpty(pickUpTimeInput) || 
          !notEmpty(pickUpLocation)
        ) {
          if(selectedDestArray.length === 0) {
            destinationsInput.addClass("is-invalid");
            destinationsInput.focus();
          } else {
            destinationsInput.removeClass("is-invalid");

            showNotyf("Please fill-in the required fields", "error");
            loadingState($('#btnSubmitBooking'), false, 'Submit Booking');
          }
        } else {
          const csrfToken = $('meta[name="csrf-token"]').attr('content');
          const fullname = fullnameInput.val();
          const email = emailInput.val();
          const contact = contactInput.val();
          const destinations = selectedDestArray;
          const guests = guestsInput.val()

          // Format tour date to mm/dd/yyyy
          let tourDate = "";
          // default format: yyyy-mm-dd
          const dateValue = tourDateInput.val();
          // change format: mm-dd-yyyy
          if (dateValue) {
            const [yyyy, mm, dd] = dateValue.split("-");
            tourDate = `${mm}/${dd}/${yyyy}`;
          }

          // Format pickup time to hh:mm AM/PM
          let pickupTime = "";
          // deafualt: 24-hour format
          const pickupTimeValue = pickUpTimeInput.val();

          if (pickupTimeValue) {
            const [hour, minute] = pickupTimeValue.split(":");
            let hourNum = parseInt(hour);
            const ampm = hourNum >= 12 ? 'PM' : 'AM';
            hourNum = hourNum % 12 || 12;
            pickupTime = `${hourNum}:${minute} ${ampm}`;
          }

          const pickupLocation =pickUpLocation.val();
          const notes = notesInput.val();

          const formData = {
            _token: csrfToken,
            fullname,
            email,
            contact,
            destinations: destinations.join(','),
            number_of_guests: guests,
            tour_date: tourDate,
            pickup_time: pickupTime,
            pickup_location: pickupLocation,
            notes
          }

          $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
              const { status, message } = response;

              if (status == 200) {
                // Show the confirmation modal
                const bookingModal = new bootstrap.Modal(document.getElementById('bookingConfirmationModal'));
                bookingModal.show();

                resetBookingForm();
                // showNotyf(message);
                loadingState($('#btnSubmitBooking'), false, 'Submit Booking');

                // auto-hide after 10 seconds
                setTimeout(() => bookingModal.hide(), 10000);
              }
            },
            error: function(xhr) {
              if (xhr.status == 419) {
                  console.log("Unauthorized"); // no token error
              } else if (xhr.status == 422) {
                  showNotyf("Please fill-in the required fields", "error");
                  console.log(
                      `Missing Params - Resulted to "${xhr.statusText}" error.`
                  );
              } else if (xhr.status == 500) {
                  console.log("Internal Server Error"); // unknow error
              }
              loadingState($('#btnSubmitBooking'), false, 'Submit Booking');
            }
          });
        }
      });

      function disablePastDatesOnInput() {
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const dd = String(today.getDate()).padStart(2, '0');

        const minDate = `${yyyy}-${mm}-${dd}`;
        document.getElementById("tour_date").setAttribute("min", minDate);
      }
    });
  </script>
@endsection