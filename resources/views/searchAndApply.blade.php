<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SearchAndApply</title>

        <!-- Fonts  -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- main style -->
    <link href="{{ asset('assets/css/searchandapply.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">





    </head>
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
            <a href="{{route('feedback.form')}}">FEEDBACK</a>
            <form id="logout-form" action="{{ route('account.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
        </nav>
    </header>


    <div class="search-container">
        <form method="GET" action="{{ route('searchandapply') }}">
            <input type="text" name="query" placeholder="Search scholarships by name..." class="search-bar" value="{{ request()->query('query') }}">
            <button type="submit" class="search-btn">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>


    <ul class="scholarship-list">
        @if ($scholarships->isEmpty())
        <p>No scholarships found.</p>
    @else
        @foreach ($scholarships as $scholarship)
            <li>
                <a href="{{ route('scholarshipdetail', $scholarship->id) }}"
                    class="scholarship-card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $scholarship->sname }}</h3>
                        <h1 class="card-text">{{ $scholarship->amount }}</h1>
                        <button class="view-more-btn">View More</button>
                    </div>
                </a>
            </li>
        @endforeach
        @endif
    </ul>


    <script>


        // Wait for the page to load completely
        window.addEventListener('DOMContentLoaded', (event) => {
            // Check if there is a search query
            const query = '{{ request()->query('query') }}';
            const scholarshipList = document.getElementById('scholarshipList');

            if (query && scholarshipList) {
                // Hide the list if a search query is present
                scholarshipList.style.display = 'none';
            }
        });
    </script>
</body>

</html>
