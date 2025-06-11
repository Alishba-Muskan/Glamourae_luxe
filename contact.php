<?php
$title = "Contact Page";
include("header.php");
?>

<section class="hero" style="--hero-bg: url('./Images/CONTACT\ US.jpg');">
  <div class="hero-content">
    <h1>Contact Us</h1>
    <p>
      We'd love to hear from you! <br>
      Whether you're looking for trending cosmetics or stunning imitation jewelry — Jenny’s Glam Hub is here to help. <br>
      Email us at <strong>glamhub@example.com</strong> or connect with us on social media.
    </p>
  </div>
</section>

<section class="con-contact-section">
  <div class="con-contact-container">

    <div class="con-contact-info">
      <div class="con-section-title">
        Jenny is always ready<br> to help you and <br>answer your questions
      </div>
      <p>Need help with a product, placing an order, or looking for something custom for your occasion? Jenny is just a message away.</p>

      <div class="con-details">
        <div>
          <h4>Call Center</h4>
          <p>+1 (234) 567-8901</p>
          <p>+1 (234) 567-8902</p>
        </div>
        <div style="padding-right: 20px;">
          <h4>Our Location</h4>
          <p>USA, New York - 1060</p>
          <p>Str. First Avenue 1</p>
        </div>
      </div>

      <div class="con-details">
        <div>
          <h4>Email</h4>
          <p>glamhub@example.com</p>
        </div>
        <div style="padding-right: 38px;">
          <h4>Social network</h4>
          <div class="con-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="con-contact-form">
      <h3>Get in Touch</h3>
      <p>Let us know how we can help you — be it a product inquiry, bulk order, or gift suggestion.</p>

      <form action="con-submit.php" method="post" class="needs-validation" novalidate>

        <input name="user-name" type="text" placeholder="Full name" required />
        <div class="invalid-feedback">please provide a name.</div>

        <input name="user-email" type="email" placeholder="Email" required />
        <div class="invalid-feedback">please provide an Email.</div>

        <input name="user-subject" type="text" placeholder="Subject" required />
        <div class="invalid-feedback">please provide a Subject.</div>

        <textarea name="user-msg" placeholder="Message" required></textarea>
        <div class="invalid-feedback">please write some Message.</div>

        <button type="submit">Send a message</button>
      </form>

      <?php if (isset($_GET['successmsg'])): ?>
        <div id="flash-msg" style="padding: 12px; margin-top: 18px; background: #d4edda; color: #155724; border-radius: 5px;">
          ✅ <b>Success:</b> <?php echo ($_GET['successmsg']); ?>
        </div>
      <?php elseif (isset($_GET['errormsg'])): ?>
        <div id="flash-msg" style="padding: 12px; margin-top: 18px; background: #f8d7da; color: #721c24; border-radius: 5px;">
          ❌ <b>Error:</b> <?php echo ($_GET['errormsg']); ?>
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>

<section class="con-map-section">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.418827199228!2d67.06539777519375!3d24.85101574541826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e81b8000001%3A0x3a0189645873f92!2sKashmir%20Park%20(Askari%20Amusement%20Park)!5e0!3m2!1sen!2s!4v1717326539244!5m2!1sen!2s"
    allowfullscreen=""
    loading="lazy"></iframe>
</section>

<?php
include("footer.php");
?>