



// Profile Request
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
                $(".profileImage").attr("src", response.userProfile);
                $(".coverImage").html(`<img width="100%" src='${response.userCover}'>`);
            }
            else if(response.status == "error")
            {
                console.log(response.message);
            }
        }
    });
}

// Reload Profile
setInterval(()=>{readProfile()},1000);

// End Api Request

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
