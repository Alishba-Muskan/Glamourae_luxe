<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "compare_page");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category = isset($_GET['category']) ? $_GET['category'] : '';
$products = [];

if ($category) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

include("header.php");

?>




<div class="cmp2-container">
    <h1 class="cmp2-title">Compare Products</h1>
    <form method="get" class="cmp2-form">
        <label for="category" class="cmp2-label">Choose Category:</label>
        <select name="category" id="category" class="cmp2-select" onchange="this.form.submit()">
            <option value="">-- Select --</option>
            <option value="Jewelry" <?php if($category=='Jewelry') echo 'selected'; ?>>Jewelry</option>
            <option value="Cosmetics" <?php if($category=='Cosmetics') echo 'selected'; ?>>Cosmetics</option>
        </select>
    </form>

    <?php if ($products): ?>
    <form method="get" action="compare.php">
        <div class="cmp2-grid">
            <?php foreach ($products as $p): ?>
                <div class="cmp2-card">
                    <img src="<?php echo $p['image_url']; ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
                    <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                    <p>Brand: <?php echo htmlspecialchars($p['brand']); ?></p>
                    <p>Rs. <?php echo $p['price']; ?></p>
                    <label><input type="checkbox" name="products[]" value="<?php echo $p['id']; ?>"> Compare</label>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="cmp2-center">
            <button type="submit" class="cmp2-button">Compare Selected</button>
        </div>
    </form>
    <?php elseif ($category): ?>
        <p class="cmp2-msg">No products found in this category.</p>
    <?php endif; ?>
</div>
<?php
include("footer.php");
?>
