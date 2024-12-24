<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registered Institutes</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
      <!-- main style   -->
      <link href="{{ asset('assets/css/registerinstitute.css') }}" rel="stylesheet">


</head>

<body>

<div class="navbar">
    <div class="homelogo">
      <img class="logo_img" src="{{ asset('assets/img/homelogo.png') }}" alt="Scholar Logo">
      Scholar
    </div>

    <div class="topnav">
      @if (Route::has('account.login'))
      <nav class="-mx-3 flex flex-1 justify-end">
        @auth
         @if (Auth::user()->role == 'admin')
          <a href="{{ route('admin.dashboard') }}" class="btn">
            Admin Dashboard
          </a>
        @else
          <a href="{{ route('account.userdashboard') }}" class="btn">
            User Dashboard
          </a>
        @endif
        @else
        <a href="{{ route('account.login') }}" class="btn">
          Log in
        </a>
        @if (Route::has('account.register'))
      <a href="{{ route('account.register') }}" class="btn">
        Register
      </a>
      @endif
        @endauth
      </nav>
      @endif
      <a href="{{ route('faq') }}">FAQ</a>
      <!-- <a href="#">MEDIA</a> -->
      <a href="#">REGISTERED INSTITUTES</a>
      <a href="{{ route('aboutus') }}">ABOUT US</a>
      <a href="{{ route('home') }}">HOME</a>
    </div>
  </div>

  
  <div class="institute-container">
  <h1 class="institute-title">Registered Institutes</h1>

    <!-- Filter Options -->
    <div class="search-filter-container">
  <div class="search-filter-row">
    <div class="search-filter-column">
      <input type="text" id="searchInstitute" class="search-input" placeholder="Search by Institute Name">
    </div>
    <div class="search-filter-column">
      <select class="filter-dropdown" id="filterLocation">
        <option value="">Filter by Location</option>
        <!-- Example options -->
        <option value="Delhi">Delhi</option>
        <option value="Mumbai">Mumbai</option>
        <option value="Bangalore">Bangalore</option>
      </select>
    </div>
    <div class="search-filter-column">
      <select class="filter-dropdown" id="filterType">
        <option value="">Filter by Type</option>
        <!-- Example options -->
        <option value="University">University</option>
        <option value="College">College</option>
        <option value="School">School</option>
      </select>
    </div>
  </div>
</div>


<!-- List of Institutes -->
<div class="institute-list">
  <!-- Example of a single institute card -->
  <div class="institute-card">
    <div class="institute-card-content">
      <div class="institute-details">
        <h5 class="institute-name">Charotar University of Science and Technology</h5>
        <p class="institute-location"><strong>Location:</strong> CHARUSAT Campus, Off. Nadiad-Petlad Highway, Changa-388421</p>
        <p class="institute-type"><strong>Type:</strong> University</p>
        <p class="institute-scholarships"><strong>Scholarships:</strong> 7 Offered</p>
      </div>
      <div class="institute-actions">
        <button class="view-details-btn">View Details</button>
      </div>
    </div>
  </div>

  <div class="institute-card">
    <div class="institute-card-content">
      <div class="institute-details">
        <h5 class="institute-name">XYZ College</h5>
        <p class="institute-location"><strong>Location:</strong> xyz</p>
        <p class="institute-type"><strong>Type:</strong> College</p>
        <p class="institute-scholarships"><strong>Scholarships:</strong> 8 Offered</p>
      </div>
      <div class="institute-actions">
        <button class="view-details-btn">View Details</button>
      </div>
    </div>
  </div>
</div>
<a href="{{ route('home') }}" class="cancel-btn">Cancel</a>


    <footer class="footer">
      <div class="footer-container">
        <div class="footer-section about">
          <h2 class="footer-logo">Call to Action:</h2>
          <p>"Unlock your future today with ScholarLink. Start by creating your profile, and let us match you with the
            scholarships that can help fund your academic journey. Don’t let financial barriers stop you—discover
            scholarships that can make your dreams a reality."</p>

        </div>

        <div class="footer-section">
          <h3>Quick Links</h3>
          <ul>
            <li><i class="fas fa-home"></i> Home</li>
            <li><i class="fas fa-info-circle"></i> About Us</li>
            <li><i class="fas fa-university"></i> Registered Institutes</li>
            <li><i class="fas fa-question-circle"></i> FAQs</li>
          </ul>
        </div>

        <div class="footer-section contact">
          <h3>Contact Us</h3>
          <p><i class="fas fa-envelope"></i> scholar@gmail.com</p>
          <p><i class="fas fa-phone"></i> 0123456789</p>
          <p><i class="fas fa-map-marker-alt"></i> Charotar University of Science & Technology CHARUSAT Campus Off.
            Nadiad-Petlad Highway, Changa 388 421 Anand, Gujarat, INDIA</p>
        </div>

        <div class="footer-section">
          <h3>Social Media</h3>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2022 Scholar. All rights reserved. <a href="#">Terms & Conditions</a> · <a href="#">Privacy Policy</a>
        </p>
      </div>
    </footer>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>