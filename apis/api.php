<?php
include("../security/why.php");
// Calling Connection File
header('Content-Type: application/json');

// Allow CORS for all origins (optional, for development purposes)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Action
if(isset($_POST['action']))
{
    $action = $_POST['action'];
    if(function_exists($action))
    {

    }
    else
    {
        echo json_encode(value: ['status'=>'error','message'=>'Invalid action']);
    }
}
else
{
    echo json_encode(value: ['status'=>'error','message'=>'Action Is Required!']);
}



// Qaybtaan Ku Shaqeey Abdirhamaan ⬇️
?>