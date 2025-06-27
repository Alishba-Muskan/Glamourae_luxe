<?php
$title = "Blog Page";
include("header.php");

$blogPosts = [
  [
    "id" => 1,
    'title' => 'Complete Skincare Routine for Healthy Skin BEAUTY TIPS',
    'description' => 'From cleansing to moisturizing, learn the essential steps to keep your skin healthy all year round.',
    'image' => './Assets/Images/blog1.webp',
    'type' => 'main'
  ],
  [
    "id" => 2,
    'title' => 'How to Care for Your Gold Jewelry STYLING TIPS',
    'link' => '#',
    'image' => './Assets/Images/blog2.jfif',
    'type' => 'side'
  ],
  [
    "id" => 3,
    'title' => 'Benefits of Using Sunscreen Daily BEAUTY TIPS',
    'link' => '#',
    'image' => './Assets/Images/blog3.jfif',
    'type' => 'side'
  ],
  [
    "id" => 4,
    'title' => 'Nighttime Skincare Routine for Glowing Skin BEAUTY TIPS',
    'link' => '#',
    'image' => './Assets/Images/blog4.jfif',
    'type' => 'side',
    'cta' => 'Explore Collection →'
  ],
  [
    "id" => 5,
    'title' => 'Tips to Choose the Perfect Statement Necklace STYLING TIPS',
    'link' => '#',
    'image' => './Assets/images/blog5.jfif',
    'type' => 'side'
  ]
];

// Latest Products Array
$latestProducts = [
  [
    "id" => 6,
    'title' => 'Velvet Matte Lipstick Essentials BEAUTY TIPS',
    'category' => 'Cosmetics',
    'description' => 'Experience rich colors and long-lasting matte finish with our velvet matte lipstick collection.',
    'image' => './Assets/Images/blog6.jfif',
    'link' => '#'
  ],
  [
    "id" => 7,
    'title' => 'Classic Gold Hoop Earrings Care  STYLING TIPS',
    'category' => 'Jewelry',
    'description' => 'Learn how to maintain the shine and elegance of your gold hoop earrings with simple care tips.',
    'image' => './Assets/Images/blog7.jfif',
    'link' => '#'
  ],
  [
    "id" => 8,
    'title' => 'Hydrating Face Serum for All Skin Types BEAUTY TIPS',
    'category' => 'Skincare',
    'description' => 'Boost your skin’s glow and moisture with our nutrient-rich serum suitable for all skin types.',
    'image' => './Assets/Images/blog8.jfif',
    'link' => '#'
  ],
  [
    "id" => 9,
    'title' => 'Minimalist Silver Bracelet: STYLING TIPS',
    'category' => 'Jewelry',
    'description' => 'Delicate and versatile, discover how to style your silver bracelet for any occasion.',
    'image' => './Assets/Images/hp best product8.jpg',
    'link' => '#'
  ],
  [
    "id" => 10,
    'title' => 'Night Cream Benefits for Skin Repair BEAUTY TIPS',
    'category' => 'Skincare',
    'description' => 'Repair and rejuvenate your skin overnight with our nourishing night cream formula.',
    'image' => './Assets/Images/blog10.jfif',
    'link' => '#'
  ],
  [
    "id" => 11,
    'title' => 'Timeless Pearl Drop Earrings STYLING TIPS',
    'category' => 'Jewelry',
    'description' => 'Elegant and classic, these pearl drop earrings add a touch of sophistication to your look.',
    'image' => './Assets/Images/blog11.jfif',
    'link' => '#'
  ]
];

?>

<section class="hero" style="--hero-bg: url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=1920&q=80');">
  <div class="hero-content">
    <h1>Welcome to Our Cosmetics & Jewelry Blog</h1>
    <p>
      Discover the latest trends, beauty tips, and timeless jewelry pieces. Dive into the world of elegance and style — curated just for you.
    </p>
  </div>
</section>

<div class="blog-container">
  <h2 class="blog-h2">Our Insightful <span>Blog</span></h2>
  <p class="blog-intro">Explore expert advice, product highlights, and stories behind your favorite cosmetics and jewelry collections.</p>

  <div class="blog-blog-grid">
    <?php
    foreach ($blogPosts as $post) {
      if ($post['type'] === 'main') {
        echo '<div class="blog-main-post">';
        echo '<img src="' . $post['image'] . '" alt="Main Blog">';
        echo '<div class="blog-main-post-content">';
        echo '<h3>' . $post['title'] . '</h3>';
        echo '<p>' . $post['description'] . '</p>';
        echo '<a href="blog-detail.php?id=' . $post['id'] . '">' . ($post['cta'] ?? 'Read More →') . '</a>';
        echo '</div></div>';
      }
    }
    ?>

    <div class="blog-side-posts">
      <?php
      foreach ($blogPosts as $post) {
        if ($post['type'] === 'side') {
          echo '<div class="blog-side-post">';
          echo '<img src="' . $post['image'] . '" alt="Post">';
          echo '<div class="blog-side-post-content">';
          echo '<h4>' . $post['title'] . '</h4>';
          echo '<a href="blog-detail.php?id=' . $post['id'] . '">' . ($post['cta'] ?? 'Read More →') . '</a>';
          echo '</div></div>';
        }
      }
      ?>
    </div>
  </div>

  <h2 class="blog-latest-stories-title">Latest Stories</h2>
  <div class="blog-latest-stories">
    <?php
    foreach ($latestProducts as $product) {
      echo '<div class="blog-story">';
      echo '<img src="' . $product['image'] . '" alt="' . $product['title'] . '">';
      echo '<div class="blog-story-content">';
      echo '<h4>' . $product['title'] . '</h4>';
      echo '<p>' . $product['category'] . '</p>';
      echo '<p>' . $product['description'] . '</p>';
      echo '<a href="blog-detail.php?id=' . $product['id'] . '">Read More →</a>';
      echo '</div></div>';
    }
    ?>
  </div>
</div>

<?php
include("footer.php");
?>
