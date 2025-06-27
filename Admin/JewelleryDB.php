<?php

include_once("./conn.php");

$JewelleryTitle = mysqli_real_escape_string($connection, $_REQUEST['JewelleryTitle']);
$JewelleryDesc = mysqli_real_escape_string($connection, $_REQUEST['JewelleryDesc']);
$JewelleryCategory = mysqli_real_escape_string($connection, $_REQUEST['JewelleryCategory']);
$JewelleryTier = mysqli_real_escape_string($connection, $_REQUEST['JewelleryTier']);
$JewelleryPrice = floatval($_REQUEST['JewelleryPrice']);
$Quantity = intval($_REQUEST['Quantity']);

$originalname = $_FILES['JewelleryImage']['name'];
$temparoryname = $_FILES['JewelleryImage']['tmp_name'];
$folder = "../Assets/JewelleryImages/" . $originalname;

if (move_uploaded_file($temparoryname, $folder)) {
    $AddJewelleryQuery = "INSERT INTO `addjewellery` 
    (`JewelleryTitle`, `JewelleryDesc`, `JewelleryCategory`, `JewelleryPrice`, `JewelleryTier`, `Quantity`, `JewelleryImage`) 
    VALUES 
    ('$JewelleryTitle', '$JewelleryDesc', '$JewelleryCategory', $JewelleryPrice, '$JewelleryTier', $Quantity, '$folder')";

    if (mysqli_query($connection, $AddJewelleryQuery)) {
        mysqli_close($connection);
        header("Location:AddJewellery.php?successmsg=Jewellery Product Added Successfully!");
        exit();
    }
} else {
    header("Location:AddJewellery.php?errormsg=Oops! Jewellery Product Upload Failed!");
    exit();
}
?>
