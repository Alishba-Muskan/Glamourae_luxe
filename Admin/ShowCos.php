<?php
$title = 'Admin Panel - Show_Cosmetics Page';
include_once("header.php");
?>

<div class="container-fluid pt-4 px-1">
    <div style="min-height: 72vh;" class="form-con row justify-content-center align-items-center mx-0">
        <div class="col-lg-10 col-md-8 glass-box">
            <h3>ADD COSMETICS PRODUCT CARD</h3>
            <table style="color: white;" class="table table-stripped" id="myTable">
                <thead>
                    <tr>
                        <th>Cosmetic Title</th>
                        <th>Cosmetic Description</th>
                        <th>Cosmetic Category</th>
                        <th>Cosmetic Price</th>
                        <th>Cosmetic Image</th>
                        <th>Cosmetic Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("./conn.php");
                    $showjewelleryQuery = "SELECT * FROM addcos";
                    $result = mysqli_query($connection, $showjewelleryQuery);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['CosTitle'] ?></td>
                            <td><?php echo implode(' ', array_slice(explode(' ', $row['CosDesc']), 0, 30)) . '...'; ?></td>
                            <td><?php echo $row['CosCategory'] ?></td>
                            <td><?php echo $row['CosPrice'] ?></td>
                            <td>
                                <img src="<?php echo $row['CosImage'] ?>" width="80" height="100" alt="">
                            </td>
                            <td>
                                <form action="delete_cosmetic.php" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    <input type="hidden" name="id" value="<?php echo $row['CosId']; ?>">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include_once("footer.php");
