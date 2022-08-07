<?php
    $name = $_POST[name];
    $email = $_POST[email];
    $phone = $_POST[phone];
    $subject = $_POST[subject];
    $message = $_POST[message];

    $conn = new mysqli('localhost','admin','','website');
    if($conn->connect_error){
        die('Connection Failed:'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO customer(name,email,phone,subject,message)
        values(?,?,?,?,?)");
        $stmt->bind_param("ssi",$name,$email,$phone,$subject,$message);
        $stmt->execute();
        echo "message sent";
        $stmt->close();
        $conn->close();
    }
?>