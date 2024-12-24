<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Dashboard</title>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- Charting Library -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/homelogo.png') }}" alt="Home Logo">
        <span class="d-none d-lg-block">Scholars</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-menu-button-wide"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-menu-button-wide"></i><span>User Master</span>
        </a>
      </li>
     <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Category Master</span>
        </a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.studentmaster') }}">
          <i class="bi bi-journal-text"></i><span>Student Master</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.scholarshipmaster') }}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Scholarship Master</span>
        </a>
      </li>
     <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-gem"></i><span>Permission Master</span>
        </a>
      </li>-->
      <li class="nav-item">
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <a class="nav-link collapsed" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="bi bi-box-arrow-right"></i><span>Logout</span>
        </a>
      </li>
    </ul>
  </aside><!-- End Sidebar -->

  <!-- ======= Main Content ======= -->
  <main id="main" class="main">
  <div class="main-card-body">
    <h5 class="main-card-title">Reports <span>/Today</span></h5>
    <div id="loginsChart"></div>
  </div>
  </main><!-- End Main Content -->

  <!-- ======= Footer ======= -->
  <!-- Uncomment footer if needed -->

  <!-- Chart Rendering Script -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const loginData = @json($loginsPerMonth);

      const months = loginData.map(item => item.month);
      const loginCounts = loginData.map(item => item.login_count);

      const options = {
        series: [{
          name: 'User Logins',
          data: loginCounts
        }],
        chart: {
          type: 'line',
          height: 350
        },
        xaxis: {
          categories: months,
          title: {
            text: 'Month'
          }
        },
        yaxis: {
          title: {
            text: 'Number of Logins'
          }
        },
        colors: ['#007bff'],
        stroke: {
          curve: 'smooth'
        }
      };

      const chart = new ApexCharts(document.querySelector("#loginsChart"), options);
      chart.render();
    });
  </script>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
