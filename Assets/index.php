<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Navbar with Dropdowns</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="./style.css">
</head>

<body bgcolor="black">

  <div class="preloader">
    <div class="spinner"></div>
  </div>

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

  <nav id="shownavbar"></nav>

  <script src="./navbar.js"></script>
</body>

</html>