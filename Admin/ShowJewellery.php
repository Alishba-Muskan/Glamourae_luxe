<?php
$title = 'Admin Panel - Show_Jewellery Page';
include_once("header.php");
?>
<div class="container-fluid pt-4 px-1">
    <div style="min-height: 72vh;" class="form-con row justify-content-center align-items-center mx-0">
        <div class="col-lg-10 col-md-8 glass-box">
            <h3>ADD JEWELLERY PRODUCT CARD</h3>
            <table style="color: white;" class="table table-stripped" id="myTable">
                <thead>
                    <tr>
                        <th>Jewellery Title</th>
                        <th>Jewellery Description</th>
                        <th>Jewellery Category</th>
                        <th>Jewellery Price</th>
                        <th>Jewellery Image</th>
                        <th>Jewellery Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("./conn.php");
                    $showjewelleryQuery = "SELECT * FROM addjewellery";
                    $result = mysqli_query($connection, $showjewelleryQuery);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['JewelleryTitle'] ?></td>
                            <td><?php echo implode(' ', array_slice(explode(' ', $row['JewelleryDesc']), 0, 30)) . '...'; ?></td>
                            <td><?php echo $row['JewelleryCategory'] ?></td>
                            <td><?php echo $row['JewelleryPrice'] ?></td>
                            <td>
                                <img src="<?php echo $row['JewelleryImage'] ?>" width="140" alt="">
                            </td>
                            <td>
                                <form action="delete_jewellery.php" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    <input type="hidden" name="id" value="<?php echo $row['JewelleryId']; ?>">
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
