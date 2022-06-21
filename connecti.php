<?php
    $fullName = $_POST['fullName'];
    $enrollYear = $_POST['enrollYear'];
    $gradYear = $_POST['gradYear'];
    $enrollHead = $_POST['enrollHead'];
    $gradHead = $_POST['gradHead'];
    $division = $_POST['division'];
    $occupation = $_POST['occupation'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    //connect to database
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "berthalusako";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO alumni (fullName, enrollYear, gradYear, enrollHead, gradHead, division, occupation, address, email, phoneNumber) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siissssssi", $fullName, $enrollYear, $gradYear, $enrollHead, $gradHead, $division, $occupation, $address, $email, $phoneNumber);
        $stmt->execute();
        echo "New record inserted sucessfully";
        $stmt->close();
        $conn->close();
    }
    


?>


    