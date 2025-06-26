<?php
session_start();
include("./Admin/conn.php");  // your mysqli connection file

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
        // Begin transaction
        mysqli_begin_transaction($connection);

        try {
            // Insert customer
            $stmt = mysqli_prepare($connection, "INSERT INTO customers (name, address, email, workPhone, cellNo, dob, category, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssssssss", $name, $address, $email, $workPhone, $cellNo, $dob, $category, $remarks);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to insert customer.");
            }
            $customerId = mysqli_insert_id($connection);
            mysqli_stmt_close($stmt);

            // Calculate total amount
            $totalAmount = 0;
            foreach ($cartItems as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            // Insert order
            $stmt = mysqli_prepare($connection, "INSERT INTO orders (customer_id, total_amount) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "id", $customerId, $totalAmount);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to insert order.");
            }
            $orderId = mysqli_insert_id($connection);
            mysqli_stmt_close($stmt);

            // Insert order items
            $stmt = mysqli_prepare($connection, "INSERT INTO order_items (order_id, product_name, quantity, price, subtotal) VALUES (?, ?, ?, ?, ?)");
            foreach ($cartItems as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                mysqli_stmt_bind_param($stmt, "isidd", $orderId, $item['name'], $item['quantity'], $item['price'], $subtotal);
                if (!mysqli_stmt_execute($stmt)) {
                    throw new Exception("Failed to insert order item: " . $item['name']);
                }
            }
            mysqli_stmt_close($stmt);

            // Commit transaction
            mysqli_commit($connection);

            // Clear cart
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

<style>
    #showCheckOutProducts {
        padding: 10px;
        border-radius: 6px;
    }
    #showCheckOutProducts table {
        width: 100%;
        border-collapse: collapse;
    }
    #showCheckOutProducts th, #showCheckOutProducts td {
        padding: 8px 12px;
    }
    #showCheckOutProducts th {
        text-align: left;
    }
    #showCheckOutProducts td:nth-child(2) {
        text-align: center;
    }
    #showCheckOutProducts td:nth-child(3), 
    #showCheckOutProducts td:nth-child(4) {
        text-align: right;
    }
    #showCheckOutProducts tfoot th {
        text-align: right;
        font-weight: bold;
    }

    .message {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
    }
    .success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>

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

            <form method="POST" class="checkout-form" id="checkout-orderForm">
                <div class="row g-3">
                    <div class="col-md-6"><input type="text" name="name" class="form-control" placeholder="Name" required></div>
                    <div class="col-md-6"><input type="text" name="address" class="form-control" placeholder="Address" required></div>
                    <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="E-mail" required></div>
                    <div class="col-md-6"><input type="text" name="workPhone" class="form-control" placeholder="Work Phone No."></div>
                    <div class="col-md-6"><input type="text" name="cellNo" class="form-control" placeholder="Cell No." required></div>
                    <div class="col-md-6"><input type="date" name="dob" class="form-control"></div>
                    <div class="col-md-6"><input type="text" name="category" class="form-control" placeholder="Category"></div>
                    <div class="col-12"><textarea name="remarks" rows="3" class="form-control" placeholder="Remarks (Additional Information)"></textarea></div>
                    <p>WE PREFER CASH ON DELIVERY</p>
                    <div class="col-12"><button type="submit" name="confirmOrder" class="checkout-btn-submit">Confirm Order</button></div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
