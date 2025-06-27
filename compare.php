<?php
$title = "Comapre & Choose Page";
include_once "./Admin/conn.php";

$selected = isset($_GET['products']) ? $_GET['products'] : [];
if (!is_array($selected)) $selected = [$selected];
$products = [];
foreach ($selected as $item) {
    list($cat, $id) = explode('-', $item);
    $id = intval($id);

    if ($cat == 'Jewelry') {
        $stmt = $connection->prepare("SELECT * FROM addjewellery WHERE JewelleryId = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            $products[] = [
                'id' => $row['JewelleryId'],
                'name' => htmlspecialchars($row['JewelleryTitle']),
                'price' => $row['JewelleryPrice'],
                'features' => htmlspecialchars($row['JewelleryDesc']),
                'image_url' => str_replace('../', '', $row['JewelleryImage']),
                'category' => 'Jewelry'
            ];
        }
    } elseif ($cat == 'Cosmetics') {
        $stmt = $connection->prepare("SELECT * FROM addcos WHERE CosId = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            $products[] = [
                'id' => $row['CosId'],
                'name' => htmlspecialchars($row['CosTitle']),
                'price' => $row['CosPrice'],
                'features' => htmlspecialchars($row['CosDesc']),
                'image_url' => str_replace('../', '', $row['CosImage']),
                'category' => 'Cosmetics'
            ];
        }
    }
}

include("header.php");
?>

<section class="hp-hero" style="--hero-bg: url('./Images/compare.jpg');"></section>
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
                <th>Price</th>
                <?php foreach ($products as $p): ?>
                    <td>Rs. <?php echo $p['price']; ?></td>
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

<?php include("footer.php"); ?>
