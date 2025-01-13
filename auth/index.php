<?php
error_reporting(0);
session_start();
if (isset($_SESSION['userActive'], $_SESSION['adminActive']) ||
    $_SESSION['userActive'] === true ||
    $_SESSION['adminActive'] === true) 
    {
        $goUrl = $_SESSION['goUrl'];
        // Redirect to the authentication page
        header("Location: $goUrl");
        exit; // Ensure no further code is executed after the redirect
    // User is both active and an admin, allow access
} else {

}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:title" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
    <title>Login Form</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<img src="../images/logo-full.png" alt="">
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form id="loginForm">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input id="email" name="email" type="email" class="form-control">
                                            <label class="text-danger" id="emailError"></label>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input id="password" name="password" type="password" class="form-control">
                                            <label class="text-danger" id="passwordError"></label>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <!-- <div class="custom-control custom-checkbox ml-1">
													<input id="remember" name="remember" type="checkbox" class="custom-control-input">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div> -->
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" id="signInBtn" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <!-- <p>Don't have an account? <a class="text-primary" href="page-register.html">Sign up</a></p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
	<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>
    <script src="../js/demo.js"></script>
    <script src="../js/styleSwitcher.js"></script>
    <script src="../vendor/notify/notify.min.js"></script>
    <script src="../vendor/notify/notify.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>