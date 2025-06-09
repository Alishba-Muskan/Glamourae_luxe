<?php

include("db.php");

$name = $_REQUEST['user-name']; 
$email = $_REQUEST['user-email']; 
$subject = $_REQUEST['user-subject']; 
$message = $_REQUEST['user-msg'];

$name = mysqli_real_escape_string($connection, $name);
$email = mysqli_real_escape_string($connection, $email);
$subject = mysqli_real_escape_string($connection, $subject);
$message = mysqli_real_escape_string($connection, $message);


$sql = "INSERT INTO `contact_messages`(`full_name`, `email`, `subject`, `message`) VALUES ('$name', '$email','$subject','$message')";




if(mysqli_query($connection, $sql)){
    header("Location:contact.php?successmsg=Your Message Has Been Sent");
}else{
     header("Location:contact.php?errormsg=Something Went Wrong");
}

mysqli_close($connection);


?>