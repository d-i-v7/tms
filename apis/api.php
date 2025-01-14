<?php
session_start();
// Calling Connection File
include("../config/conn.php");
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
        $action($conn);
    }
    else
    {
        echo json_encode( ['status'=>'error','message'=>'Invalid action']);
        // include("../security/why.php");
    }
}
else
{
    echo json_encode( ['status'=>'error','message'=>'Action Is Required!']);
    include("../security/why.php");
}





//   Read And Check The Api Key Using User Email
function getApi($conn)
{
  extract($_POST);
//   Read And Check The Api Key
$select = mysqli_query($conn,"SELECT * FROM bilisan_apis WHERE email = '$email'");
if($select && mysqli_num_rows($select)==1)
{
    $row = mysqli_fetch_assoc($select);
    $userApi=$row['userKey'];
    $apiPassword = $row['userPassword'];
    echo json_encode(['status'=>'success','userApi'=>"$userApi",'apiPassword'=>"$apiPassword"]);
}
else if($select && mysqli_num_rows($select) > 1)
{
    echo json_encode(['status'=>'error','message'=>'Sorry! A Bilicsan Tech License May not be used by more than one person.']);
}
else if($select && mysqli_num_rows($select)<1)
{
    echo json_encode(['status'=>'error','message'=>'Before using this service you must have the license provided by the Bilicsan Tech']);
}
}

// Login Api
function login($conn)
{
 extract($_POST);
// echo json_encode(['status'=>'success',$apiPassword,$userApi]);
//  Api Validation
 if(empty($userApi) && empty($apiPassword))
 {
    echo json_encode(['status'=>'error','message'=>'Api Key Is Required']);
 }#form Validation
 else  if(empty($email) && empty($password))
 {
    echo json_encode(['status'=>'error','message'=>'Please Submit A Complete Form']);
 }
 else
 {
    // Checking the api is correct or!
    // $readApi = mysqli_query($conn,"SELECT * FROM bilisan_apis WHERE userKey = '$userApi' AND userPassword = '$apiPassword'");
    // if($readApi && mysqli_num_rows($readApi)>0)
    // {
        $selectEmail = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
        if($selectEmail && mysqli_num_rows($selectEmail)>0)
        {
            $selectPassword = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' AND password = '$password'");
            if($selectPassword && mysqli_num_rows($selectPassword)>0)
            {
                $row = mysqli_fetch_assoc($selectPassword);
                $role = $row['role'];
                $userId = $row['id'];
                $status = $row['status'];
                if($role == 'Admin')
                {
                    if($status == 'active')
                    {
                        if(isset($_SESSION['goUrl']))
                        {
                        $goUrl = $_SESSION['goUrl'];
                        }
                        else
                        {
                            $goUrl = "../";
                        }
                        echo json_encode(['status'=>'success','message'=>'Successfully Logged In','goUrl'=>"$goUrl"]);
                        $_SESSION['adminActive'] = true;
                        $_SESSION['userId'] = $userId;
                    }
                    else if($status == 'inactive')
                    {
                        echo json_encode(['status'=>'error','message'=>'Sorry The System Is Not Active']);
                    }
                    else
                    {
                        echo json_encode(['status'=>'error','message'=>'Some Thing Went Wrong']);
                    }
                }
                else if($role == 'User')
                {
                    if($status == 'active')
                    {
                        echo json_encode(['status'=>'success','message'=>'Successfully Logged In','goUrl'=>"$goUrl"]);
                        $_SESSION['userActive'] = true;
                        $_SESSION['userId'] = $userId;
                    }
                    else if($status == 'inactive')
                    {
                        echo json_encode(['status'=>'error','message'=>'Sorry The System Is Not Active']);
                    }
                    else
                    {
                        echo json_encode(['status'=>'error','message'=>'Some Thing Went Wrong']);
                    }
                }
                else
                {
                    echo json_encode(['status'=>'error','message'=>'Some Thing Went Wrong']);
                }
            }
            else
            {
                echo json_encode(['status'=>'error','input'=>'password','message'=>'Password Is Not Valid!']);
            }
        }
        else
        {
            echo json_encode(['status'=>'error','input'=>'email','message'=>'Email Is Not Valid!']);
        }
    // }
    // else
    // {
    //     echo json_encode(['status'=>'error','message'=>'The api you are using is incorrect, please contact bilicsan tech']);
    // }
 }
}

