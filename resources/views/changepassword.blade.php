<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
   
    <link href="{{ asset('assets/css/password.css') }}" rel="stylesheet">

   
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
        <a href="{{route('feedback.form')}}">FEEDBACK</a>
        <form id="logout-form" action="{{ route('account.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
    </nav>
</header>
<main>
    <div class="container">
        <h1>Change Password</h1>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="password" name="current_password" placeholder="Current Password" required>
                @error('current_password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-group">
                <input type="password" name="new_password" placeholder="New Password" required>
                @error('new_password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-group">
                <input type="password" name="new_password_confirmation" placeholder="Confirm New Password" required>
                @error('new_password_confirmation')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="save-btn">Save Password</button>
            <button type="reset" class="cancel-btn">Cancel</button>
        </form>
    </div>
</main>
</body>
</html>
