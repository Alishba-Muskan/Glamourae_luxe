<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_id'])) {
        $removeId = $_POST['remove_id'];
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $removeId) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); 
                break;
            }
        }
    }

    if (isset($_POST['id']) && isset($_POST['quantity'])) {
        $id = $_POST['id'];
        $quantity = intval($_POST['quantity']);
        if ($quantity >= 1) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $id) {
                    $item['quantity'] = $quantity;
                    break;
                }
            }
            unset($item);
        }
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$title = "Cart Items";
include("header.php");
?>

<div class="container cart-container">
    <h1 class="cart-heading">Your Shopping Cart</h1>

    <table class="cart-table display" style="width: 100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $cartItems = array_values($_SESSION['cart'] ?? []);
            if (!empty($cartItems)) {
                foreach ($cartItems as $index => $item) {
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;

                    echo "<tr>
                            <td>" . ($index + 1) . "</td>
                            <td>" . htmlspecialchars($item['name']) . "</td>
                            <td>$" . number_format($item['price'], 2) . "</td>
                            <td style='white-space: nowrap;'>
                                <form method='post' action='' style='display:inline; margin:0;'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($item['id']) . "'>
                                    <input 
                                        type='number' 
                                        name='quantity' 
                                        value='" . intval($item['quantity']) . "' 
                                        min='1' 
                                        style='width: 60px; text-align:center; padding:4px; border-radius:4px; border:1px solid #ccc;'
                                        onchange='this.form.submit()'
                                    >
                                </form>
                            </td>
                            <td><img src='" . htmlspecialchars($item['image']) . "' width='50' alt='" . htmlspecialchars($item['name']) . "'></td>
                            <td>
                                <form method='post' action='' onsubmit=\"return confirm('Are you sure you want to remove this item?');\" style='margin:0;'>
                                    <input type='hidden' name='remove_id' value='" . htmlspecialchars($item['id']) . "'>
                                    <button type='submit' style='background:none; border:none; color:red; cursor:pointer;'>Remove</button>
                                </form>
                            </td>
                            <td>$" . number_format($subtotal, 2) . "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Cart is empty.</td></tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="7" style="text-align: center;">
                    <a href="checkout.php"><button class="cart-checkout-btn">PROCEED TO CHECKOUT</button></a>
                </th>
            </tr>
            <tr>
                <th style="padding: 20px; background-color: black;" colspan="6" class="text-end">Total:</th>
                <th style="padding: 20px; background-color: black;"><?php echo "$" . number_format($total, 2); ?></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php include("footer.php"); ?>
