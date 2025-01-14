

$(document).ready(function () {
    


// Profile Read Request
function readProfile()
{
    $.ajax({
        type: "POST",
        url: "apis/api.php",
        data: {"action":"readProfile"},
        dataType: "json",
        success: function (response) {
            if(response.status == "success")
            {
                $(".profileUserName").html(response.userName);
                $(".profileUserRole").html(response.userRole);
                $(".profileUserEmail").html(response.email);
                $(".phoneNumber").html(response.phone);
                $(".profileUserEmail").html(response.email);
                $(".profileImage").attr("src", response.userProfile);
                $(".coverImage").html(`<img width="100%" height="100%" src='${response.userCover}'>`);
            }
            else if(response.status == "error")
            {
                console.log(response.message);
            }
        }
    });
}
// Read Inputs
function readSProfile()
{
    $.ajax({
        type: "POST",
        url: "apis/api.php",
        data: {"action":"readProfile"},
        dataType: "json",
        success: function (response) {
            if(response.status == "success")
            {
              
                $(".userNameAsValue").val(response.userName);
                $(".emailAsValue").val(response.email);
                $(".phoneNumber").val(response.phone);
            }
            else if(response.status == "error")
            {
                console.log(response.message);
            }
        }
    });
}
readSProfile();
// Reload Profile
// readProfile();
setInterval(()=>{readProfile()},1000);

// End Api Request


// Cover Update Request
$(document).on("change", "#updateCover", function (e) {
    // Get the input element and the selected file
    let inputElement = e.target;
    let file = inputElement.files[0]; // Get the first file

    if (file) {
        // Create FormData object
        let formData = new FormData();
        formData.append("updateCover", file); // Append the file with a key, e.g., "file"
        formData.append("action", "updateCover"); // Add additional form data

        // Send the AJAX request
        $.ajax({
            type: "POST",
            url: "apis/api.php", // Update with your API endpoint
            data: formData,
            dataType: "json", // Expect JSON response
            contentType: false, // Required for FormData
            processData: false, // Prevents jQuery from processing FormData
            success: function (response) {
                if (response.status === "error") {
                    console.log("Error:", response.message);
                } else {
                    console.log("Success:", response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    } else {
        console.log("No file selected.");
    }
});
// End Cover Request End Here



// Profile Update Request
$(document).on("change", "#updateProfile", function (e) {
    // Get the input element and the selected file
    let inputElement = e.target;
    let file = inputElement.files[0]; // Get the first file

    if (file) {
        // Create FormData object
        let formData = new FormData();
        formData.append("updateProfile", file); // Append the file with a key, e.g., "file"
        formData.append("action", "updateProfile"); // Add additional form data

        // Send the AJAX request
        $.ajax({
            type: "POST",
            url: "apis/api.php", // Update with your API endpoint
            data: formData,
            dataType: "json", // Expect JSON response
            contentType: false, // Required for FormData
            processData: false, // Prevents jQuery from processing FormData
            success: function (response) {
                if (response.status === "error") {
                    console.log("Error:", response.message);
                } else {
                    console.log("Success:", response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    } else {
        console.log("No file selected.");
    }
});
// End Profile Request End Here


$(document).on("submit", "#accountUpdate", function (e) {
    e.preventDefault();
    let isValid = true;

    // Clear previous error messages and styles
    $(".error-message").remove();
    $(".form-control").removeClass("is-invalid");

    // Full Name Validation
    const fullNameInput = $("#fullName");
    const fullName = fullNameInput.val().trim();
    if (!fullName) {
        fullNameInput.addClass("is-invalid").after('<div class="error-message text-danger">Full Name is required.</div>');
        isValid = false;
    }

    // Email Validation
    const emailInput = $("#email");
    const email = emailInput.val().trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email) {
        emailInput.addClass("is-invalid").after('<div class="error-message text-danger">Email is required.</div>');
        isValid = false;
    } else if (!emailRegex.test(email)) {
        emailInput.addClass("is-invalid").after('<div class="error-message text-danger">Please enter a valid email address.</div>');
        isValid = false;
    }

      // Phone Number Validation
      const phoneNumberInput = $("#phone");
      const phone = phoneNumberInput.val().trim();
      if (!phone) {
        phoneNumberInput.addClass("is-invalid").after('<div class="error-message text-danger">Phone Number is required.</div>');
          isValid = false;
      }

    // Current Password Validation
    const currentPasswordInput = $("#currentPassword");
    const currentPassword = currentPasswordInput.val().trim();
    if (!currentPassword) {
        currentPasswordInput.addClass("is-invalid").after('<div class="error-message text-danger">Current Password is required.</div>');
        isValid = false;
    }

    // New Password Validation
    // const newPasswordInput = $("#newPassword");
    // const newPassword = newPasswordInput.val().trim();
    // if (!newPassword) {
    //     newPasswordInput.addClass("is-invalid").after('<div class="error-message text-danger">New Password is required.</div>');
    //     isValid = false;
    // } else if (newPassword.length < 6) {
    //     newPasswordInput.addClass("is-invalid").after('<div class="error-message text-danger">New Password must be at least 6 characters long.</div>');
    //     isValid = false;
    // }

    // If all inputs are valid, submit the form via AJAX
    if (isValid) {
        let form = document.getElementById("accountUpdate");
        const formData = new FormData(form);
        formData.append("action", "accountUpdate");
        // formData.append("fullName", fullName);
        // formData.append("email", email);
        // formData.append("currentPassword", currentPassword);
        // formData.append("newPassword", newPassword);

        $.ajax({
            type: "POST",
            url: "apis/api.php",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    // alert(response.message);
                    readSProfile();
                    $.notify(response.message,"success");
                    $("#accountUpdate")[0].reset();
                } else if (response.status === "error") {
                    // Display error messages for each invalid input
                    response.errors.forEach(error => {
                        const inputElement = $(`#${error.input}`);
                        inputElement.addClass("is-invalid").after(`<div class="error-message text-danger">${error.message}</div>`);
                    });
                }
            },
            error: function () {
                alert("An error occurred while processing your request. Please try again.");
            }
        });
    }
});


});