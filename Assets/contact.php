<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="./style.css">
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

    .contact-section {
      padding: 50px 69px;
      background: rgb(0, 0, 0);
      margin-top: 3%;
    }

    .contact-container {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      max-width: 100%;
      margin: auto;
      justify-content: space-between;
    }

    .contact-info {
      flex: 1 1 45%;
      line-height: 46px;
    }

    .section-title {
      text-transform: uppercase;
      font-size: 30px;
      letter-spacing: 1px;
      color: #6e57ff;
      margin-bottom: 16px;
    }

    .contact-info p {
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .details {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      padding-right: 1%;
    }

    .details div h4 {
      font-size: 16px;
      margin-bottom: 5px;
    }

    .details div p {
      font-size: 14px;
    }

    .social a {
      color: #333;
      margin-right: 10px;
      font-size: 18px;
      color: white;
      transition: color 0.3s;
    }

    .social a:hover {
      color: #6e57ff;
    }

    .contact-form {
      flex: 1 1 45%;
      background: #fff;
      padding: 30px;
      background-color: black;
      border: 1px solid #e4002b;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }

    .contact-form h3 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .contact-form p {
      font-size: 14px;
      color: #fff;
      margin-bottom: 20px;
    }

    .contact-form input,
    .contact-form textarea {
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

    .contact-form input::placeholder,
    .contact-form textarea::placeholder {
      color: rgba(255, 255, 255, 0.68);
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
      border: none;
      outline: none;
      border-bottom: 1px solid #e4002b;

    }

    .contact-form button {
      padding: 12px 20px;
      background: #6e57ff;
      color: #ffff;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      margin-top: 3%;
      transition: background 0.3s;
    }

    .contact-form button:hover {
      background: #555;
    }


    .map-section {
      padding: 0px 72px;
      padding-bottom: 5%;
      padding-top: 2%;
    }

    .map-section iframe {
      width: 100%;
      height: 400px;
      border: none;
      display: block;
      margin-top: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .contact-container {
        flex-direction: column;
      }

      .details {
        flex-direction: column;
        gap: 10px;
      }
    }
  </style>
</head>

<body>

  <div class="preloader">
    <div class="spinner"></div>
  </div>

  <nav id="shownavbar"></nav>

<section class="hero" style="--hero-bg: url('https://images.pexels.com/photos/3787299/pexels-photo-3787299.jpeg');">
  <div class="hero-content">
    <h1>Contact Us</h1>
    <p>
      We'd love to hear from you! <br>
      Whether you have questions, feedback, or collaboration ideas — reach out and let's connect. <br>
      Email us at <strong>hello@example.com</strong> or follow us on social media to stay updated.
    </p>
  </div>
</section>




  <section class="contact-section">
    <div class="contact-container">
      <div class="contact-info">
        <div class="section-title">We are always ready<br> to help you and <br>answer your questions</div>
        <p>Pacific hake false trevally queen parrotfish black prickleback mosshead warbonnet sweeper! Greenling sleeper.</p>

        <div class="details">
          <div>
            <h4>Call Center</h4>
            <p>800 100 90 95 20 34</p>
            <p>+1 (123) 1800 234-5678</p>
          </div>
          <div>
            <h4>Our Location</h4>
            <p>USA, New York - 1060</p>
            <p>Str. First Avenue 1</p>
          </div>
        </div>

        <div class="details">
          <div>
            <h4>Email</h4>
            <p>neuros@mail.co</p>
          </div>
          <div style="padding-right: 5%;">
            <h4>Social network</h4>
            <div class="social">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
              <a href="#"><i class="fab fa-dribbble"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <h3>Get in Touch</h3>
        <p>Define your goals and identify areas where AI can add value to your business.</p>
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
  <section class="map-section">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.418827199228!2d67.06539777519375!3d24.85101574541826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e81b8000001%3A0x3a0189645873f92!2sKashmir%20Park%20(Askari%20Amusement%20Park)!5e0!3m2!1sen!2s!4v1717326539244!5m2!1sen!2s"
      allowfullscreen=""
      loading="lazy">
    </iframe>
  </section>
  <script src="./navbar.js"></script>
</body>

</html>