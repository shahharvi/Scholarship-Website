<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link href="{{ asset('assets/css/feedback.css')}}" rel="stylesheet">
</head>
<body>
<header>
    <div class="logo">
        <img src="{{ asset('assets/img/homelogo.png') }}" alt="Scholar Logo" />
        <h3>Scholar</h3>
    </div>
    <nav>
        <a href="{{route('account.userdashboard')}}">DASHBOARD</a>
        <a href="{{route('searchandapply')}}">SEARCH & APPLY</a>
        <a href="{{route('profile.show')}} ">PROFILE</a>
        <a href="{{ route('password.change') }}">CHANGE PASSWORD</a>
        <a href="{{ route('feedback.form') }}">FEEDBACK</a>
        <form id="logout-form" action="{{ route('account.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
    </nav>
</header>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="feedback-container">
        <h2>We Value Your Feedback</h2>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" readonly>

            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>

            <label for="feedback_type">What is your feedback about?</label>
            <select name="feedback_type" id="feedback_type" required>
                <option value="general">General Feedback</option>
                <option value="issue">Report an Issue</option>
                <option value="suggestion">Suggestion</option>
            </select>

            <label for="message">Your Comments or Feedback</label>
            <textarea id="message" name="message" placeholder="Write your feedback here..." required></textarea>

            <input type="submit" value="Submit Feedback">
        </form>
    </div>

</body>
</html>
