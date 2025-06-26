<?php
$title = "Product Details";
include_once "header.php";
include_once "./Admin/conn.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<p>Product ID is missing.</p>";
    include_once "footer.php";
    exit;
}

$id = mysqli_real_escape_string($connection, $_GET['id']); // fix syntax here
$query = "SELECT * FROM addcos WHERE CosId = '$id' LIMIT 1";
$result = mysqli_query($connection, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "<p>Product not found.</p>";
    include_once "footer.php";
    exit;
}
$product = mysqli_fetch_assoc($result);
$imagePath = str_replace('../', '', $product['CosImage']);
?>

<div class="product-detail-container">
    <div class="product-detail-image">
        <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($product['CosTitle']); ?>">
    </div>
    <div class="product-detail-info">
        <h1><?php echo htmlspecialchars($product['CosTitle']); ?></h1>
        <div class="price">$<?php echo number_format($product['CosPrice'], 2); ?></div>
        <div class="category">Category: <?php echo ucfirst(strtolower($product['CosCategory'])); ?></div>
        <div class="quality">Quality: <?php echo ucfirst(strtolower($product['CosTier'])); ?></div>
        <p class="description"><?php echo htmlspecialchars($product['CosDesc']); ?></p>
        <button type="button" class="product__button" 
            onclick="addToCart('<?php echo htmlspecialchars($product['CosId']); ?>', '<?php echo addslashes($product['CosTitle']); ?>', <?php echo number_format($product['CosPrice'], 2, '.', ''); ?>, '<?php echo htmlspecialchars($imagePath); ?>')">
            <i class="fas fa-shopping-bag"></i> ADD TO CART
        </button>
    </div>
</div>

<div id="toast"></div>
<script>
function addToCart(id, name, price, image) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: new URLSearchParams({
            id: id,
            name: name,
            price: price,
            image: image,
            quantity: 1
        })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            const cartCountElem = document.getElementById('cartCount');
            if(cartCountElem) {
                cartCountElem.textContent = data.cartCount;
            }
            showToast(`${name} added to cart!`);
        } else {
            showToast(`Error: ${data.message || 'Could not add to cart'}`);
        }
    })
    .catch(() => showToast('Network error. Please try again.'));
}

 function showToast(message) {
    const toast = document.getElementById('toast');
    if (!toast) return;

    toast.textContent = message;
    toast.style.visibility = 'visible';
    toast.style.opacity = '1';
    toast.style.transition = 'visibility 0s linear 0s, opacity 0.3s ease-in-out';

    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.visibility = 'hidden';
        toast.style.transition = 'visibility 0s linear 0.3s, opacity 0.3s ease-in-out';
    }, 3000);
}


</script>

<?php include_once "footer.php"; ?>
