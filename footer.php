<footer class="footer">
  <div class="footer-content">

    <div class="footer-section about" style="margin-right: 3%; margin-top: -8px;">
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
      <a href="./contact.php"><button class="contact-btn">Contact Now</button></a>
    </div>

  </div>

  <div class="footer-bottom">
    <p>2025 © Jenny’s Glamouraé Luxe. All Rights Reserved.</p>
  </div>
</footer>



<script src="./Assets/main.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>








<!-- //---------------------------------------Validation Bootstrap---------------------------------// -->

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



  //---------------------------------------Contact Form Alert---------------------------------//


  setTimeout(function() {
    let flashmsg = document.getElementById("flash-msg");
    if (flashmsg) {
      flashmsg.style.display = "none";
    }
  }, 3000);


  window.addEventListener("load", () => {
    new DataTable("#example");
  });



function addToCart(id, name, price, image) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            id,
            name,
            price,
            image,
            quantity: 1
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(`${name} added to cart!`);
            updateCartCountDisplay(data.cartCount);
        } else {
            showToast(`Error: ${data.message || 'Could not add to cart'}`);
        }
    })
    .catch(err => {
        console.error(err);
        showToast('Network error. Please try again.');
    });
}

function updateCartCountDisplay(count) {
    const cartCountElem = document.getElementById('cartCount');
    if (cartCountElem) {
        cartCountElem.textContent = count;
    }
}



    window.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            const successMsg = document.querySelector('.message.success');
            if (successMsg) {
                successMsg.style.display = 'none';
            }

            const errorMsg = document.querySelector('.message.error');
            if (errorMsg) {
                errorMsg.style.display = 'none';
            }
        }, 5000);
    });



  
  setTimeout(function() {
    const flashMsg = document.getElementById('flash-msg');
    if (flashMsg) {
      flashMsg.style.transition = "opacity 0.5s ease";
      flashMsg.style.opacity = 0;
      setTimeout(() => flashMsg.remove(), 500); 
    }
  }, 5000);



</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
  (function() {
    var s1 = document.createElement("script"),
      s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/684b6f7379f629190d666487/1itjammtl';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
  })();
</script>
<!--End of Tawk.to Script-->
</body>

</html>