<form method="POST" enctype="multipart/form-data" action="test.php">
    <input type="file" name="file">
    <button type="submit">submit</button>
</form>

<?php  
if(isset($_FILES['file']))
{
    // $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    print_r( $file);
    echo "<br/>";
    print_r($file["name"]);
    echo "<br/>";
    print_r($file["tmp_name"]);

}

// $users = ["name"=>"ali","Email"=>"Ali@gmial.com","Sex","Male"];
// print_r($users["Email"]);
?>