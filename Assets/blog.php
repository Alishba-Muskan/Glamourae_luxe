<?php
$title = "Blog Page";
include("header.php");
?>
<style>
  :root {
    --bg: #111;
    --text: #eee;
    --muted: #aaa;
    --purple: #ffd700;
    --red: #e4002b;
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: 'Segoe UI', sans-serif;
    background-color: var(--bg);
    color: var(--text);
  }

  .container {
    max-width: 100%;
    margin: auto;
    padding: 60px 80px;
    margin-top: -6%;
  }

  h2 {
    text-align: center;
    font-size: 2.8rem;
    margin-bottom: 28px;
    color: var(--red);
  }

  .intro {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 50px;
    color: var(--muted);
    font-size: 1.1rem;
  }

  .blog-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    margin-bottom: 60px;
  }

  .main-post {
    flex: 1 1 40%;
    position: relative;
    border-radius: 14px;
    overflow: hidden;
  }

  .main-post img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.7);
  }

  .main-post-content {
    position: absolute;
    bottom: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0));
    color: white;
    padding: 24px;
  }

  .main-post-content h3 {
    font-size: 1.8rem;
    margin-bottom: 10px;
    color: var(--purple);
  }

  .main-post-content p {
    font-size: 0.95rem;
    color: #ccc;
  }

  .side-posts {
    flex: 1 1 35%;
    display: flex;
    flex-direction: column;
    gap: 18px;
  }

  .side-post {
    background: #1a1a1a;
    display: flex;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease;
  }

  .side-post:hover {
    transform: translateY(-0.2px);
    transition: all 0.3s ease-in;
    border-left: 4px solid var(--purple);
  }

  .side-post img {
    width: 110px;
    height: 110px;
    object-fit: cover;
  }

  .side-post-content {
    padding: 12px;
    flex: 1;
  }

  .side-post-content h4 {
    font-size: 1rem;
    color: var(--text);
    margin-bottom: 6px;
  }

  .side-post-content p {
    font-size: 0.8rem;
    color: var(--muted);
  }

  .side-post-content a {
    display: inline-block;
    margin-top: 8px;
    color: var(--purple);
    text-decoration: none;
    font-weight: bold;
    font-size: 0.85rem;
  }

  .side-post-content a:hover {
    color: var(--red);
  }


  .latest-stories-title {
    font-size: 2rem;
    margin-bottom: 5%;
    text-align: center;
    color: var(--text);
  }

  .latest-stories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
  }

  .story {
    background: #1b1b1b;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
  }

  .story:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
  }

  .story img {
    width: 90%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .story:hover img {
    transform: scale(1.05);
  }

  .story-content {
    padding: 18px 20px;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .story-content h4 {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text);
  }

  .story-content p {
    font-size: 0.85rem;
    color: var(--muted);
  }

  .story-content a {
    margin-top: 10px;
    color: var(--red);
    text-decoration: none;
    font-weight: bold;
    font-size: 0.85rem;
  }

  .story-content a:hover {
    color: var(--purple);
  }

  @media (max-width: 768px) {
    .blog-grid {
      flex-direction: column;
    }

    .main-post,
    .side-posts {
      flex: 1 1 100%;
    }

    .side-post {
      flex-direction: row;
    }
  }

</style>
<section class="hero" style="--hero-bg: url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=1920&q=80');">
  <div class="hero-content">
    <h1>Welcome to Our Cosmetics & Jewelry Blog</h1>
    <p>
      Discover the latest trends, beauty tips, and timeless jewelry pieces. Dive into the world of elegance and style — curated just for you.
    </p>
  </div>
</section>

<div class="container">
  <h2>Our Insightful <span>Blog</span></h2>
  <p class="intro">Explore expert advice, product highlights, and stories behind your favorite cosmetics and jewelry collections.</p>

  <div class="blog-grid">
    <div class="main-post">
      <img src="./Images/blog1.webp" alt="Main Blog">
      <div class="main-post-content">
        <h3>Top 5 Lipsticks to Try This Season</h3>
        <p>📅 June 1, 2025</p>
        <p>From bold reds to subtle nudes, find out which lipsticks are making waves this season and how to pick the perfect shade for your skin tone.</p>
      </div>
    </div>

    <div class="side-posts">
      <div class="side-post">
        <img src="./Images/blog2.jfif" alt="Post 1">
        <div class="side-post-content">
          <h4>How to Care for Your Gold Jewelry</h4>
          <p>📅 May 20, 2025</p>
          <a href="#">Read More →</a>
        </div>
      </div>

      <div class="side-post">
        <img src="./Images/blog3.jfif" alt="Post 2">
        <div class="side-post-content">
          <h4>Skincare Routine for Glowing Skin</h4>
          <p>📅 May 18, 2025</p>
          <a href="#">Read More →</a>
        </div>
      </div>

      <div class="side-post">
        <img src="./Images/blog4.jfif" alt="Post - Ring">
        <div class="side-post-content">
          <h4>Elegant Gold Ring</h4>
          <p>📅 May 18, 2025</p>
          <a href="#">Explore Collection →</a>
        </div>
      </div>


      <div class="side-post">
        <img src="./images/blog5.jfif" alt="Post 3">
        <div class="side-post-content">
          <h4>Statement Necklaces That Transform Any Outfit</h4>
          <p>📅 May 15, 2025</p>
          <a href="#">Read More →</a>
        </div>
      </div>
    </div>
  </div>

  <h2 class="latest-stories-title">Latest Products</h2>
  <div class="latest-stories">
    <div class="story">
      <img src="./Images/blog6.jfif" alt="Velvet Matte Lipstick Collection">
      <div class="story-content">
        <h4>Velvet Matte Lipstick Collection</h4>
        <p>📅 Released: June 2025 • Cosmetics</p>
        <p>Experience rich colors and long-lasting matte finish with our new velvet matte lipstick range.</p>
        <a href="#">Shop Now →</a>
      </div>
    </div>

    <div class="story">
      <img src="./Images/blog7.jfif" alt="Elegant Gold Hoop Earrings">
      <div class="story-content">
        <h4>Elegant Gold Hoop Earrings</h4>
        <p>📅 Released: May 2025 • Jewelry</p>
        <p>Timeless design with a modern touch — perfect for everyday glam.</p>
        <a href="#">Shop Now →</a>
      </div>
    </div>

    <div class="story">
      <img src="./Images/blog8.jfif" alt="Hydrating Face Serum">
      <div class="story-content">
        <h4>Hydrating Face Serum</h4>
        <p>📅 Released: April 2025 • Skincare</p>
        <p>Boost your skin’s glow and moisture with our nutrient-rich serum.</p>
        <a href="#">Shop Now →</a>
      </div>
    </div>

    <div class="story">
      <img src="./Images/blog9.jfif" alt="Silver Bracelet">
      <div class="story-content">
        <h4>Minimalist Silver Bracelet</h4>
        <p>📅 Released: March 2025 • Jewelry</p>
        <p>Delicate and versatile, this silver bracelet adds a subtle sparkle to any look.</p>
        <a href="#">Shop Now →</a>
      </div>
    </div>

    <div class="story">
      <img src="./Images/blog10.jfif" alt="Nourishing Night Cream">
      <div class="story-content">
        <h4>Nourishing Night Cream</h4>
        <p>📅 Released: February 2025 • Skincare</p>
        <p>Repair and rejuvenate your skin overnight with our rich and creamy formula.</p>
        <a href="#">Shop Now →</a>
      </div>
    </div>

    <div class="story">
      <img src="./Images/blog11.jfif" alt="Pearl Drop Earrings">
      <div class="story-content">
        <h4>Classic Pearl Drop Earrings</h4>
        <p>📅 Released: January 2025 • Jewelry</p>
        <p>Elegant and timeless, these pearl earrings are perfect for special occasions.</p>
        <a href="#">Shop Now →</a>
      </div>
    </div>
  </div>
</div>


<?php
include("footer.php");
?>