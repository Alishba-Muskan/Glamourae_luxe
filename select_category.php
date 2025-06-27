<?php
$title = "Comapre & Choose Page";
include_once "./Admin/conn.php";

$category = isset($_GET['category']) ? $_GET['category'] : '';
$products = [];

if ($category == 'Jewelry') {
    $stmt = $connection->prepare("SELECT * FROM addjewellery order by JewelleryId desc");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $products[] = [
            'id' => $row['JewelleryId'],
            'name' => htmlspecialchars($row['JewelleryTitle']),
            'price' => $row['JewelleryPrice'],
            'image_url' => str_replace('../', '', $row['JewelleryImage']),
            'category' => 'Jewelry'
        ];
    }
} elseif ($category == 'Cosmetics') {
    $stmt = $connection->prepare("SELECT * FROM addcos order by CosId desc");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $products[] = [
            'id' => $row['CosId'],
            'name' => htmlspecialchars($row['CosTitle']),
            'price' => $row['CosPrice'],
            'image_url' => str_replace('../', '', $row['CosImage']),
            'category' => 'Cosmetics'
        ];
    }
}

include("header.php");
?>

<section class="hp-hero" style="--hero-bg: url('./Images/compare.jpg');"></section>
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
                    <h3 style="font-size: 18px; padding-top: 15px; "><?php echo htmlspecialchars($p['name']); ?></h3>
                    <p style="color: #e5233e;">Rs. <?php echo $p['price']; ?></p>
                    <label>
                        <!-- Value mein category-id format bhej rahe hain -->
                        <input type="checkbox" name="products[]" value="<?php echo $p['category'].'-'.$p['id']; ?>"> Compare
                    </label>
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
