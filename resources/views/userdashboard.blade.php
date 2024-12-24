<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Dashboard</title>

    <!-- Fonts  -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- main style -->
    <link href="{{ asset('assets/css/user_dashboard.css') }}" rel="stylesheet">

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
            <a href="{{route('searchandapply')}}">SEARCH & APPLY</a>
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
    {{-- {{ dd($profile->image) }} --}}
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                {{-- <img id="profileImage" src="{{ asset('assets/img/userprofile.png') }}" alt="Profile Picture" onclick="document.getElementById('profileImageInput').click();">
            <input type="file" id="profileImageInput" accept="image/*"> --}}

                <img id="profileImage"
                src="{{ !empty($profile->profile_pic) ? url('storage/' . $profile->profile_pic) : asset('assets/img/userprofile.png') }}"
                    alt="Profile  Picture">



                <h2>{{ $user->name }}</h2>
                <p>{{ $user->email }}</p>
                <p>Profile Status:
                    {{ Auth::user()->profile_status == 'complete' ? 'Profile Complete' : 'Profile Incomplete' }}</p>
            </div>
        </div>

        <div class="main">
            @if (Auth::user()->profile_status == 'incomplete')
                <!-- If profile is incomplete, show the instructions to complete the profile -->
                <div class="welcome-section">
                    <h2>Welcome to the Scholar App</h2>
                    <ul>
                        <li>1. Complete Your Profile: Fill in your personal, academic, and eligibility details to get
                            started.</li>
                        <li>2. Find Your Scholarships: Based on your profile, discover scholarships that perfectly match
                            your qualifications.</li>
                    </ul>
                </div>
            @else
                <!-- If profile is complete, show scholarship status and suggestions -->
                <div class="status">
                    <h2 style="text-align: center; margin: 1rem 0; font-size: 1.75rem;">Scholarship Application Status
                    </h2>
                    <div class="cards">

                        <div class="card">
                            <h3>Total Number of Scholarships</h3>
                            <p>{{ $totalScholarships }}</p>
                        </div>
                        <div class="card">
                            <h3>Number of Scholarships You're Eligible For</h3>
                            {{-- <p>{{$scholarships->count()}} </p> --}}
                           <p>{{$eligibleScholarshipsCount}}</p>
                        </div>

                    </div>
                    <div class="suggestions">

                        <!-- Scholarship Display Section -->
                        <h2 style="text-align: center; margin: 1rem 0; font-size: 1.75rem;">
                            Available Scholarships
                        </h2>

                        @if ($scholarships->isEmpty())
                            <p>No scholarships available for your profile at the moment.</p>
                        @else
                            {{-- <table class="table">
            <thead>
                <tr>
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Sponsor</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($scholarships as $index => $scholarship)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $scholarship->sname }}</td>
                        <td>{{ $scholarship->description }}</td>
                        <td>{{ $scholarship->s_provider }}</td>


                    </tr>
                @endforeach
            </tbody>
        </table> --}}

                            {{-- @foreach ($scholarships as $scholarship)
        <a href="{{ route('scholarshipdetail', $scholarship->id)}}" class="scholarship-card" >
            <div class="card-body">
                <h6 class="card-title">{{ $scholarship->sname }}</h6>
                <p class="card-text">{{ $scholarship->amount }}</p>
            </div>
        </a>

    @endforeach --}}

                            <ul class="scholarship-list">
                                @foreach ($scholarships as $scholarship)
                                    <li>
                                        @if ($loop->index < 4)
                                        <a href="{{ route('scholarshipdetail', $scholarship->id) }}"
                                            class="scholarship-card">
                                            <div class="card-body">
                                                <h3 class="card-title">{{ $scholarship->sname }}</h3>
                                                <h1 class="card-text">{{ $scholarship->amount }}</h1>
                                                <button class="view-more-btn">View More</button>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                            <!-- View All button appears if there are more than 4 scholarships -->
                            @if ($scholarships->count() > 4)
                                <div class="view-all-container">
                                    <a href="{{route('searchandapply')}}" class="view-all-btn">View All</a>
                                </div>
                            @endif
                        @endif
                    </div>
            @endif
        </div>
    </div>
    </div>

    <!-- js file -->
    <script src="{{ asset('assets/js/user_dashboard.js') }}"></script>
</body>

</html>
