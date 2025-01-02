<?php
// Varibles
$host_name="localhost";
$host_user_name="root";
$host_user_password="";
$Db_name="tms";

// Start Connection Function\
$conn = mysqli_connect($host_name,$host_user_name,$host_user_password,$Db_name);

// Check Connection Code

// To Check Un Comment This Code ⬇️

// if($conn)
// {
//     echo "Successfully connected!";
// }
// else
// {
//     echo mysqli_connect_error();
// }
?>