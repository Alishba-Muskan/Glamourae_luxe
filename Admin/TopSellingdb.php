<?php
include_once("./conn.php");
$TopSellingTitle = mysqli_real_escape_string($connection, $_REQUEST['TopSellingTitle']);
$TopSellingDesc = mysqli_real_escape_string($connection, $_REQUEST['TopSellingDesc']);
$TopSellingCategory = mysqli_real_escape_string($connection, $_REQUEST['TopSellingCategory']);
$TopSellingTier = mysqli_real_escape_string($connection, $_REQUEST['TopSellingTier']);
$TopSellingPrice = floatval($_REQUEST['TopSellingPrice']);
$TopSellingQuantity = intval($_REQUEST['TopSellingQuantity']);
$originalName = $_FILES['TopSellingImage']['name'];
$tempName = $_FILES['TopSellingImage']['tmp_name'];
$folder = "../Assets/TopSellingImages/" . $originalName;
if (move_uploaded_file($tempName, $folder)) {
    $insertQuery = "
        INSERT INTO TopSelling (
            TopSellingTitle, TopSellingDesc, TopSellingCategory, TopSellingPrice,
            TopSellingImage, TopSellingTier, TopSellingQuantity
        ) VALUES (
            '$TopSellingTitle', '$TopSellingDesc', '$TopSellingCategory', $TopSellingPrice,
            '$folder', '$TopSellingTier', $TopSellingQuantity
        )";

    if (mysqli_query($connection, $insertQuery)) {
        mysqli_close($connection);
        header("Location: ./AddTopSelling.php?successmsg=Top Selling Product Added Successfully!");
        exit();
    } else {
        header("Location: ./AddTopSelling.php?errormsg=Database Insert Failed!");
        exit();
    }
} else {
    header("Location: ./AddTopSelling.php?errormsg=Image Upload Failed!");
    exit();
}
?>
