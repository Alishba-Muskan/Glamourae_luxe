<?php
include("./conn.php");

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $getImageQuery = "SELECT TopSellingImage FROM TopSelling WHERE TopSellingId = $id";
    $imageResult = mysqli_query($connection, $getImageQuery);
    if ($imageRow = mysqli_fetch_assoc($imageResult)) {
        $imagePath = $imageRow['TopSellingImage'];

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $deleteQuery = "DELETE FROM TopSelling WHERE TopSellingId = $id";
        if (mysqli_query($connection, $deleteQuery)) {
            header("Location: show_topselling.php?successmsg=Top Selling product deleted successfully");
            exit();
        } else {
            header("Location: show_topselling.php?errormsg=Failed to delete product from database");
            exit();
        }
    } else {
        header("Location: show_topselling.php?errormsg=Product not found");
        exit();
    }

} else {
    header("Location: show_topselling.php?errormsg=Invalid Request");
    exit();
}
?>
