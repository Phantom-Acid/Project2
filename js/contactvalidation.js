document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("contact-form").addEventListener("submit", function(event) {
        // Retrieve form values
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;

        // Check if any required field is empty
        if (name === '' || email === '' || phone === '') {
            // Prevent form submission
            event.preventDefault();
            // Display error message
            alert("All fields are required. Please fill out all required fields.");
            return;
        }

        // Validate email format
        if (!isValidEmail(email)) {
            // Prevent form submission
            event.preventDefault();
            // Display error message
            alert("Please enter a valid email address which has . and @.");
        }

        // Validate phone number format
        if (!isValidPhoneNumber(phone)) {
            // Prevent form submission
            event.preventDefault();
            // Display error message
            alert("Please enter phone number in format (xxx)-(xxx)-(xxxx)");
        }
    });

    function isValidEmail(email) {
        // Regular expression to match email format
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidPhoneNumber(phoneNumber) {
        // Regular expression to match the format (xxx)-(xxx)-(xxxx)
        const phoneRegex = /^\d{3}-\d{3}-\d{4}$/;
        return phoneRegex.test(phoneNumber);
    }
});