// Profile Logic Start Here
function readProfile ($conn)
{
    $userId = $_SESSION['userId'];
    $select = mysqli_query($conn , "SELECT * FROM users WHERE id = '$userId'");
    if($select && mysqli_num_rows($select)>0)
    {
        $row = mysqli_fetch_assoc($select);
        $userNames = $row['fullName'];
        $email = $row['email'];
        $phone = $row['phone'];
        $userRole = $row['role'];
        $userProfile = $row['profileImage'];
        $userCover = $row['coverImage'];

        if(empty($userCover))
        {
            $userCover = "images/dcover.jpg";

        }
        
        if(empty($userProfile))
        {
            $userProfile = "images/dprofile.webp";
        }
        echo json_encode(['status'=>'success', 'userName'=>$userNames, 'email'=>$email,'userRole'=>$userRole,'phone'=>$phone,'userProfile'=>$userProfile,'userCover'=>$userCover]);

    }
    else
    {
        echo json_encode(['status'=>'error','message'=>'Some Thing Went Wrong']);

    }
}
// Profile Logic End Here

// Update Cover Image Start HEre
function updateCover($conn)
{
   $updateCoverName =$_FILES['updateCover']['name'];
   $updateCoverTmpName = $_FILES['updateCover']['tmp_name'];
   $dir = "../uploads/usersImage/";
   $dirAndName = $dir . $updateCoverName;
   $xarey = "uploads/usersImage/".$updateCoverName;
   move_uploaded_file($updateCoverTmpName, $dirAndName);
    $update =mysqli_query($conn , "UPDATE users SET coverImage = '$xarey'");
}
// Update Cover Image End HEre

// Update Profile Image Start HEre
function updateProfile($conn)
{
   $updateProfileName =$_FILES['updateProfile']['name'];
   $updateProfileTmpName = $_FILES['updateProfile']['tmp_name'];
   $dir = "../uploads/usersImage/";
   $dirAndName = $dir . $updateProfileName;
   $xarey = "uploads/usersImage/".$updateProfileName;
   move_uploaded_file($updateProfileTmpName, $dirAndName);
    $update =mysqli_query($conn , "UPDATE users SET profileImage = '$xarey'");
}
// Update Cover Image End HEre

function accountUpdate($conn)
// accountUpdate Start herefunction accountUpdate($conn)
{
    extract($_POST);

    // Initialize response array
    $response = [
        'status' => 'error',
        'errors' => []
    ];

    // Validate Full Name
    if (empty($fullName)) {
        $response['errors'][] = [
            'input' => 'fullName',
            'message' => 'Full Name is required.'
        ];
    }

    // Validate Email
    if (empty($email)) {
        $response['errors'][] = [
            'input' => 'email',
            'message' => 'Email is required.'
        ];

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors'][] = [
            'input' => 'email',
            'message' => 'Invalid email format.'
        ];
    }

        // Validate Phone Number
        if (empty($phone)) {
            $response['errors'][] = [
                'input' => 'phone',
                'message' => 'Phone Number is required.'
            ];
        }
    // Update function
    function update($conn)
    {
        extract($_POST);
        $userId = $_SESSION['userId'];
        // New Password Validation
        if($newPassword != NULL)
        {
         $newPassword = $newPassword;
        }
        else if($newPassword == NULL)
        {
            $newPassword = $currentPassword;
        }
        // The User Update Function
        $update = mysqli_query($conn, "UPDATE users SET fullName = '$fullName', email = '$email',phone = '$phone' , password = '$newPassword' WHERE id = '$userId' ");
        if ($update)
        {
            echo json_encode(['status' => 'success', 'message' => 'successfully Updated']);
        }
        else
        {
            echo json_encode(['status' => 'error', 'message' => 'failed']);
        }
    }
    // Validate Current Password
    if (empty($currentPassword)) {
        $response['errors'][] = [
            'input' => 'currentPassword',
            'message' => 'To Change Your Info Your Must Entered Your Old Password!'
        ];
    }
    else
    {
        $userId = $_SESSION['userId'];
        $select = mysqli_query($conn  , "SELECT * FROM users WHERE id = '$userId' AND password = '$currentPassword'");
        if($select && mysqli_num_rows($select)>0)
        {
            // When A Password is Correct Reload The update Function
            update($conn);
        }
        else
        {
            $response['errors'][] = [
                'input' => 'currentPassword',
                'message' => 'Old Password Is Nor Valid!'
            ];
        }
    }

    // Validate New Password
    // if ($newPassword != NULL) {
    //     $response['errors'][] = [
    //         'input' => 'newPassword',
    //         'message' => 'New Password is required.'
    //     ];
    // } elseif (strlen($newPassword) < 6) {
    //     $response['errors'][] = [
    //         'input' => 'newPassword',
    //         'message' => 'New Password must be at least 6 characters long.'
    //     ];
    // }

    // If there are errors, return the response
    if (!empty($response['errors'])) {
        echo json_encode($response);
        return;
    }

   
}
// accountUpdate END here

// Qaybtaan Ku Shaqeey Abdirhamaan ⬇️
?>