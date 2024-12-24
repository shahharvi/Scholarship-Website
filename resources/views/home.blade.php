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
  <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">


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
      <a href="{{ url('/faq') }}">FAQ</a>
      <!-- <a href="#">MEDIA</a> -->
      <a href="{{ route('REGISTERED_INSTITUTES') }}">REGISTERED INSTITUTES</a>
      <a href="{{ route('aboutus') }}">ABOUT US</a>
      <a href="#">HOME</a>
    </div>
  </div>

  <div class="container">
    <div class="slider">
      <div class="slide active">
        <img src="assets/img/Scholarship_1.png" alt="Slide 1">

        <div class="text">
          <!-- <div class="content">

          </div> -->
          <h1 style="text-align: left;">Welcome to the Scholar!</h1>
          <p>Unlock Your Future with Scholarships</p>
          <p>At Scholar, we are dedicated to helping students <br>
            achieve their academic dreams by providing access<br>
            to numerous scholarship opportunities.<a href="#" class="cta">Learn More</a></p>

        </div>

      </div>
      <div class="slide">
        <img src="assets/img/Second_slide.jpg" alt="Slide 2">
        <div class="text1">
        <h1 style="text-align: left;">Welcome to the Scholar!</h1>
          <p>Unlock Your Future with Scholarships</p>
          <p>At Scholar, we are dedicated to helping students <br>
            achieve their academic dreams by providing access<br>
            to numerous scholarship opportunities.<a href="#" class="cta">Learn More</a></p>

        </div>
      </div>
      <div class="prev" onclick="prevSlide()">&lt;</div>
      <div class="next" onclick="nextSlide()">&gt;</div>
    </div>
  </div>

  <div class="steps-container">
        <h2>Steps to Follow to Get a <span class="highlight">Scholarship</span></h2>
        <div class="steps">
            <div class="step">
                <div class="icon"><img src="assets/img/register-icon.jpg" alt="Register Icon"></div>
                <h3>Register and Create Your Profile</h3>
                <p>Provide some basic details super-quick and get registered with us.</p>
            </div>
            <div class="step">
                <div class="icon"><img src="assets/img/notification-icon.jpg" alt="Notification Icon"></div>
                <h3>Get Notified About Matching Scholarships</h3>
                <p>Receive scholarship notifications that perfectly match your profile.</p>
            </div>
            <div class="step">
                <div class="icon"><img src="assets/img/apply-icon.jpg" alt="Apply Icon"></div>
                <h3>Apply for Scholarships</h3>
                <p>Choose from 15,000+ scholarships, as per your need and eligibility.</p>
            </div>
            <div class="step">
                <div class="icon"><img src="assets/img/become-scholar-icon.jpg" alt="Become Scholar Icon"></div>
                <h3>Become a Scholar</h3>
                <p>Kickstart your academic journey by becoming a scholar.</p>
            </div>
        </div>
    </div>



    <div class="partner-container">
        <div class="content">
            <h2>Partner With Us!</h2>
            <p> <strong>Empower the Next Generation of Talent</strong></p>
            <p>Join us in creating meaningful opportunities for students! By partnering with us, you can make a direct impact on students' lives, helping them access the education they deserve and shaping a brighter future.</p>
            <button>Explore Partnership Avenues</button>
        </div>
    </div>

    <div class="feedback-scroll">
    <div class="feedback-box">
        <p>"ScholarLink helped me find scholarships I never knew existed! The process was so easy, and I feel more confident about my education." – <strong>Emma S.</strong></p>
    </div>
    <div class="feedback-box">
        <p>"As a first-generation student, I had no idea how to apply for scholarships. ScholarLink guided me every step of the way, and now I have funding for my degree!" – <strong>Michael R.</strong></p>
    </div>
    <div class="feedback-box">
        <p>"Thanks to ScholarLink, I was able to find multiple scholarships that matched my background. It was such a relief to know I wasn't missing out!" – <strong>Sarah J.</strong></p>
    </div>
    <div class="feedback-box">
        <p>"The personalized scholarship recommendations were incredibly helpful. I can’t believe how much easier it is to search with ScholarLink!" – <strong>John K.</strong></p>
    </div>
    <div class="feedback-box">
        <p>"ScholarLink made my scholarship search so much easier and saved me hours of time!" – <strong>Lisa T.</strong></p>
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
    </div>

    <!-- Font Awesome CDN for Icons (include this in your project) -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


  <!-- js file -->
  <script src="{{ asset('assets/js/home.js') }}"></script>

</body>

</html>
