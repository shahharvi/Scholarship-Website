document.getElementById('file-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-pic').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

function removeImage() {
    document.getElementById('profile-pic').src = 'profile-placeholder.png';
    document.getElementById('file-input').value = ''; // Clear the file input
}
//base onn the date of birth -Age
document.addEventListener('DOMContentLoaded', function() {
    const dobInput = document.getElementById('dob');
    const ageInput = document.getElementById('age');

    function calculateAge() {
        const dob = new Date(dobInput.value);
        if (!isNaN(dob.getTime())) { // Check if the date is valid
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDiff = today.getMonth() - dob.getMonth();

            // Adjust age if the current month is before the birth month
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            ageInput.value = age;
        } else {
            ageInput.value = ''; // Clear age if the date is invalid
        }
    }

    dobInput.addEventListener('change', calculateAge);
});

//All the state
function updateDistricts() {
    const stateSelect = document.getElementById('state');
    const districtSelect = document.getElementById('district');
    const selectedState = stateSelect.value;
const districts = {
    "Andhra Pradesh": ["Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Nellore", "Srikakulam", "Visakhapatnam", "West Godavari", "YSR Kadapa"],
    "Arunachal Pradesh": ["Changlang", "Dibang Valley", "Kra Daadi", "Kurung Kumey", "Lohit", "Lower Dibang Valley", "Lower Subansiri", "Namsai", "Papum Pare", "Tawang"],
    "Assam": ["Barpeta", "Bongaigaon", "Cachar", "Darrang", "Dhemaji", "Dibrugarh", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur"],
    "Bihar": ["Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Buxar", "Darbhanga", "Gaya", "Jammu", "Jahanabad"],
    "Chhattisgarh": ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Janjgir-Champa"],
    "Goa": ["North Goa", "South Goa"],
    "Gujarat": ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Dahod", "Dang", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kutch", "Kheda", "Mahisagar", "Mehsana", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"],
    "Haryana": ["Ambala", "Bhiwani", "Faridabad", "Fatehabad", "Gurgaon", "Hisar", "Jind", "Kaithal", "Karnal", "Mahendergarh"],
    "Himachal Pradesh": ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul and Spiti", "Mandi", "Shimla", "Sirmaur"],
    "Jharkhand": ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Jamtara"],
    "Karnataka": ["Bagalkot", "Bangalore Rural", "Bangalore Urban", "Belgaum", "Bellary", "Bidar", "Bijapur", "Chikballapur", "Chikkamagaluru", "Chitradurga"],
    "Kerala": ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad"],
    "Madhya Pradesh": ["Balaghat", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhindwara", "Dewas", "Dhar", "Guna", "Gwalior"],
    "Maharashtra": ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli"],
    "Manipur": ["Bishnupur", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl"],
    "Meghalaya": ["East Garo Hills", "East Khasi Hills", "Jaintia Hills", "North Garo Hills", "South Garo Hills", "West Garo Hills", "West Khasi Hills"],
    "Mizoram": ["Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip"],
    "Nagaland": ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Phek", "Peren", "Tuensang", "Wokha"],
    "Odisha": ["Angul", "Balasore", "Bargarh", "Baripada", "Bhadrak", "Berhampur", "Bhubaneswar", "Cuttack", "Dhenkanal", "Ganjam"],
    "Punjab": ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana"],
    "Rajasthan": ["Ajmer", "Alwar", "Banswara", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu"],
    "Sikkim": ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"],
    "Tamil Nadu": ["Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kancheepuram", "Kanyakumari", "Karur", "Madurai"],
    "Telangana": ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar Bhupalpally", "Jogulamba Gadwal", "Kamareddy", "Karimnagar", "Khammam"],
    "Tripura": ["Dhalai", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"],
    "Uttar Pradesh": ["Agra", "Aligarh", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Azamgarh", "Badaun", "Baghpat", "Bahraich"],
    "Uttarakhand": ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal", "Pithoragarh", "Rudraprayag"],
    "West Bengal": ["Bankura", "Bardhaman", "Birbhum", "Burdwan", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri"]
};

 // Clear current options
districtSelect.innerHTML = '<option value="">Select District</option>';

// Populate new options based on selected state
if (selectedState && districts[selectedState]) {
    districts[selectedState].forEach(district => {
        const option = document.createElement('option');
        option.value = district;
        option.textContent = district;
        districtSelect.appendChild(option);
    });
}}

//All the courses
const courses = {
    "primary": ["Primary School (Classes 1-5)"],
    "middle": ["Middle School (Classes 6-8)"],
    "high": ["High School (Classes 9-10)"],
    "senior-secondary": ["Senior Secondary School (Classes 11-12)"],
    "diploma": [
        "Polytechnic Diploma",
        "ITI Certificate"
    ],
    "undergraduate": [
        "Arts (BA)",
        "Science (BSc)",
        "Commerce (BCom)",
        "Engineering (BE/BTech)",
        "Technology (BTech)",
        "Business Administration (BBA)",
        "Computer Applications (BCA)",
        "Education (BEd)",
        "Law (LLB)",
        "Design (BDes)",
        "Pharmacy (BPharm)",
        "Medicine (MBBS)"
    ],
    "postgraduate": [
        "Arts (MA)",
        "Science (MSc)",
        "Commerce (MCom)",
        "Engineering (ME/MTech)",
        "Business Administration (MBA)",
        "Computer Applications (MCA)",
        "Education (MEd)",
        "Law (LLM)",
        "Design (MDes)",
        "Pharmacy (MPharm)",
        "Medicine (MD, MS)"
    ]
};

function updateCourseNames() {
    const courseLevel = document.getElementById('course-level').value;
    const courseNameSelect = document.getElementById('course-name');

    // Clear existing options
    courseNameSelect.innerHTML = '<option value="">Select Course Name</option>';

    // Add new options based on selected course level
    if (courses[courseLevel]) {
        courses[courseLevel].forEach(course => {
            const option = document.createElement('option');
            option.value = course;
            option.textContent = course;
            courseNameSelect.appendChild(option);
        });
    }
}
//calculatePercentage
function calculatePercentage() {
    const totalMarks = document.getElementById('total-marks').value;
    const obtainedMarks = document.getElementById('obtained-marks').value;
    if (totalMarks && obtainedMarks) {
        const percentage = (obtainedMarks / totalMarks) * 100;
        document.getElementById('percentage').value = percentage.toFixed(2); // Rounded to 2 decimal places
    } else {
        document.getElementById('percentage').value = '';
    }
}