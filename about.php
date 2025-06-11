<?php
$title = "About Page";
include("header.php");
?>


<!-- Hero Section -->
<section class="hero" style="--hero-bg: url('./Images/about\ hero\ section.jpg');">
  <div class="hero-content">
    <h1>Welcome to Our Cosmetics & Jewelry Blog</h1>
    <p>
      Discover the latest trends, beauty tips, and timeless jewelry pieces. Dive into the world of elegance and style — curated just for you.
    </p>
  </div>
</section>

<!-- About Perks -->
<div class="about-container">
    <div class="about-about-intro">
        <div class="about-about-text">
            <div class="about-section-title">About Us</div>
            <div class="about-heading"><span>All the</span><br>Perks</div>
            <p>What started as a small home-based initiative has grown into a full-fledged online business. Jenny now connects with customers across locations and offers a seamless platform to browse, shop, and receive personalized service with ease.</p>
        </div>

        <div class="about-about-perks">
            <div class="about-perk-box">
                <h4>Easy Product Browsing</h4>
                <p>Customers can view all categories and products in one place and add them to a shopping basket easily.</p>
            </div>
            <div class="about-perk-box">
                <h4>Customized Orders</h4>
                <p>Users can specify product quantities and finalize orders directly through the website interface.</p>
            </div>
            <div class="about-perk-box">
                <h4>Detailed Client Records</h4>
                <p>The system captures full client details including contact info, date of birth, category, and remarks.</p>
            </div>
            <div class="about-perk-box">
                <h4>Product Search</h4>
                <p>Clients can quickly search for specific products by name, improving convenience and accessibility.</p>
            </div>
        </div>
    </div>

    <!-- Our Story -->
    <div class="about-our-story">
        <div class="about-subtitle">Our Story</div>
        <p>Jenny began her journey by connecting with friends and relatives, showcasing her cosmetic and imitation jewelry collection. As demand grew and client numbers increased, she envisioned a platform that could handle orders efficiently while keeping personal connections intact.</p>
        <p>Today, our website enables users to browse products, place orders, and store customer data seamlessly—helping Jenny manage and grow her business while delivering a smooth experience to clients.</p>
        <p>With admin features like adding/deleting products, updating catalogs, and generating sales reports, our platform also supports efficient business administration and growth.</p>
    </div>

    <!-- Why Choose Us -->
    <div class="about-why-choose">
        <div class="about-subtitle">Happy Clients</div>
        <h2>Why <strong>Choose Us</strong></h2>

        <div class="about-choose-boxes">
            <div class="about-choose-box purple">
                We offer a full catalog of cosmetics and imitation jewelry products that are easy to browse and shop.
            </div>
            <div class="about-choose-box purple">
                Customers can place orders directly and provide all essential details online—saving time and effort.
            </div>
            <div class="about-choose-box purple">
                The admin has full control over inventory, data management, and business reports, ensuring quality service.
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="about-services-section">
    <div class="about-subtitle">With Our Whole Heart</div>
    <h2>Our Services / <strong>How It Works</strong></h2>
    <div class="about-services-grid">
        <div class="about-service-card">
            <img src="./Assets/Images/browse and add to car.jfif" alt="Browse and Shop">
            <div class="about-service-content">
                <h3>Step One: Browse & Add to Basket</h3>
                <p>Users can browse categories and products, specify quantities, and add items to the shopping basket with ease.</p>
            </div>
        </div>
        <div class="about-service-card">
            <img src="./Assets/Images/place your order.jfif" alt="Place Order">
            <div class="about-service-content">
                <h3>Step Two: Place Your Order</h3>
                <p>While ordering, users provide full contact info, DOB, and additional remarks—helping us personalize your experience.</p>
            </div>
        </div>
        <div class="about-service-card">
            <img src="./Assets/Images/admin panel.jfif" alt="Admin Control">
            <div class="about-service-content">
                <h3>Step Three: Admin Control Panel</h3>
                <p>The admin manages product entries, backups, reports, and top 10 product/client stats—all from a central dashboard.</p>
            </div>
        </div>
    </div>
</div>

<?php 
include("footer.php");
?>
