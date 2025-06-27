<?php
session_start();
include("./Admin/conn.php");

$successMsg = "";
$errorMsg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirmOrder'])) {

    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $workPhone = !empty($_POST['workPhone']) ? trim($_POST['workPhone']) : null;
    $cellNo = trim($_POST['cellNo']);
    $dob = !empty($_POST['dob']) ? trim($_POST['dob']) : null;
    $category = !empty($_POST['category']) ? trim($_POST['category']) : null;
    $remarks = !empty($_POST['remarks']) ? trim($_POST['remarks']) : null;

    $cartItems = $_SESSION['cart'] ?? [];

    if (empty($cartItems)) {
        $errorMsg = "Your cart is empty. Please add products before checking out.";
    } else {
        mysqli_begin_transaction($connection);

        try {
            $stmt = mysqli_prepare($connection, "INSERT INTO customers (name, address, email, workPhone, cellNo, dob, category, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssssssss", $name, $address, $email, $workPhone, $cellNo, $dob, $category, $remarks);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to insert customer.");
            }
            $customerId = mysqli_insert_id($connection);
            mysqli_stmt_close($stmt);

            $totalAmount = 0;
            foreach ($cartItems as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }
            $stmt = mysqli_prepare($connection, "INSERT INTO orders (customer_id, total_amount) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "id", $customerId, $totalAmount);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to insert order.");
            }
            $orderId = mysqli_insert_id($connection);
            mysqli_stmt_close($stmt);
            $stmt = mysqli_prepare($connection, "INSERT INTO order_items (order_id, product_name, quantity, price, subtotal) VALUES (?, ?, ?, ?, ?)");
            foreach ($cartItems as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                mysqli_stmt_bind_param($stmt, "isidd", $orderId, $item['name'], $item['quantity'], $item['price'], $subtotal);
                if (!mysqli_stmt_execute($stmt)) {
                    throw new Exception("Failed to insert order item: " . $item['name']);
                }
            }
            mysqli_stmt_close($stmt);

            mysqli_commit($connection);

            unset($_SESSION['cart']);

            $successMsg = "Order placed successfully! Thank you for your purchase.";
        } catch (Exception $e) {
            mysqli_rollback($connection);
            $errorMsg = "Error: " . $e->getMessage();
        }
    }
}
$title = "checkout page";
include("header.php");
?>

<div class="container checkout-container">
    <div class="row">
        <div class="col-md-4">
            <h5 class="checkout-form-title">Your Cart</h5>
            <div id="showCheckOutProducts">
                <?php
                $cartItems = $_SESSION['cart'] ?? [];

                if (!empty($cartItems)) {
                    echo '<table>';
                    echo '<thead><tr>';
                    echo '<th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th>';
                    echo '</tr></thead><tbody>';

                    $total = 0;
                    foreach ($cartItems as $item) {
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($item['name']) . '</td>';
                        echo '<td>' . intval($item['quantity']) . '</td>';
                        echo '<td>$' . number_format($item['price'], 2) . '</td>';
                        echo '<td>$' . number_format($subtotal, 2) . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '<tfoot><tr>';
                    echo '<th colspan="3">Total:</th>';
                    echo '<th>$' . number_format($total, 2) . '</th>';
                    echo '</tr></tfoot>';
                    echo '</table>';
                } else {
                    echo '<p>Your cart is empty.</p>';
                }
                ?>
            </div>
        </div>

        <div class="col-md-8">
            <h5 class="checkout-form-title">Customer Details</h5>

            <?php if ($successMsg): ?>
                <div class="message success"><?php echo $successMsg; ?></div>
            <?php endif; ?>
            <?php if ($errorMsg): ?>
                <div class="message error"><?php echo $errorMsg; ?></div>
            <?php endif; ?>

            <form method="POST" class="checkout-form needs-validation" novalidate id="checkout-orderForm">
                <div class="row g-3">
                    <div class="col-md-6"><input type="text" name="name" class="form-control" placeholder="Name" required>
                        <div class="invalid-feedback">
                            Please Provide a Name.
                        </div>
                    </div>
                    <div class="col-md-6"><input type="text" name="address" class="form-control" placeholder="Address" required>
                        <div class="invalid-feedback">
                            Please Provide a Address.
                        </div>
                    </div>
                    <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="E-mail" required>
                        <div class="invalid-feedback">
                            Please Provide a Email.
                        </div>
                    </div>
                    <div class="col-md-6"><input type="text" name="workPhone" class="form-control" placeholder="Work Phone No." required>
                        <div class="invalid-feedback">
                            Please Provide a Work PHone.
                        </div>
                    </div>
                    <div class="col-md-6"><input type="text" name="cellNo" class="form-control" placeholder="Cell No." required>
                        <div class="invalid-feedback">
                            Please Provide a Cell No.
                        </div>
                    </div>
                    <div class="col-md-6"><input type="date" name="dob" class="form-control">
                <div class="invalid-feedback">
                            Please Provide a DOB.
                        </div>
                </div>
                    <div class="col-12"><textarea name="remarks" rows="3" class="form-control" placeholder="Remarks (Additional Information)"></textarea></div>
                    <p>WE PREFER CASH ON DELIVERY</p>
                    <div class="col-12"><button type="submit" name="confirmOrder" class="checkout-btn-submit">Confirm Order</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
<?php
foreach ($cartItems as $item) {
    $stmt = mysqli_prepare($connection, "UPDATE addcos SET Quantity = Quantity - ? WHERE CosTitle = ? AND Quantity >= ?");
    mysqli_stmt_bind_param($stmt, "isi", $item['quantity'], $item['name'], $item['quantity']);
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Failed to update quantity for: " . $item['name']);
    }
    mysqli_stmt_close($stmt);
}

foreach ($cartItems as $item) {
    $stmt1 = mysqli_prepare($connection, "UPDATE addjewellery SET Quantity = Quantity - ? WHERE JewelleryTitle = ? AND Quantity >= ?");
    mysqli_stmt_bind_param($stmt1, "isi", $item['quantity'], $item['name'], $item['quantity']);
    if (!mysqli_stmt_execute($stmt1)) {
        throw new Exception("Failed to update quantity for: " . $item['name']);
    }
    mysqli_stmt_close($stmt1);
}


?>