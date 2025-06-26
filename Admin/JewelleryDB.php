<?php


include("./conn.php");

$JewelleryTitle = $_REQUEST['JewelleryTitle'];
$JewelleryDesc = $_REQUEST['JewelleryDesc'];
$JewelleryCategory = $_REQUEST['JewelleryCategory'];
$JewelleryPrice = $_REQUEST['JewelleryPrice'];
$originalname = $_FILES['JewelleryImage']['name'];
$temparoryname = $_FILES['JewelleryImage']['tmp_name'];
$folder = "../Assets/JewelleryImages/" . $originalname;




if (move_uploaded_file($temparoryname, $folder)) {
     $AddJewelleryQuery = "INSERT INTO `addjewellery`(`JewelleryTitle`, `JewelleryDesc`, `JewelleryCategory`, `JewelleryPrice`, `JewelleryImage`) 
    VALUES ('$JewelleryTitle', '$JewelleryDesc','$JewelleryCategory', $JewelleryPrice, '$folder')";
    mysqli_query($connection, $AddJewelleryQuery);
    mysqli_close($connection);
    header("Location:AddCos.php?successmsg=Jewellery Product Added Successfully!");
    exit();
} else {
    header("Location:AddCos.php?errormsg=Oops! Jewellery Product Added Failed!");
    exit();

}

?>