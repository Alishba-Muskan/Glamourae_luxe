<?php
include("./conn.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $getImageQuery = "SELECT JewelleryImage FROM AddJewellery WHERE JewelleryId = $id";
    $imageResult = mysqli_query($connection, $getImageQuery);
    $imageRow = mysqli_fetch_assoc($imageResult);
    $imagePath = $imageRow['JewelleryImage'];

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $deleteQuery = "DELETE FROM AddJewellery WHERE JewelleryId = $id";
    if (mysqli_query($connection, $deleteQuery)) {
        header("Location: show_jewellery.php?successmsg=Product deleted successfully");
    } else {
        header("Location: show_jewellery.php?errormsg=Failed to delete product");
    }
} else {
    header("Location: show_jewellery.php?errormsg=Invalid Request");
}
?>
