<?php
$title = "Home Page";
include("header.php");
?>

<!--  ===== whatsapp chat =====  -->
<button class="chat-btn" id="chatBtn">
    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
</button>

<div class="chat-box" id="chatBox">
    <div class="chat-header">
        <span>Customer Support</span>
        <span id="close-btn">&times;</span>
    </div>
    <div class="chat-body">
        Welcome to our site, if you need help simply reply to this message, we are online and ready to help.
        Please feel free to<br><br>
        Call/WhatsApp: <strong>+923000177325</strong>
    </div>
    <a href="https://wa.me/923000177325" class="whatsapp-link" target="_blank">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp"> Chat on WhatsApp
    </a>
</div>
<!--  ===== whatsapp chat =====  -->



<section class="hp-hero" style="--hero-bg: url('./images/banner.jpg');">
  <!-- <div class="hero-content">
    <h1>Contact Us</h1>
    <p>
      We'd love to hear from you! <br>
      Whether you're looking for trending cosmetics or stunning imitation jewelry — Jenny’s Glam Hub is here to help. <br>
      Email us at <strong>glamhub@example.com</strong> or connect with us on social media.
    </p>
  </div> -->
</section>


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


<div class="hp-creations-container">
    <h2>OUR BEST SELLERS</h2>
    <div class="hp-products">
        <div class="hp-creation-box">
            <a href="#"><img src="./Images/hp best product2.jpg" alt="New Cosmetics"></a>
            <p>BRACELET BEST SELLERS</p>
        </div>
        <div class="hp-creation-box">
            <a href="#"><img src="./Images/hp best product5.jpg" alt="Best Jewelry Sellers"></a>
            <p>NEW COSMETICS</p>
        </div>
        <div class="hp-creation-box">
            <a href="#"><img src="./Images/hp best product3.jpg" alt="Seasonal Offers"></a>
            <p>NECKLACE BEST SELLERS</p>
        </div>
        <div class="hp-creation-box">
            <a href="#"><img src="./Images/hp best product4.jpg" alt="Discount Deals"></a>
            <p>EARINGS BEST SELLERS</p>
        </div>
    </div>
</div>



 <!-- <div class="banner">
    <img src="" alt="Cosmetics and Jewelry" />
  </div> -->



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
      <img src="./Images/hp best product6.jpg" alt="Jewelry Stack" />
    </div>

    <div class="hp-small-image-stack">
      <div class="hp-small-image">
        <img src="./Images/hp best product7.jpg" alt="Cosmetic Product" />
      </div>
      <div class="hp-small-image">
        <img src="./Images/hp best product8.jpg" alt="Jewelry and Makeup" />
      </div>
    </div>
  </div>
</div>


<?php
include("footer.php");
?>