<?php
$title = "Home Page";
include("header.php");
?>

<style>
  
</style>

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

 <section class="hp-services">
        <h1>Welcome To Flower Shop</h1>
        <p class="hp-description">
            "Welcome to Florist – your one-stop destination for beautiful, fresh flowers! We offer a wide range of
            handpicked floral arrangements, perfect for every occasion. Whether you need a stunning bouquet for a loved
            one, elegant wedding flowers, or a charming gift, we’ve got you covered. Experience the beauty of nature
            with our fresh and fragrant blooms, delivered with love and care."
        </p>

        <div class="hp-features">
            <div class="hp-feature">
                <i class="fas fa-truck"></i>
                <div class="hp-feature-text">
                    <h3>Free Shipping</h3>
                    <p>Enjoy free delivery on all orders with easy returns.</p>
                </div>
            </div>

            <div class="hp-divider"></div>

            <div class="hp-feature">
                <i class="fas fa-thumbs-up"></i>
                <div class="hp-feature-text">
                    <h3>Secure Payments</h3>
                    <p>Shop with confidence with our secure payment options.</p>
                </div>
            </div>

            <div class="hp-divider"></div>

            <div class="hp-feature">
                <i class="fas fa-headset"></i>
                <div class="hp-feature-text">
                    <h3>24/7 Customer Support</h3>
                    <p>Our team is available anytime to assist you with your orders.</p>
                </div>
            </div>

            <div class="hp-divider"></div>

            <div class="hp-feature">
                <i class="fas fa-leaf"></i>
                <div class="hp-feature-text">
                    <h3>Fresh & Handpicked</h3>
                    <p>We ensure only the freshest and highest-quality flowers for you.</p>
                </div>
            </div>
        </div>

    </section>


<?php 
 include("footer.php");
?>