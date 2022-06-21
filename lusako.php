<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "fredy");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
if(isset($_POST['submit']))
{    
     $fullname = $_POST['firstname'];
     $middlename = $_POST['mname'];
     $lastname = $_POST['lname'];
     $mobilenumber = $_POST['mobile'];
     $email = $_POST['mail'];
     $password = $_POST['pwd'];
     $date_of_birth= $_POST['dob'];
     $cv = $_POST['file'];
     $twitter = $_POST['Twitter'];
     $facebook = $_POST['facebook'];
     $instagram= $_POST['Instagram'];
    
    
     
     $sql = "INSERT INTO fredy (fname,mname,lname,mobile,pwd,date_of_birth,fil,twitter,facebook,instagram,submit)
     VALUES ('$fullname','$middlename','$lastname','$mobilenumber','$email','$password','$date_of_birth','$cv','$twitter','$facebook','$instagram')"
     if (mysqli_query($link, $sql)) {
        echo "New record created successfully !";
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($link);
     }
     mysqli_close($link);
}

?>

