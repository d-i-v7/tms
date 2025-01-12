let loginForm = document.getElementById("loginForm");
let emailInput = document.getElementById("email");
let emailError = document.getElementById("emailError");
let passwordInput = document.getElementById("password");
let passwordError = document.getElementById("passwordError");

loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
let signInBtn = document.getElementById("signInBtn");
signInBtn.innerHTML = `<img width="30px" src = '../images/loading-gif.gif'>`;
setTimeout(()=>{


    // Reset styles and error messages
    emailInput.style.border = "";
    passwordInput.style.border = "";
    emailError.innerHTML = "";
    passwordError.innerHTML = "";

    // Check if fields are empty
    let formIsValid = true;
    if (emailInput.value === "" && passwordInput.value === "") {
        emailInput.style.border = "1px solid red";
        passwordInput.style.border = "1px solid red";
        emailError.innerHTML = "Email is required!";
        passwordError.innerHTML = "Password is required!";
        formIsValid = false;
        signInBtn.innerHTML = "Sign In Me";
    } else if (emailInput.value === "") {
        emailInput.style.border = "1px solid red";
        emailError.innerHTML = "Email is required!";
        formIsValid = false;
        signInBtn.innerHTML = "Sign In Me";
    } else if (passwordInput.value === "") {
        passwordInput.style.border = "1px solid red";
        passwordError.innerHTML = "Password is required!";
        formIsValid = false;
        signInBtn.innerHTML = "Sign In Me";
    }
    else
    {
        
    }

    // Form Submission Function
    let submitLoginForm =async ()=>
        {
            $.ajax({
                type: "POST",
                url: "../apis/api.php",
                data: {"action":"getApi","email":$("#email").val()},
                dataType: "json",
                success:async function (response) {
                    if(response.status == "success")
                    {
                              // Storing Form Data
                let loginForm = document.getElementById("loginForm");
                let formData = new FormData(loginForm);
                formData.append("action","login");
                let userApi = response.userApi;
                let apiPassword = response.apiPassword;
                formData.append("userApi",userApi);
                formData.append("apiPassword",apiPassword);
                let url = "../apis/api.php";
                let options = 
                {
                    method:"POST",
                    body:formData
                }
                try
                {
                    let request =await  fetch(url,options);
                    response = await request.json();
                    if(response.status=='success')
                    {
                        $.notify(response.message,"success");
                            setTimeout(()=>{window.location.href=response.goUrl},500);
                                signInBtn.innerHTML = "Sign In Me";

                        console.log(response.message)
                    }
                    else if(response.status=='error')
                    {
                        let emailInput = document.getElementById("email");
                        let emailError = document.getElementById("emailError");
                        let passwordInput = document.getElementById("password");
                        let passwordError = document.getElementById("passwordError");
                        // EMail And PAssword Errors
                        if(response.input =='email' && response.input == 'password')
                        {
                            emailInput.style.border = '1px solid red';
                            emailError.innerHTML = response.message;
                            passwordInput.style.border = '1px solid red';
                            passwordError.innerHTML = response.message;
                        }
                       else if(response.input =='email')
                        {
                            emailInput.style.border = '1px solid red';
                            emailError.innerHTML = response.message;
                            signInBtn.innerHTML = "Sign In Me";
                        }
                        else if(response.input == 'password')
                        {
                            passwordInput.style.border = '1px solid red';
                            passwordError.innerHTML = response.message;
                            signInBtn.innerHTML = "Sign In Me";
                        }
                        else
                        {
                            $.notify(response.message,"error");
                            signInBtn.innerHTML = "Sign In Me";
                        }

                    }
                }
                catch(e)
                {
                    console.error(e);
                }
                            }
                            else if(response.status=="error")
                            {
                                $.notify(response.message, "error");    
                                        signInBtn.innerHTML = "Sign In Me";
                  
                              }
                            else
                            {
                                $.notify("Something went wrong!", "error");
                                        signInBtn.innerHTML = "Sign In Me";

                            }
                },
                error(error)
                {
                    console.log(error);
                }
            });
        }

        // Reload The Function
    if (!formIsValid) return; // Prevent form submission if validation fails

    if(formIsValid)
    {
        submitLoginForm();
    }

   

},500);
});

