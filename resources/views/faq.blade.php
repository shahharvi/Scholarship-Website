<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Home</title>

  <!-- Fonts  -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- main style   -->
  <link href="{{ asset('assets/css/faq.css') }}" rel="stylesheet">
  <style>
    /* .logo_img{
        filter: brightness(200%) ;
    } */
  </style>

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
  <section class="faq-section">
        <h2>FAQ</h2>
        <div class="accordion">
            <div class="accordion-item">
                <button class="accordion-header">What does this scholarship platform do?</button>
                <div class="accordion-content">
                    <p>This platform helps students find scholarships based on their background, eligibility, and other criteria.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">Do you provide scholarships directly?</button>
                <div class="accordion-content">
                    <p>No, we help students find scholarships; the application process is handled by the respective institutes.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">How do you determine my eligibility for scholarships?</button>
                <div class="accordion-content">
                    <p>We use the information you provide in your profile to filter scholarships that match your eligibility criteria.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">What kind of information do I need to provide to use this platform?</button>
                <div class="accordion-content">
                    <p>You need to provide your educational background, caste, and other details to find the best-matching scholarships.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">Is there a fee to use this platform?</button>
                <div class="accordion-content">
                    <p>No, this platform is completely free to use.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">How accurate is the scholarship filtering process?</button>
                <div class="accordion-content">
                    <p>We strive to ensure high accuracy in filtering scholarships based on the data you provide.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">Can I apply for scholarships directly through your platform?</button>
                <div class="accordion-content">
                    <p>Our platform provides a list of scholarships, but applications must be made through the respective scholarship websites.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">How frequently is the scholarship database updated?</button>
                <div class="accordion-content">
                    <p>We regularly update our scholarship database to ensure you have access to the latest opportunities.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">What should I do if I don't qualify for any of the scholarships listed?</button>
                <div class="accordion-content">
                    <p>We recommend updating your profile to ensure it reflects the most accurate information, or searching for new opportunities in the future.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">Can I use this platform if I'm not a student in India?</button>
                <div class="accordion-content">
                    <p>At the moment, we primarily focus on scholarships available to students in India. However, we may include international opportunities in the future.</p>
                </div>
            </div>
        </div>

    </section>
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

    <script src="{{ asset('assets/js/FAQ.js') }}"></script>
</body>
</html>
