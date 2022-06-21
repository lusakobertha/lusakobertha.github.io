<?php
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $surName = $_POST['surName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];

    if(!empty($firstName) || !empty($middleName) || !empty($surName) || !empty($email) || !empty($phoneNumber || !empty($password)))
    {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "berthalusako";

        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if (mysqli_connect_error()){
            die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
            $SELECT = "SELECT email From user Where email = ? Limit 1";
            $INSERT = "INSERT Into user (firstName, middleName, surName, email, password, phoneNumber) values(?, ?, ?, ?, ?, ?)";

            //prepare statement
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if($rnum==0) {
                $stmt->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssssi", $firstName, $middleName, $surName, $email, $phoneNumber, $password);
                $stmt->execute();
                echo "New record inserted sucessfully";
            } else {
                echo "Someone already register using this email";
            }
            $stmt->close();
            $conn->close();
        }

    }else{
        echo "Please fill in all the fields";
        die();
    }
?>

