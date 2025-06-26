<?php
include("./conn.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $getImageQuery = "SELECT CosImage FROM addcos WHERE CosId = $id";
    $imageResult = mysqli_query($connection, $getImageQuery);
    $imageRow = mysqli_fetch_assoc($imageResult);
    $imagePath = $imageRow['CosImage'];

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $deleteQuery = "DELETE FROM addcos WHERE CosId = $id";
    if (mysqli_query($connection, $deleteQuery)) {
        header("Location: show_cosmetics.php?successmsg=Product deleted successfully");
    } else {
        header("Location: show_cosmetics.php?errormsg=Failed to delete product");
    }
} else {
    header("Location: show_cosmetics.php?errormsg=Invalid Request");
}
?>
