<?php
$title = "Contact Page";
include("header.php");
?>
<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', sans-serif;
  }

  body {
    background: black;
    color: white;
  }

  .con-contact-section {
    padding: 50px 69px;
    background: rgb(0, 0, 0);
    margin-top: 3%;
  }

  .con-contact-container {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    max-width: 100%;
    margin: auto;
    justify-content: space-between;
  }

  .con-contact-info {
    flex: 1 1 45%;
    line-height: 46px;
  }

  .con-section-title {
    text-transform: uppercase;
    font-size: 30px;
    letter-spacing: 1px;
    color: #ffd700;
    margin-bottom: 16px;
  }

  .con-contact-info p {
    margin-bottom: 20px;
    line-height: 1.6;
  }

  .con-details {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    padding-right: 1%;
  }

  .con-details div h4 {
    font-size: 16px;
    margin-bottom: 5px;
  }

  .con-details div p {
    font-size: 14px;
  }

  .con-social a {
    color: white;
    margin-right: 10px;
    font-size: 18px;
    transition: color 0.3s;
  }

  .con-social a:hover {
    color: #ffd700;
  }

  .con-contact-form {
    flex: 1 1 45%;
    background: black;
    padding: 30px;
    border: 1px solid #e4002b;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
  }

  .con-contact-form h3 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .con-contact-form p {
    font-size: 14px;
    color: #fff;
    margin-bottom: 20px;
  }

  .con-contact-form input,
  .con-contact-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    background-color: black;
    border: none;
    border-bottom: 1px solid #e4002b;
    border-radius: 9px;
    color: white;
    font-size: 14px;
  }

  .con-contact-form input::placeholder,
  .con-contact-form textarea::placeholder {
    color: rgba(255, 255, 255, 0.68);
  }

  .con-contact-form input:focus,
  .con-contact-form textarea:focus {
    border: none;
    outline: none;
    border-bottom: 1px solid #e4002b;
  }

  .con-contact-form button {
    padding: 12px 20px;
    background: #ffd700;
    color: black;
    font-size: 14px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    margin-top: 3%;
    transition: background 0.3s;
    transition: box-shadow 0.3s ease-in-out;
  }

  .con-contact-form button:hover {
    border: 1px solid #ffd700;
    color: white;
    background-color: black;
    box-shadow: 0 0 10px #ffd700, 0 0 10px #ffd700, 0 0 20px #ffd700;
    transition: all 0.5s ease-in-out;
  }

  .con-map-section {
    padding: 0px 72px;
    padding-bottom: 5%;
    padding-top: 2%;
  }

  .con-map-section iframe {
    width: 100%;
    height: 400px;
    border: none;
    display: block;
    margin-top: 0;
  }

  @media (max-width: 768px) {
    .con-contact-container {
      flex-direction: column;
    }

    .con-details {
      flex-direction: column;
      gap: 10px;
    }
  }
</style>

<section class="hero" style="--hero-bg: url('https://images.pexels.com/photos/3787299/pexels-photo-3787299.jpeg');">
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
      <div class="con-section-title">Jenny is always ready<br> to help you and <br>answer your questions</div>
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
      <form action="">
        <input type="text" placeholder="Full name" required />
        <input type="email" placeholder="Email" required />
        <input type="text" placeholder="Subject" required />
        <textarea placeholder="Message" required></textarea>
        <button type="submit">Send a message</button>
      </form>
    </div>
  </div>
</section>

<section class="con-map-section">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.418827199228!2d67.06539777519375!3d24.85101574541826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e81b8000001%3A0x3a0189645873f92!2sKashmir%20Park%20(Askari%20Amusement%20Park)!5e0!3m2!1sen!2s!4v1717326539244!5m2!1sen!2s"
    allowfullscreen=""
    loading="lazy">
  </iframe>
</section>

<?php
include("footer.php");
?>
