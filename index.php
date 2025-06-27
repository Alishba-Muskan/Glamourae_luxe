<?php
$title = "Home Page";
include("header.php");
include_once "./Admin/conn.php";

// Fetch products from TopSelling table
$topSellingQuery = "SELECT * FROM TopSelling ORDER BY TopSellingId DESC LIMIT 10"; 
$result = mysqli_query($connection, $topSellingQuery);
$topSellingProducts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $topSellingProducts[] = [
        'id' => (int)$row['TopSellingId'],
        'name' => htmlspecialchars($row['TopSellingTitle']),
        'description' => htmlspecialchars($row['TopSellingDesc']),
        'price' => floatval($row['TopSellingPrice']),
        'category' => strtolower(trim($row['TopSellingCategory'])),
        'quality' => strtolower(trim($row['TopSellingTier'])),
        'image' => str_replace('../', '', $row['TopSellingImage']),
        'quantity' => (int)$row['TopSellingQuantity']
    ];
}
?>

<section class="hp-hero" style="--hero-bg: url('./Images/1.jpeg');"></section>

<section class="hp-services">
    <h1>Welcome To Jenny's Glamouraé Luxe Store</h1>
    <p class="hp-description">
        "Welcome to Jenny’s Glam Store – your one-stop destination for trendy cosmetics and elegant imitation jewelry! We bring you a handpicked collection of beauty products and stylish accessories that suit every mood and occasion. Whether you're looking for daily skincare essentials, bold makeup, or fashionable jewelry, we’ve got everything you need to shine with confidence. Discover your glam with us today!"
    </p>
    <div class="hp-features">
        <div class="hp-feature">
            <i class="fas fa-truck"></i>
            <div class="hp-feature-text">
                <h3>Free Shipping</h3>
                <p>Enjoy fast and free delivery on all orders, with hassle-free returns.</p>
            </div>
        </div>
        <div class="hp-divider"></div>
        <div class="hp-feature">
            <i class="fas fa-thumbs-up"></i>
            <div class="hp-feature-text">
                <h3>Secure Payments</h3>
                <p>Shop confidently with our trusted and secure payment options.</p>
            </div>
        </div>
        <div class="hp-divider"></div>
        <div class="hp-feature">
            <i class="fas fa-headset"></i>
            <div class="hp-feature-text">
                <h3>24/7 Customer Support</h3>
                <p>Our friendly team is always here to help you with your orders and queries.</p>
            </div>
        </div>
        <div class="hp-divider"></div>
        <div class="hp-feature">
            <i class="fas fa-leaf"></i>
            <div class="hp-feature-text">
                <h3>Premium Quality</h3>
                <p>We offer only high-quality, carefully curated products for your beauty and style needs.</p>
            </div>
        </div>
    </div>
</section>

<section class="top-selling">
  <h2>Top Selling Products</h2>
  <div class="products" id="topSellingGrid"></div>
</section>

<div class="hp-container-boutique">
  <div class="hp-text-section-boutique">
    <h2>YOUR STYLE OUR PASSION</h2>
    <p>
      At Jenny's Boutique, we believe every customer deserves beautifully curated cosmetics and imitation jewelry.
      From elegant earrings to daily skincare essentials, our collection is designed to add charm and confidence
      to your every day. With quality products and personalized service, we aim to make every experience memorable.
    </p>
  </div>

  <div class="hp-gallery-section">
    <div class="hp-large-image">
      <img src="./Assets/Images/hp best product2.jpg" alt="Jewelry Stack" />
    </div>

    <div class="hp-small-image-stack">
      <div class="hp-small-image">
        <img src="./Assets/Images/hp best product3.jpg" alt="Cosmetic Product" />
      </div>
      <div class="hp-small-image">
        <img src="./Assets/Images/hp best product4.jpg" alt="Jewelry and Makeup" />
      </div>
    </div>
  </div>
</div>

<script>
  const topSellingProducts = <?= json_encode($topSellingProducts, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

  function createProductCard(p) {
    const shortDesc = p.description.length > 30 ? p.description.substring(0, 30) + "..." : p.description;
    const outOfStock = p.quantity === 0;

    return `
      <div class="product ${outOfStock ? 'product--disabled' : ''}">
        <div class="product__media">
          <img src="${p.image}" alt="${p.name}" class="product__image">
        </div>
        <div class="product__details">
          <span class="product__category">${p.category}</span>
          <h3 class="product__title">${p.name}</h3>
          <p class="product__description">${shortDesc}</p>
          <div class="product__footer">
            <div class="product__price">Rs : ${p.price.toFixed(2)}</div>
            ${outOfStock
              ? `<div class="product__stock-status">Out of Stock</div>`
              : `<div class="product__stock-status in-stock">In Stock</div>`
            }
          </div>
          <p class="productcard_viewdetail"><a href="TopSelling_detail.php?id=${encodeURIComponent(p.id)}">View Details →</a></p>
        </div>
      </div>`;
  }

  document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('topSellingGrid');
    renderProducts(topSellingProducts);

    function renderProducts(products) {
      container.innerHTML = products.length
        ? products.map(createProductCard).join('')
        : '<p>No products available.</p>';
    }

    // Search input support (if present)
    const searchInput = document.getElementById('searchInput') || document.getElementById('fullsearchinput');
    if (searchInput) {
      searchInput.addEventListener('input', (e) => {
        const query = e.target.value.trim().toLowerCase();
        const filtered = topSellingProducts.filter(p =>
          p.name.toLowerCase().includes(query) ||
          p.description.toLowerCase().includes(query) ||
          p.category.toLowerCase().includes(query)
        );
        renderProducts(filtered);
      });
    }
  });
</script>

<?php include("footer.php"); ?>
