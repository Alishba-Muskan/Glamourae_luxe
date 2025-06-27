<?php
$title = "Product Details";
include_once "header.php";
include_once "./Admin/conn.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<p>Product ID is missing.</p>";
    include_once "footer.php";
    exit;
}

$id = mysqli_real_escape_string($connection, $_GET['id']);
$query = "SELECT * FROM topselling WHERE TopSellingId = '$id' LIMIT 1";
$result = mysqli_query($connection, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "<p>Product not found.</p>";
    include_once "footer.php";
    exit;
}
$product = mysqli_fetch_assoc($result);
$imagePath = str_replace('../', '', $product['TopSellingImage']);
?>

<style>
.product-detail-container {
    display: flex;
    gap: 30px;
    padding: 20px;
    flex-wrap: wrap;
}

.product-detail-image {
    flex: 1 1 400px;
    max-width: 400px;
}

.img-magnifier-container {
    position: relative;
    overflow: hidden;
    max-width: 400px;
    cursor: zoom-in;
}

.img-magnifier-container img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
    transform-origin: center center;
}
</style>

<div class="product-detail-container">
    <div class="product-detail-image">
        <div class="img-magnifier-container">
            <img id="productImage" src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($product['TopSellingTitle']); ?>" />
        </div>
    </div>
    <div class="product-detail-info">
        <h1><?php echo htmlspecialchars($product['TopSellingTitle']); ?></h1>
        <div class="price">Rs : <?php echo number_format($product['TopSellingPrice'], 2); ?></div>
        <div class="category">Category: <?php echo ucfirst(strtolower($product['TopSellingCategory'])); ?></div>
        <div class="quality">Quality: <?php echo ucfirst(strtolower($product['TopSellingTier'])); ?></div>
        <p class="description"><?php echo htmlspecialchars($product['TopSellingDesc']); ?></p>
        <button type="button" class="product__button" 
            onclick="addToCart('<?php echo htmlspecialchars($product['TopSellingId']); ?>', '<?php echo addslashes($product['TopSellingTitle']); ?>', <?php echo number_format($product['TopSellingId'], 2, '.', ''); ?>, '<?php echo htmlspecialchars($imagePath); ?>')">
            <i class="fas fa-shopping-bag"></i> ADD TO CART
        </button>
    </div>
</div>

<div id="toast"></div>

<script>
const img = document.getElementById('productImage');

img.parentElement.addEventListener('mousemove', function(e) {
    const rect = img.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const xPercent = x / rect.width * 100;
    const yPercent = y / rect.height * 100;

    img.style.transform = 'scale(2)';
    img.style.transformOrigin = `${xPercent}% ${yPercent}%`;
});

img.parentElement.addEventListener('mouseleave', function() {
    img.style.transform = 'scale(1)';
    img.style.transformOrigin = 'center center';
});

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
