//dyanamically fatched data from JSON for dropdown

// Common function to populate dropdown based on a key-value pair
function populateDropdown(data, selectElement, selectedValue = '') {
    var sortedKeys = Object.keys(data).sort();
    selectElement.innerHTML = '<option value="">Select</option>';

    sortedKeys.forEach(function(key) {
        var option = document.createElement('option');
        option.value = key;
        option.text = key;

        // Check if the option was previously selected
        if (key === selectedValue) {
            option.selected = true;
        }
        selectElement.add(option);
    });
}

// Common function to populate related dropdown values
function populateRelatedDropdown(data, key, relatedSelectElement, selectedValue = '') {
    var sortedValues = data[key].sort();
    relatedSelectElement.innerHTML = '<option value="">Select</option>';

    sortedValues.forEach(function(value) {
        var option = document.createElement('option');
        option.value = value;
        option.text = value;

        // Check if the option was previously selected
        if (value === selectedValue) {
            option.selected = true;
        }
        relatedSelectElement.add(option);
    });
}


//calculates age from date of birth
document.addEventListener('DOMContentLoaded', function() {
    var dobInput = document.getElementById('dob');
    var ageInput = document.getElementById('age');

    if (dobInput) {
        console.log("DOB input found");
        dobInput.addEventListener('change', function() {
            console.log("DOB changed:", this.value);
            var dob = new Date(this.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var monthDiff = today.getMonth() - dob.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            console.log("Calculated Age:", age);
            //ageInput.value = age > 0 ? age : '';
            document.getElementById('age').value = age;
        });
    } else {
        document.getElementById('age').value = '';
        console.log("DOB input not found");
    }
});

//calculatePercentage
document.addEventListener('DOMContentLoaded', function() {
    const totalMarksInput = document.getElementById('total_marks');
    const obtainedMarksInput = document.getElementById('obtain_marks');

    function calculatePercentage() {
        const totalMarks = parseFloat(totalMarksInput.value);
        const obtainedMarks = parseFloat(obtainedMarksInput.value);

        if (!isNaN(totalMarks) && !isNaN(obtainedMarks) && totalMarks > 0) {
            const percentage = (obtainedMarks / totalMarks) * 100;
            document.getElementById('percentage').value = percentage.toFixed(2); // Rounded to 2 decimal places
            console.log("Calculated percentage:", percentage);
        } else {
            document.getElementById('percentage').value = ''; // Clear the field if input is invalid
            console.log("Input not valid or not found");
        }
    }

    totalMarksInput.addEventListener('input', calculatePercentage);
    obtainedMarksInput.addEventListener('input', calculatePercentage);
});



