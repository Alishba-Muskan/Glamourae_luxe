<?php
$title = 'Admin Panel - Show_TopSelling Page';
include_once("header.php");
?>
<div class="container-fluid pt-4 px-1">
    <div style="min-height: 72vh;" class="form-con row justify-content-center align-items-center mx-0">
        <div class="col-lg-10 col-md-8 glass-box">
            <h3>SHOW TOP SELLING PRODUCT CARDS</h3>
            <table style="color: white;" class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("./conn.php");
                    $showTopSellingQuery = "SELECT * FROM TopSelling ORDER BY TopSellingId DESC";
                    $result = mysqli_query($connection, $showTopSellingQuery);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['TopSellingTitle']; ?></td>
                            <td><?php echo implode(' ', array_slice(explode(' ', $row['TopSellingDesc']), 0, 30)) . '...'; ?></td>
                            <td><?php echo $row['TopSellingCategory']; ?></td>
                            <td><?php echo $row['TopSellingPrice']; ?></td>
                            <td>
                                <img src="<?php echo $row['TopSellingImage']; ?>" width="140" alt="Product Image">
                            </td>
                            <td>
                                <form action="delete_topselling.php" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    <input type="hidden" name="id" value="<?php echo $row['TopSellingId']; ?>">
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

<?php include_once("footer.php"); ?>
