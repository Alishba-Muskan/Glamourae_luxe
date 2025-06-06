<?php
$title = "About Page";
include("header.php");
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #000;
        color: #fff;
    }

    .container {
        max-width: 100%;
        margin: auto;
        line-height: 1.6;
        padding: 40px 98px;
        margin-top: 3%;
    }

    .section-title {
        text-transform: uppercase;
        font-size: 48px;
        letter-spacing: 1px;
        color: #ffd700;
        margin-bottom: 10px;
    }

    .heading {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .heading span {
        color: #fff;
        font-weight: 300;
    }

    .about-intro {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        align-items: flex-start;
        margin-bottom: 60px;
    }

    .about-text {
        flex: 1 1 40%;
    }

    .about-text p {
        color: #aaa;
    }

    .about-perks {
        flex: 1 1 55%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        padding: 30px;
        border-radius: 10px;
    }

    .perk-box {
        padding: 10px;
    }

    .perk-box h4 {
        margin-bottom: 8px;
        font-weight: 200;
        font-size: 16px;
        color: #e4002b;
    }

    .perk-box p {
        font-size: 14px;
        color: #aaa;
    }

    .our-story {
        text-align: center;
        margin-bottom: 60px;
    }

    .our-story .subtitle {
        color: #e4002b;
        font-size: 14px;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .our-story p {
        color: #aaa;
        max-width: 800px;
        margin: auto;
        margin-bottom: 15px;
    }

    .why-choose {
        text-align: center;
        margin-top: 60px;
    }

    .why-choose .subtitle,
    .services-section .subtitle {
        color: #e4002b;
        font-size: 14px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .why-choose h2,
    .services-section h2 {
        font-size: 32px;
        color: #fff;
    }

    .choose-boxes {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-top: 40px;
    }

    .choose-box {
        width: 280px;
        padding: 20px;
        background-color: #111;
        color: #aaa;
        border: 1px solid #444;
        border-radius: 8px;
        font-size: 14px;
        position: relative;
    }

    .choose-box::before {
        content: "“";
        font-size: 40px;
        color: #fff;
        position: absolute;
        top: -10px;
        left: 15px;
    }

    .choose-box.red {
        border-color: #e4002b;
    }

    .choose-box.purple {
        border-color: #ffd700;
    }

    /* Services Section */
    .services-section {
        background-color: rgb(0, 0, 0);
        padding: 60px 20px;
        margin-top: 3px;
        text-align: center;
    }

    .services-grid {
        display: flex;
        gap: 30px;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 40px;
    }

    .service-card {
        background-color: #111111;
        color: #ddd;
        max-width: 300px;
        border-radius: 8px;
        overflow: hidden;
        text-align: left;
    }

    .service-card img {
        width: 100%;
        height: auto;
        display: block;
    }

    .service-content {
        padding: 20px;
    }

    .service-content h3 {
        font-size: 14px;
        text-transform: uppercase;
        margin-bottom: 10px;
        color: #e0e0e0;
    }

    .service-content p {
        font-size: 13px;
        margin-bottom: 20px;
        color: #b0b0b0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .about-intro {
            flex-direction: column;
        }

        .about-perks {
            grid-template-columns: 1fr;
        }

        .choose-boxes {
            flex-direction: column;
            align-items: center;
        }

        .services-grid {
            flex-direction: column;
            align-items: center;
        }
    }
</style>

<!-- Hero Section -->
<!-- Hero Section -->
<section class="hero" style="background-image: url('./Images/about\ hero\ section.jpg'); background-size: cover; background-position: center; padding: 80px 20px; text-align: center;">
    <div class="hero-content">
        <h1 style="font-size: 48px; color: #fff;">About Us</h1>
        <p style="color: #ccc; max-width: 800px; margin: auto;">
            Jenny's Cosmetics & Imitation Jewelry started as a home-based business with a passion to offer high-quality products to friends and family.<br> With growing popularity and increasing client demand, the need for a digital platform became essential.
        </p>
    </div>
</section>


<!-- About Perks -->
<div class="container">
    <div class="about-intro">
        <div class="about-text">
            <div class="section-title">About Us</div>
            <div class="heading"><span>All the</span><br>Perks</div>
            <p>What started as a small home-based initiative has grown into a full-fledged online business. Jenny now connects with customers across locations and offers a seamless platform to browse, shop, and receive personalized service with ease.</p>
        </div>

        <div class="about-perks">
            <div class="perk-box">
                <h4>Easy Product Browsing</h4>
                <p>Customers can view all categories and products in one place and add them to a shopping basket easily.</p>
            </div>
            <div class="perk-box">
                <h4>Customized Orders</h4>
                <p>Users can specify product quantities and finalize orders directly through the website interface.</p>
            </div>
            <div class="perk-box">
                <h4>Detailed Client Records</h4>
                <p>The system captures full client details including contact info, date of birth, category, and remarks.</p>
            </div>
            <div class="perk-box">
                <h4>Product Search</h4>
                <p>Clients can quickly search for specific products by name, improving convenience and accessibility.</p>
            </div>
        </div>
    </div>

    <!-- Our Story -->
    <div class="our-story">
        <div class="subtitle">Our Story</div>
        <p>Jenny began her journey by connecting with friends and relatives, showcasing her cosmetic and imitation jewelry collection. As demand grew and client numbers increased, she envisioned a platform that could handle orders efficiently while keeping personal connections intact.</p>
        <p>Today, our website enables users to browse products, place orders, and store customer data seamlessly—helping Jenny manage and grow her business while delivering a smooth experience to clients.</p>
        <p>With admin features like adding/deleting products, updating catalogs, and generating sales reports, our platform also supports efficient business administration and growth.</p>
    </div>

    <!-- Why Choose Us -->
    <div class="why-choose">
        <div class="subtitle">Happy Clients</div>
        <h2>Why <strong>Choose Us</strong></h2>

        <div class="choose-boxes">
            <div class="choose-box purple">
                We offer a full catalog of cosmetics and imitation jewelry products that are easy to browse and shop.
            </div>
            <div class="choose-box purple">
                Customers can place orders directly and provide all essential details online—saving time and effort.
            </div>
            <div class="choose-box purple">
                The admin has full control over inventory, data management, and business reports, ensuring quality service.
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="services-section">
    <div class="subtitle">With Our Whole Heart</div>
    <h2>Our Services / <strong>How It Works</strong></h2>
    <div class="services-grid">
        <div style="border: 1px solid #ffd700;" class="service-card">
            <img src="https://images.unsplash.com/photo-1612806021230-418b0ba1fbe5?auto=format&fit=crop&w=600&q=80" alt="Browse and Shop">
            <div class="service-content">
                <h3>Step One: Browse & Add to Basket</h3>
                <p>Users can browse categories and products, specify quantities, and add items to the shopping basket with ease.</p>
            </div>
        </div>
        <div style="border: 1px solid #ffd700;" class="service-card">
            <img src="https://images.unsplash.com/photo-1612817158783-9ce82f169c68?auto=format&fit=crop&w=600&q=80" alt="Place Order">
            <div class="service-content">
                <h3>Step Two: Place Your Order</h3>
                <p>While ordering, users provide full contact info, DOB, and additional remarks—helping us personalize your experience.</p>
            </div>
        </div>
        <div style="border: 1px solid #ffd700;" class="service-card">
            <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=600&q=80" alt="Admin Control">
            <div class="service-content">
                <h3>Step Three: Admin Control Panel</h3>
                <p>The admin manages product entries, backups, reports, and top 10 product/client stats—all from a central dashboard.</p>
            </div>
        </div>
    </div>
</div>

<?php 
include("footer.php");
?>