@extends('layouts.public-master')
@section('view_title', 'Bohol Tours')

@section('view_content')
<!-- Top Info Bar (Desktop) -->
<div class="bg-orange text-white py-1 small d-none d-md-block fixed-top" id="topInfoBar">
  <div class="container d-flex justify-content-between align-items-center">
    <div>
      <i class="bi bi-telephone-fill me-2"></i> +63 912 345 6789
      <span class="mx-3">|</span>
      <i class="bi bi-envelope-fill me-2"></i> info@mjboholtours.com
    </div>
    <div>
      <i class="bi bi-geo-alt-fill me-2"></i> Danao, Bohol
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
      <div><i class="bi bi-telephone-fill me-2"></i> +63 912 345 6789</div>
      <div><i class="bi bi-envelope-fill me-2"></i> info@mjboholtours.com</div>
      <div><i class="bi bi-geo-alt-fill me-2"></i> Danao, Bohol</div>
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

    <!-- Card 1 -->
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="{{ asset('assets/images/chocolatehills-raw-airial-view-1.png') }}" class="card-img-top" alt="Chocolate Hills">
        <div class="card-body">
          <h5 class="card-title fw-bold">Chocolate Hills</h5>
          <p class="card-text text-muted"><i class="bi bi-geo-alt-fill text-orange me-2"></i>Carmen, Bohol</p>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="{{ asset('assets/images/chocolatehills-raw-airial-view-1.png') }}" class="card-img-top" alt="Loboc River Cruise">
        <div class="card-body">
          <h5 class="card-title fw-bold">Loboc River Cruise</h5>
          <p class="card-text text-muted"><i class="bi bi-geo-alt-fill text-orange me-2"></i>Loboc, Bohol</p>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="{{ asset('assets/images/chocolatehills-raw-airial-view-1.png') }}" class="card-img-top" alt="Tarsier Sanctuary">
        <div class="card-body">
          <h5 class="card-title fw-bold">Tarsier Sanctuary</h5>
          <p class="card-text text-muted"><i class="bi bi-geo-alt-fill text-orange me-2"></i>Corella, Bohol</p>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="{{ asset('assets/images/chocolatehills-raw-airial-view-1.png') }}" class="card-img-top" alt="Panglao Beach">
        <div class="card-body">
          <h5 class="card-title fw-bold">Panglao Beach</h5>
          <p class="card-text text-muted"><i class="bi bi-geo-alt-fill text-orange me-2"></i>Panglao, Bohol</p>
        </div>
      </div>
    </div>

    <!-- Card 5 -->
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="{{ asset('assets/images/chocolatehills-raw-airial-view-1.png') }}" class="card-img-top" alt="Man-Made Forest">
        <div class="card-body">
          <h5 class="card-title fw-bold">Man-Made Forest</h5>
          <p class="card-text text-muted"><i class="bi bi-geo-alt-fill text-orange me-2"></i>Bilar, Bohol</p>
        </div>
      </div>
    </div>

  </div>
</div>


<!-- Booking Section -->
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

        <!-- Destinations Dropdown with List -->
        <div class="mb-3">
          <label for="destinationDropdown" class="form-label">Select Destination(s)</label>
          <select id="destinationDropdown" class="form-select">
            <option selected disabled>Choose a destination</option>
            @foreach(['Chocolate Hills', 'Loboc River Cruise', 'Tarsier Sanctuary', 'Panglao Beach', 'Man-Made Forest'] as $destination)
              <option value="{{ $destination }}">{{ $destination }}</option>
            @endforeach
          </select>

          <!-- Hidden inputs to store multiple selected destinations -->
          <div id="selectedDestinations" class="mt-3 d-flex flex-wrap gap-2"></div>
        </div>

        <!-- Number of Guests -->
        <div class="mb-3">
          <label for="guests" class="form-label">Number of Guests</label>
          <input type="number" class="form-control" id="guests" name="guests" min="1" max="20" placeholder="e.g. 2 persons" required>
        </div>

        <!-- Pickup Location and Time -->
        <div class="mb-3">
          <div class="row">
            <!-- Pickup Location -->
            <div class="col-md-7">
              <label for="tour_date" class="form-label">Select Tour Date</label>
              <input type="date" class="form-control" id="tour_date" name="tour_date" required>
            </div>

            <!-- Pickup Time -->
            <div class="col-md-5">
              <label for="pickup_time" class="form-label">Pickup Time</label>
              <input type="time" class="form-control" id="pickup_time" name="pickup_time" required>
            </div>
          </div>
        </div>

        <!-- Pickup Location -->
        <div class="mb-3">
          <label for="pickup_location" class="form-label">Pickup Location</label>
          <input type="text" class="form-control" id="pickup_location" name="pickup_location" placeholder="Enter your hotel or location" required>
        </div>

         <!-- Notes -->
        <div class="mb-3">
          <label for="notes" class="form-label">Notes (optional)</label>
          <textarea class="form-control" name="notes" id="notes" cols="30" rows="5"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-5">
          <button type="submit" class="btn btn-orange btn-lg px-4">Submit Booking</button>
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
        <h5 class="text-orange fw-bold">MJ Bohol Tours</h5>
        <p class="text-muted small mb-1">Affordable van tours around Bohol, perfect for families and group getaways.</p>
        <p class="text-muted small mb-0">
          <i class="bi bi-geo-alt-fill me-1 text-orange"></i> Danao, Bohol<br>
          <i class="bi bi-envelope-fill me-1 text-orange"></i> info@mjboholtours.com<br>
          <i class="bi bi-telephone-fill me-1 text-orange"></i> +63 912 345 6789
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


@endsection

@section('view_scripts')
  <script>
    $(document).ready(function () {
      // Smooth scroll for links with hashes (e.g., #home, #about, etc.)
      $("a[href^='#']").on('click', function (e) {
        e.preventDefault(); // Prevent default anchor link behavior

        // Get the target hash (the section ID)
        var target = this.hash;
        scrollNavigate(target);
      });

      const $dropdown = $("#destinationDropdown");
      const $selectedList = $("#selectedDestinations");

      const selectedValues = new Set();

      $dropdown.on("change", function () {
        const value = $(this).val();

        if (value && !selectedValues.has(value)) {
          selectedValues.add(value);

          // Create hidden input for form submission
          const $hiddenInput = $("<input>", {
            type: "hidden",
            name: "destinations[]",
            value: value,
            "data-destination": value
          });

          // Create visual pill element
          const $pill = $(` 
            <div class="badge bg-orange text-white d-flex align-items-center" style="padding: 0.6em 0.8em;">
              ${value}
              <button type="button" class="btn-close btn-close-white btn-sm ms-2" aria-label="Remove" data-destination="${value}"></button>
            </div>
          `);

          // Remove logic
          $pill.find("button").on("click", function () {
            const dest = $(this).data("destination");
            selectedValues.delete(dest);
            $selectedList.find(`input[data-destination="${dest}"]`).remove();
            $pill.remove();
          });

          // Append to list
          $selectedList.append($hiddenInput).append($pill);

          // Reset dropdown
          $dropdown.prop("selectedIndex", 0);
        }
      });
    });
  </script>
@endsection