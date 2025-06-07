<footer class="footer">
  <div class="footer-content">

    <div class="footer-section about">
      <h2>Jenny's Beauty Collection</h2>
      <p class="tagline">Bringing Beauty to Your Doorstep</p>

      <h4>About Us</h4>
      <p class="about-text">
        We aim to connect customers with quality cosmetics and imitation jewelry products,
        combining beauty with affordability and convenience.
      </p>
    </div>

    <div class="footer-section">
      <h4>Information</h4>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Customer Reviews</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h4>Helpful Links</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Cosmetics</a></li>
        <li><a href="#">Jewellery</a></li>
      </ul>
    </div>

    <div class="footer-section contact-box">
      <h4>Quick Contact</h4>
      <p>Have questions or need assistance? We’re here to help you.</p>
      <button class="contact-btn">Contact Now</button>
    </div>

  </div>

  <div class="footer-bottom">
    <p>2025 © Jenny’s Beauty Collection. All Rights Reserved.</p>
  </div>
</footer>



<script src="./main.js"></script>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script> 
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

setTimeout( function(){
  let flashmsg = document.getElementById("flash-msg");
  if(flashmsg){
    flashmsg.style.display="none";
  }
}, 6000);

    </script>
</body>
</html>