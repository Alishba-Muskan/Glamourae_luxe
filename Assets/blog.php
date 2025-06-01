<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Our Insightful Blog</title>
  <link rel="stylesheet" href="./style.css">
  <style>
    :root {
      --bg: #111;
      --text: #eee;
      --muted: #aaa;
      --purple: #6e57ff;
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

    }

    h2 {
      text-align: center;
      font-size: 2.8rem;
      margin-bottom: 10px;
      color: var(--red);
    }

    .intro {
      text-align: center;
      max-width: 700px;
      margin: 0 auto 50px;
      color: var(--muted);
      font-size: 1.1rem;
    }

    /* Blog Main Grid */
    .blog-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 24px;
      margin-bottom: 60px;
    }

    .main-post {
      flex: 1 1 60%;
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
      color: var(--text);
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
      border-left: 4px solid var(--red);
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
      width: 100%;
      height: 200px;
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


    .hero {
      position: relative;
      height: 50vh;
      background: url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      width: 100%;
      margin-bottom: 5%;
    }

    .hero::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.56);
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 1000px;
      padding: 20px;
    }

    .hero h1 {
      font-size: 3rem;
      margin-bottom: 15px;
      color: #ffffff;
    }

    .hero p {
      font-size: 1.2rem;
      color: #cccccc;
      line-height: 1.6;
      margin: 0 auto;
      max-width: 700px;
    }
  </style>
</head>

<body>

  <div class="preloader">
    <div class="spinner"></div>
  </div>

  <nav id="shownavbar"></nav>

  <div class="container">
    <h2>Our Insightful <span>Blog</span></h2>
    <p class="intro">A bold perspective on startups, innovation, and future tech — tailored insights from our journey in the digital world.</p>

    <div class="blog-grid">
      <div class="main-post">
        <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9" alt="Main Blog">
        <div class="main-post-content">
          <h3>Exploring Future Renewable Energy Innovations</h3>
          <p>📅 December 11, 2023</p>
          <p>Embark on a journey through innovation as we explore renewable breakthroughs transforming our world. From solar to smart grids — the future is bright.</p>
        </div>
      </div>

      <div class="side-posts">
        <div class="side-post">
          <img src="https://images.unsplash.com/photo-1551836022-4c4c79ecde7b" alt="Post 1">
          <div class="side-post-content">
            <h4>From Ideas to Impact in a Startup's Journey</h4>
            <p>📅 November 20, 2023</p>
            <a href="#">Read More →</a>
          </div>
        </div>

        <div class="side-post">
          <img src="https://images.unsplash.com/photo-1581090700227-1c3f68b8a1c2" alt="Post 2">
          <div class="side-post-content">
            <h4>Navigating the Tech Landscape with Insights</h4>
            <p>📅 November 20, 2023</p>
            <a href="#">Read More →</a>
          </div>
        </div>

        <div class="side-post">
          <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" alt="Post 3">
          <div class="side-post-content">
            <h4>Behind the Scenes of Crafting Our Startup</h4>
            <p>📅 November 20, 2023</p>
            <a href="#">Read More →</a>
          </div>
        </div>
      </div>
    </div>


    <section class="hero">
      <div class="hero-content">
        <h1>Welcome to the Blog</h1>
        <p>
          Where thoughts are crafted with clarity, and every word carries depth. This is more than just a blog — it's a space for reflection, ideas, and meaningful conversations. Whether you're here to explore new perspectives, question the ordinary, or simply enjoy thoughtful writing — you're in the right place.
        </p>
      </div>
    </section>





    <h2 class="latest-stories-title">Latest Stories</h2>
    <div class="latest-stories">
      <div class="story">
        <img src="https://images.unsplash.com/photo-1505483531331-fc3cf89fd382" alt="Blog 1">
        <div class="story-content">
          <h4>The sunset faded to twilight</h4>
          <p>📅 April 13, 2019 • Photo • Trending</p>
          <p>I began walking, therefore, in a big curve, seeking some point of vantage and continually looking...</p>
          <a href="#">Read More →</a>
        </div>
      </div>

      <div class="story">
        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93" alt="Blog 2">
        <div class="story-content">
          <h4>Then going through some small strange motions</h4>
          <p>📅 April 8, 2019 • Food</p>
          <p>A moderate incline runs towards the foot of Maybury Hill, and down this we clattered...</p>
          <a href="#">Read More →</a>
        </div>
      </div>

      <div class="story">
        <img src="https://images.unsplash.com/photo-1470770903676-69b98201ea1c" alt="Blog 3">
        <div class="story-content">
          <h4>Two long weeks I wandered</h4>
          <p>📅 April 8, 2019 • Lifestyle</p>
          <p>Through two long weeks I wandered, something through the nights guided only by the stars...</p>
          <a href="#">Read More →</a>
        </div>
      </div>

      <div class="story">
        <img src="https://images.unsplash.com/photo-1448375240586-882707db888b" alt="Blog 4">
        <div class="story-content">
          <h4>I shouted above the sudden noise</h4>
          <p>📅 February 24, 2019 • Featured • Lifestyle • Food</p>
          <p>I shouted above the sudden noise. She looked away from me down the road...</p>
          <a href="#">Read More →</a>
        </div>
      </div>

      <div class="story">
        <img src="https://images.unsplash.com/photo-1593642634367-d91a135587b5" alt="Blog 5">
        <div class="story-content">
          <h4>At daybreak of the fifteenth day of my search</h4>
          <p>📅 February 1, 2019 • Featured • 4 Comments</p>
          <p>When the amphitheater had cleared I crept stealthily to the top and as the great excavation lay...</p>
          <a href="#">Read More →</a>
        </div>
      </div>

      <div class="story">
        <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac" alt="Blog 6">
        <div class="story-content">
          <h4>The great excavation lay far from the plaza</h4>
          <p>📅 January 18, 2019 • Photo • 3 Comments</p>
          <p>Far from the plaza and in an untenanted portion of the great dead city had laid trouble...</p>
          <a href="#">Read More →</a>
        </div>
      </div>
    </div>
  </div>
  <script src="./navbar.js"></script>

</body>

</html>