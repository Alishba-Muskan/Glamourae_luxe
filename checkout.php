<?php

$title = "checkout page";
include("header.php");


// Handle form submission
if (isset($_REQUEST['confirmOrder'])) {
    include("./Admin/conn.php"); // Your DB connection file

    // Sanitize and get customer info
    $name = $_REQUEST['name'];
    $address = $_REQUEST['address'];
    $email = $_REQUEST['email'];
    $workPhone = $_REQUEST['workPhone'];
    $cellNo = $_REQUEST['cellNo'];
    $dob = $_REQUEST['dob'];
    $category = $_REQUEST['category'];
    $remarks = $_REQUEST['remarks'];
    $order_date = date('Y-m-d H:i:s');
    $cartData = json_decode($_REQUEST['cart_data'], true);

    // Insert into orders table
    $stmt = $conn->prepare("INSERT INTO orders (name, address, email, work_phone, cell_no, dob, category, remarks, order_date)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $address, $email, $workPhone, $cellNo, $dob, $category, $remarks, $order_date);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // Insert each product into order_items
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, title, price, quantity, total) VALUES (?, ?, ?, ?, ?)");
    foreach ($cartData as $item) {
        $title = $item['title'];
        $price = $item['price'];
        $quantity = $item['qunatity']; // spelling used in cart
        $total = $price * $quantity;
        $stmt->bind_param("isddd", $order_id, $title, $price, $quantity, $total);
        $stmt->execute();
    }
    $stmt->close();
    $conn->close();

    echo "<script>alert('Order placed successfully!'); localStorage.removeItem('cart'); window.location.href='checkout.php';</script>";
}
?>

<div class="container checkout-container">
    <div class="row">
        <div class="col-md-4">
            <h5 class="checkout-form-title">Your Cart</h5>
            <div id="showCheckOutProducts"></div>
        </div>

        <div class="col-md-8">
            <h5 class="checkout-form-title">Customer Details</h5>
            <form action="./checkout.php" method="POST" class="checkout-form needs-validation" id="checkout-orderForm" novalidate>
                <div class="row g-3">
                    <div class="col-md-6"><input type="text" name="name" class="form-control" placeholder="Name" required>
                        <div class="invalid-feedback">Please Provide a Name</div>
                    </div>
                    <div class="col-md-6"><input type="text" name="address" class="form-control" placeholder="Address" required>
                        <div class="invalid-feedback">Please Provide a Address</div>
                    </div>
                    <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="E-mail" required>
                        <div class="invalid-feedback">Please Provide a Email</div>
                    </div>
                    <div class="col-md-6"><input type="text" name="workPhone" class="form-control" placeholder="Work Phone No." required>
                        <div class="invalid-feedback">Please Provide a Phone</div>
                    </div>
                    <div class="col-md-6"><input type="text" name="cellNo" class="form-control" placeholder="Cell No." required>
                        <div class="invalid-feedback">Please Provide a Cell No</div>
                    </div>
                    <div class="col-md-6"><input type="date" name="dob" class="form-control" required>
                        <div class="invalid-feedback">Please Provide a DOB</div>
                    </div>
                    <div class="col-12"><textarea name="remarks" rows="3" class="form-control" placeholder="Remarks (Additional Information)" required></textarea>
                        <div class="invalid-feedback">Please Provide a DOB</div>
                    </div>
                    <input type="hidden" name="cart_data" id="cartDataInput">
                    <p>WE PREFER CASH ON DELIVERY</p>
                    <div class="col-12"><button type="submit" name="confirmOrder" class="checkout-btn-submit">Confirm Order</button></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const showCheckOutProducts = document.getElementById("showCheckOutProducts");
    const cartDataInput = document.getElementById("cartDataInput");
    const localData = localStorage.getItem("cart");
    const parseData = JSON.parse(localData) || [];

    if (parseData.length === 0) {
        showCheckOutProducts.innerHTML = "<p>No items in cart.</p>";
    } else {
        parseData.forEach((item) => {
            showCheckOutProducts.innerHTML += `
          <div class="checkout-products">
            <span><strong>Product:</strong> ${item.title}</span>
            <span><strong>Price:</strong> ₹${item.price}</span>
            <span><strong>Quantity:</strong> ${item.qunatity}</span>
            <span><strong>Total:</strong> ₹${item.price * item.qunatity}</span>
          </div>
        `;
        });
        cartDataInput.value = JSON.stringify(parseData);
    }
</script>
</body>

</html>


<?php
include("footer.php");

?>