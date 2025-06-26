<?php

include_once("./conn.php");

$CosTitle = mysqli_real_escape_string($connection, $_REQUEST['CosTitle']);
$CosDesc = mysqli_real_escape_string($connection, $_REQUEST['CosDesc']);
$CosCategory = mysqli_real_escape_string($connection, $_REQUEST['CosCategory']);
$CosTier = mysqli_real_escape_string($connection, $_REQUEST['CosTier']);
$CosPrice = floatval($_REQUEST['CosPrice']);
$originalname = $_FILES['CosImage']['name'];
$temparoryname = $_FILES['CosImage']['tmp_name'];
$folder = "../Assets/CosmeticsImages/" . $originalname;

if (move_uploaded_file($temparoryname, $folder)) {
    $AddCosQuery = "INSERT INTO `addcos` (`CosTitle`, `CosDesc`, `CosCategory`, `CosPrice`, `CosTier`, `CosImage`) 
    VALUES ('$CosTitle', '$CosDesc', '$CosCategory', $CosPrice, '$CosTier', '$folder')";

    if (mysqli_query($connection, $AddCosQuery)) {
        mysqli_close($connection);
        header("Location:AddCos.php?successmsg=Cosmetic Product Added Successfully!");
        exit();
    }
} else {
    header("Location:AddCos.php?errormsg=Oops! Cosmetic Product Upload Failed!");
    exit();
}
