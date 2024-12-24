<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Details</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">



    {{-- <!-- Fonts  -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #7c6969;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            height: 60px;
        }

        header .logo {
            display: flex;
            align-items: center;
        }

        header .logo img {
            height: 40px;
            margin-right: 10px;
        }

        header nav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 6px 12px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 5px;
            margin-right: 10px;
            border: none;
            border-radius: 30px;
        }

        header nav a:hover {
            background-color: #ddd;
            color: #0A4368;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #0c4a73;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }
    </style>

    {{-- <link href="{{ asset('assets/css/user_dashboard_card.css') }}" rel="stylesheet"> --}}


</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('assets/img/homelogo.png') }}" alt="Scholar Logo" />
            <h3>Scholar</h3>
        </div>
        <nav>
            <a href="{{ route('account.userdashboard') }}">DASHBOARD</a>
            <a href="{{ route('searchandapply') }}">SEARCH & APPLY</a>
            <a href="{{ route('profile.show') }} ">PROFILE</a>
            <a href="{{ route('password.change') }}">CHANGE PASSWORD</a>
            <a href="#">HELP</a>
            <form id="logout-form" action="{{ route('account.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
        </nav>
    </header>

    <div class="container mt-5">
        <h2>{{ $scholarship->sname }}</h2>
        <p><strong>Amount:</strong> {{ $scholarship->amount }}</p>
        <p><strong>Description:</strong> {{ $scholarship->description }}</p>
        <p><strong>Provider:</strong> {{ $scholarship->s_provider }}</p>
        <p><strong>Course Name:</strong> {{ $scholarship->course_name }}</p>
        <p><strong>Percentage:</strong> {{ $scholarship->percentage }}</p>
        <p><strong>Caste:</strong> {{ $scholarship->caste }}</p>
        <p><strong>State:</strong> {{ $scholarship->state }}</p>
        <p><strong>Family income:</strong> {{ $scholarship->family_income }}</p>
        <p><strong>Scholarship Link:</strong> <a href="{{ $scholarship->Scholarship_link }}"
                target="_blank">{{ $scholarship->Scholarship_link }}</a></p>
        <!-- Cancel Button -->
        <a href="{{ route('account.userdashboard') }}" class="btn btn-secondary">Cancel</a>
    </div>

</body>

</html>
