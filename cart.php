<?php
$title = "Add to Cart Page";
include("header.php");
?>

<div class="container cart-container">
    <h1 class="cart-heading">Cart Items</h1>

    <table id="example" class="cart-table display" style="width: 100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="cartItems" class="cart-items-body">
            <!-- JavaScript will populate this -->
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6">
                    <a href="./checkout.php"><button class="cart-checkout-btn" id="checkoutBtn">CHECKOUT</button>
                    </a>
                </th>
            </tr>
        </tfoot>
    </table>
</div>



<?php
include("footer.php");
?>