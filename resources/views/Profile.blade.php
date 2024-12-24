@php
    $path = public_path('assets/JSON/states-cities.json');
    $path_course = public_path('assets/JSON/cource.json');
    $statesCities = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    $courses = file_exists($path_course) ? json_decode(file_get_contents($path_course), true) : [];
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">



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
    <div class="container">
        {{-- <div class="sidebar">
            <div class="profile-image">
                <img src="placeholder.png" alt="Profile Image">
                <div class="image-controls">
                    <button class="upload-button">&#8635;</button>
                    <button class="delete-button">&#128465;</button>
                </div>
            </div>
        </div> --}}
        <div class="sidebar">
            <div class="profile-image">
            @if(Auth::user()->profile_status == 'complete')
                <!-- Profile Picture Upload Form -->
                <form action="{{ route('profile.update.pic') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH') <!-- For update requests -->

                    <!-- Hidden File Input for Profile Picture -->
                    <input type="file" name="profile_pic" id="profile_pic" accept="image/*" hidden>

                    <!-- Display the Current Profile Picture or Default Avatar -->
                    <img id="profile_pic_preview"
                        src="{{ $profile->profile_pic ? asset('storage/' . $profile->profile_pic) : 'default-avatar.png' }}"
                        alt="Profile Pic" style="width: 100px; height: 100px;">

                    <!-- Controls Section Below the Profile Picture -->
                    <div class="profile-controls">
                        <!-- Button to Trigger File Selection with Refresh Icon -->
                        <button type="button" class="upload-button" onclick="document.getElementById('profile_pic').click()">&#8635;</button>

                        <!-- Upload and Delete Buttons -->
                        @if(!$profile->profile_pic)
                            <button type="submit" class="upload-text">Upload</button>
                        @else
                            <!-- Hidden input to trigger deletion when delete button is pressed -->
                            <input type="hidden" name="delete_picture" value="1">
                            <button type="submit" class="delete-button">&#128465;</button> <!-- Trash icon for delete -->
                        @endif
                    </div>
                </form>
                @endif
            </div>
        </div>



        <div class="main-content">
            <h2>Personal Details</h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form id="profile-form" action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <div class="name-fields">
                        <input type="text" name="first_name"
                            value="{{ old('first_name', $profile->first_name ?? '') }}" placeholder="First Name"
                            class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}>
                        <input type="text" name="middle_name"
                            value="{{ old('middle_name', $profile->middle_name ?? '') }}" placeholder="Middle Name"
                            class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}>
                        <input type="text" name="last_name"
                            value="{{ old('last_name', $profile->last_name ?? '') }}" placeholder="Last Name"
                            class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                        placeholder="Email" class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" name="phone_number"
                        value="{{ old('phone_number', $profile->phone_number ?? '') }}" placeholder="Phone Number"
                        class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="{{ old('dob', $profile->dob ?? '') }}"
                        placeholder="dd/mm/yyyy" class="{{ $profile ? 'editable' : '' }}"
                        {{ $profile ? 'disabled' : '' }}>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" id="age" value="{{ old('age', $profile->age ?? '') }}"
                        placeholder="Age" class="{{ $profile ? 'editable' : '' }}" readonly>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="gender-fields">
                        <input type="radio" name="gender" value="male"
                            {{ old('gender', $profile->gender ?? '') == 'male' ? 'checked' : '' }}
                            class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}> Male
                        <input type="radio" name="gender" value="female"
                            {{ old('gender', $profile->gender ?? '') == 'female' ? 'checked' : '' }}
                            class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}> Female
                        <input type="radio" name="gender" value="other"
                            {{ old('gender', $profile->gender ?? '') == 'other' ? 'checked' : '' }}
                            class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}> Other
                    </div>
                </div>
                <div class="form-group">
                    <label>Caste</label>
                    <select name="caste"
                        class="{{ $profile ? 'editable' : '' }}"class="{{ $profile ? 'editable' : '' }}"
                        {{ $profile ? 'disabled' : '' }}>
                        <option value="select">Select</option>
                        <option value="general"
                            {{ old('caste', $profile->caste ?? '') == 'general' ? 'selected' : '' }}>General</option>
                        <option value="sc" {{ old('caste', $profile->caste ?? '') == 'sc' ? 'selected' : '' }}>SC
                        </option>
                        <option value="st" {{ old('caste', $profile->caste ?? '') == 'st' ? 'selected' : '' }}>ST
                        </option>
                        <option value="obc" {{ old('caste', $profile->caste ?? '') == 'obc' ? 'selected' : '' }}>
                            OBC</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>State</label>
                    <select id="state" name="state"
                        class="{{ $profile ? 'editable' : '' }}"class="{{ $profile ? 'editable' : '' }}"
                        {{ $profile ? 'disabled' : '' }}>
                        <option value="">Select</option>
                        {{-- @foreach ($states as $state)
                            <option value="{{ $state }}">{{ $state }}</option>
                        @endforeach --}}
                        {{-- <option value="Gujarat" {{ old('state', $profile->state ?? '') == 'Gujarat' ? 'selected' : '' }}>Gujarat</option> --}}
                    </select>
                </div>

                <div class="form-group">
                    <label>District</label>
                    <select id="district" name="district"
                        class="{{ $profile ? 'editable' : '' }}"class="{{ $profile ? 'editable' : '' }}"
                        {{ $profile ? 'disabled' : '' }}>
                        <option value="select">Select</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Family Income</label>
                    <input type="text" name="family_income"
                        value="{{ old('family_income', $profile->family_income ?? '') }}" placeholder="Family Income"
                        class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}>
                </div>

                <h2>Current Education Details</h2>

                <div class="form-group">
                    <label>Course level</label>
                    <select name="course_level" id="course_level" class="{{ $profile ? 'editable' : '' }}"
                        {{ $profile ? 'disabled' : '' }}>
                        <option value="select">Select</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Course name</label>
                    <select name="course_name" id="course_name" class="{{ $profile ? 'editable' : '' }}"
                        {{ $profile ? 'disabled' : '' }}>
                        <option value="select">Select</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Total Marks</label>
                    <input type="text" name="total_marks" id="total_marks"
                        value="{{ old('total_marks', $profile->total_marks ?? '') }}" placeholder="Total Marks"
                        class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}>
                </div>
                <div class="form-group">
                    <label>Obtain Marks</label>
                    <input type="text" id="obtain_marks" name="obtain_marks"
                        value="{{ old('obtain_marks', $profile->obtain_marks ?? '') }}" placeholder="Obtain Marks"
                        class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}>
                </div>
                <div class="form-group">
                    <label>Percentage</label>
                    <input type="text" name="percentage" id="percentage"
                        value="{{ old('percentage', $profile->percentage ?? '') }}" placeholder="Percentage"
                        class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }} readonly>
                </div>
                <div class="form-group">
                    <label>Passing Year</label>
                    <input type="text" name="passing_year"
                        value="{{ old('passing_year', $profile->passing_year ?? '') }}" placeholder="Passing Year"
                        class="{{ $profile ? 'editable' : '' }}" {{ $profile ? 'disabled' : '' }}>
                </div>

                <div class="form-group">
                    @if ($profile)
                        <button type="button" id="edit-button" class="btn btn-primary">Edit</button>
                        <button type="submit" id="save-button" class="btn btn-success"
                            style="display: none;">Save</button>
                    @else
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/profile.js') }}"></script>
    <script>
        document.getElementById('edit-button')?.addEventListener('click', function() {
            var inputs = document.querySelectorAll('.editable');
            inputs.forEach(function(input) {
                input.disabled = false;
            });
            document.getElementById('edit-button').style.display = 'none';
            document.getElementById('save-button').style.display = 'block';
        });


        //calling function from dropdown.js
        var statesCities = @json($statesCities);
        var courses = @json($courses);

        document.addEventListener('DOMContentLoaded', function() {
            // State and City Dropdowns
            var stateSelect = document.getElementById('state');
            var citySelect = document.getElementById('district');
            var selectedState = "{{ old('state', $profile->state ?? '') }}";
            var selectedCity = "{{ old('district', $profile->district ?? '') }}";

            populateDropdown(statesCities, stateSelect, selectedState);

            if (selectedState) {
                populateRelatedDropdown(statesCities, selectedState, citySelect, selectedCity);
            }

            stateSelect.addEventListener('change', function() {
                var selectedState = stateSelect.value;
                if (selectedState) {
                    populateRelatedDropdown(statesCities, selectedState, citySelect);
                } else {
                    citySelect.innerHTML = '<option value="">Select</option>';
                }
            });

            // Course Level and Course Name Dropdowns
            var courseLevelSelect = document.getElementById('course_level');
            var courseNameSelect = document.getElementById('course_name');
            var selectedCourseLevel = "{{ old('course_level', $profile->course_level ?? '') }}";
            var selectedCourseName = "{{ old('course_name', $profile->course_name ?? '') }}";

            populateDropdown(courses, courseLevelSelect, selectedCourseLevel);

            if (selectedCourseLevel) {
                populateRelatedDropdown(courses, selectedCourseLevel, courseNameSelect, selectedCourseName);
            }

            courseLevelSelect.addEventListener('change', function() {
                var selectedCourseLevel = courseLevelSelect.value;
                if (selectedCourseLevel) {
                    populateRelatedDropdown(courses, selectedCourseLevel, courseNameSelect);
                } else {
                    courseNameSelect.innerHTML = '<option value="">Select</option>';
                }
            });
        });
    </script>

</body>

</html>
