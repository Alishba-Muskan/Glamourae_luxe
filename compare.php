<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$conn = new mysqli("localhost", "root", "", "compare_page");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$ids = isset($_GET['products']) ? $_GET['products'] : [];
if (!is_array($ids)) $ids = explode(',', $ids);
$ids = array_filter(array_map('intval', $ids));
$placeholders = implode(',', array_fill(0, count($ids), '?'));
$products = [];

if ($placeholders) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->bind_param(str_repeat('i', count($ids)), ...$ids);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}


include("header.php");
?>



<div class="cmp2-container">
    <h1 class="cmp2-title">Product Comparison</h1>
    <?php if ($products): ?>
    <div style="overflow-x:auto;">
        <table class="cmp-2-table" border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:center; background:white;">
            <tr>
                <th>Image</th>
                <?php foreach ($products as $p): ?>
                    <td><img src="<?php echo $p['image_url']; ?>" width="100"></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <th>Name</th>
                <?php foreach ($products as $p): ?>
                    <td><?php echo $p['name']; ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <th>Brand</th>
                <?php foreach ($products as $p): ?>
                    <td><?php echo $p['brand']; ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <th>Price</th>
                <?php foreach ($products as $p): ?>
                    <td>Rs. <?php echo $p['price']; ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <th>Rating</th>
                <?php foreach ($products as $p): ?>
                    <td><?php echo $p['rating']; ?> ⭐</td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <th>Features</th>
                <?php foreach ($products as $p): ?>
                    <td><?php echo $p['features']; ?></td>
                <?php endforeach; ?>
            </tr>
        </table>
    </div>
    <?php else: ?>
        <p class="cmp2-msg">No products selected.</p>
    <?php endif; ?>
</div>


    <?php
include("footer.php");
    ?>