let shownav = document.getElementById("shownavbar");

shownav.innerHTML = `
    <div class="upper-navbar">
      <div class="upper-left">
        <div class="menu-icon" onclick="openSidebar()"><i class="fas fa-bars"></i></div>
        <div class="search-bar">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="Search..." />
        </div>
      </div>
     <div class="logo">LOGO</div>
      <div class="upper-right">
        <div class="icon"><i class="fas fa-shopping-cart"></i></div>
        <div class="icon"><i class="fas fa-user-plus"></i></div>
      </div>

      <div class="full-search">
        <input type="text" placeholder="Search..." />
      </div>
    </div>

    
    <div class="lower-navbar">
      <ul class="nav-links">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./blog.php">Blog</a></li>
        <li><a href="./contact.php">contact</a></li>
        <li><a href="./about.php">About</a></li>

        <li class="dropdown">
          <a href="#">blog <i class="fas fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="#">Web Development</a></li>
            <li><a href="#">App Development</a></li>
            <li><a href="#">SEO</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#">blog <i class="fas fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
            <li><a href="#">Profile</a></li>
          </ul>
        </li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </nav>

  
  <div class="sidebar" id="sidebar">
    <div class="close-btn" onclick="closeSidebar()">×</div>
    <div class="sidebar-logo">LOGO</div>
    <ul>
      <li><a href="">home</a></li>
      <li><a href="">about</a></li>
      <li><a href="">contact</a></li>
      <li><a href="">service</a></li>
      <li><a href="">sign up</a></li>
      <li><a href="">blog</a></li>
      <li><a href="">category</a></li>
    </ul>
  </div>`
  ;


function openSidebar() {
  document.getElementById("sidebar").style.display = "block";
}

function closeSidebar() {
  document.getElementById("sidebar").style.display = "none";
}




document.addEventListener('DOMContentLoaded', () => {
  const chatBtn = document.getElementById("chatBtn"),
    chatBox = document.getElementById("chatBox"),
    closeBtn = document.getElementById("close-btn");

  const toggleChat = () => {
    const isVisible = chatBox.classList.toggle("visible");
    chatBtn.style.boxShadow = isVisible ? "0 0 15px #25D366" : "none";
  };

  setTimeout(toggleChat, 2000);
  chatBtn?.addEventListener("click", toggleChat);
  closeBtn?.addEventListener("click", () => {
    chatBox.classList.remove("visible");
    chatBtn.style.boxShadow = "none";
  });
});






document.addEventListener('DOMContentLoaded', function () {
  setTimeout(() => {
    const preloader = document.querySelector('.preloader');
    preloader.style.opacity = '0';
    preloader.style.transform = 'scale(0.8)';

    setTimeout(() => {
      preloader.style.display = 'none';
    }, 1000);
  }, 6000);
});
