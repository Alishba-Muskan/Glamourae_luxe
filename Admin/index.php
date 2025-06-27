<?php
session_start();

if (isset($_SESSION['EmailAddress']) == null) {
    header("Location: ./Login.php");
}



// Step 1: Include database connection if not already done
include_once("./conn.php"); // Only if your connection isn't already included

// Step 2: Fetch total sales
$total_sales = 0;
$sql = "SELECT COUNT(*) AS total_rows FROM order_items;";
$result = mysqli_query($connection, $sql); // Assuming $conn is your DB connection variable

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_sales1 = $row['total_rows'];
}

$total_price = 0;
$sql2 = "SELECT SUM(price) AS total_price FROM order_items";
$result2 = mysqli_query($connection, $sql2);

if ($result2 && mysqli_num_rows($result2) > 0) {
    $row2 = mysqli_fetch_assoc($result2);
    $total_price = $row2['total_price'] ?? 0;
}


$total_customer = 0;
$sql3 = "SELECT COUNT(*) AS total_customers FROM customers;";
$result3 = mysqli_query($connection, $sql3); // Assuming $conn is your DB connection variable

if ($result && mysqli_num_rows($result3) > 0) {
    $row = mysqli_fetch_assoc($result3);
    $total_customers = $row['total_customers'];
}


$total_customer = 0;
$sql4 = "SELECT COUNT(*) AS total_count FROM Users";
$result4 = mysqli_query($connection, $sql4); // Assuming $conn is your DB connection variable

if ($result && mysqli_num_rows($result4) > 0) {
    $row = mysqli_fetch_assoc($result4);
    $total_sales = $row['total_count'];
}


header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

$title = 'Admin Panel - Home Page';
include_once("header.php");
?>


<div class="row mt-3" style="padding: 18px 80px;">
    <h1 style="text-align:center; padding:0px 80px; color: #debd01; font-size: 50px;"> Welcome To Jenny's & Maria Glamouraé Luxe Store</h1>
</div>



<div style="height: fit-content;" class="container-fluid pt-4 px-4">

    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Sale</p>
                    <h6 class="mb-0">Products : <?php echo $total_sales1; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Amount</p>
                    <h6 class="mb-0">Price : <?php echo number_format($total_price, 2); ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Customer</p>
                    <h6 class="mb-0">Customers : <?php echo $total_customers; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Registered Account</p>
                    <h6 class="mb-0">Accounts : <?php echo $total_sales;?></h6>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 style="color: #debd01 ;" class="mb-0">Recent Salse</h5>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Products</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                    include("./conn.php");
                    $showcustomers = "SELECT * FROM order_items order by id desc limit 6";
                    $result = mysqli_query($connection, $showcustomers);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td><?php echo $row['order_id'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include_once("footer.php"); ?>