<?php

include_once("./conn.php");

$CosTitle = $_REQUEST['CosTitle'];
$CosDesc = $_REQUEST['CosDesc'];
$CosCategory = $_REQUEST['CosCategory'];
$CosPrice = $_REQUEST['CosPrice'];
$originalname = $_FILES['CosImage']['name'];
$temparoryname = $_FILES['CosImage']['tmp_name'];
$folder = "../Assets/CosmeticsImages/" . $originalname;

if (move_uploaded_file($temparoryname, $folder)) {
    $AddCosQuery = "INSERT INTO `addcos`(`CosTitle`, `CosDesc`, `CosCategory`, `CosPrice`, `CosImage`) 
    VALUES ('$CosTitle', '$CosDesc','$CosCategory', $CosPrice, '$folder')";
    mysqli_query($connection, $AddCosQuery);
    mysqli_close($connection);
    header("Location:AddCos.php?successmsg=Cosmetic Product Added Successfully!");
    exit();
} else {
    header("Location:AddCos.php?errormsg=Oops! Cosmetic Product Added Failed!");
    exit();
}





