<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Scholar</title>


    <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- main style   -->
  <link href="{{ asset('assets/css/Aboutus.css') }}" rel="stylesheet">
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
      <a href="{{ route('REGISTERED_INSTITUTES') }}">REGISTERED INSTITUTES</a>
      <a href="{{ route('aboutus') }}">ABOUT US</a>
      <a href="{{ route('home') }}">HOME</a>
    </div>
  </div>

    <div class="container">
        <div class="about-section">
            <div class="about-text">
                <h2>About Us</h2>
                <p>
                    At Scholar, we are dedicated to empowering students by connecting them with the right scholarship opportunities. Our platform is designed to simplify the process of finding scholarships that match your unique profile and eligibility criteria. By filling out your personal and educational details, we help you discover scholarships that best suit your needs, saving you time and effort.
                </p>
                <p>
                    Our mission is to make education accessible to everyone by providing a user-friendly platform where students can effortlessly filter and apply for scholarships based on their academic background, interests, and qualifications. Whether you're pursuing higher education or looking for financial aid, we are here to guide you every step of the way.
                </p>
                <p>
                    Join us and unlock your path to success with personalized scholarship opportunities tailored just for you!
                </p>
            </div>
            <div class="about-image">
                <img src="assets/img/Aboutus.jpg" alt="Scholarship Graduation Image">
            </div>
        </div>
    </div>
<!-- Footer Section -->
 <footer class="footer">
            <div class="footer-container">
                <div class="footer-section about">
                    <h2 class="footer-logo">Call to Action:</h2>
                    <p>"Unlock your future today with ScholarLink. Start by creating your profile, and let us match you with the scholarships that can help fund your academic journey. Don’t let financial barriers stop you—discover scholarships that can make your dreams a reality."</p>

                </div>

                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                    <li><i class="fas fa-home"></i> <a href="{{ route('home') }}">Home</a></li>
                    <li><i class="fas fa-info-circle"></i><a href="{{ route('aboutus') }}"> About Us</a></li>
                    <li><i class="fas fa-university"></i> Registered Institutes</a></li>
                    <li><i class="fas fa-question-circle"></i> <a href="{{ url('/faq') }}">FAQs</a></li>
                    </ul>
                </div>

                <div class="footer-section contact">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-envelope"></i> scholar@gmail.com</p>
                    <p><i class="fas fa-phone"></i> 0123456789</p>
                    <p><i class="fas fa-map-marker-alt"></i> Charotar University of Science & Technology CHARUSAT Campus Off. Nadiad-Petlad Highway, Changa 388 421 Anand, Gujarat, INDIA</p>
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
                <p>&copy; 2022 Scholar. All rights reserved. <a href="#">Terms & Conditions</a> · <a href="#">Privacy Policy</a></p>
            </div>
        </footer>
</body>
</html>
