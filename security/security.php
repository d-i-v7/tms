<?php

if (isset($_SESSION['userActive'], $_SESSION['adminActive']) ||
    $_SESSION['userActive'] === true ||
    $_SESSION['adminActive'] === true ) {
    // User is both active and an admin, allow access
} else {
 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
 {
     $p ="https://";
     }
 else
 {
    $p= "http://";
} 
    $goUrl = $p.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $_SESSION['goUrl'] = $goUrl;
    // Redirect to the authentication page
    header("Location: auth");
    exit; // Ensure no further code is executed after the redirect
}
?>
