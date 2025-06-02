<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-2QEjKz5IOhGG5CeUlM8Abpd8P7P4F05K1YfZx8qgK/0i6w6Tj8yy0K8fj+X3D5QF" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #000;
            color: #fff;
        }

        .container {
            max-width: 100%;
            margin: auto;
            line-height: 1.6;
            padding: 40px 98px;
            margin-top: 3%;
        }

        .section-title {
            text-transform: uppercase;
            font-size: 48px;
            letter-spacing: 1px;
            color: #6e57ff;
            margin-bottom: 10px;
        }

        .heading {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .heading span {
            color: #fff;
            font-weight: 300;
        }

        .about-intro {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items: flex-start;
            margin-bottom: 60px;
        }

        .about-text {
            flex: 1 1 40%;
        }

        .about-text p {
            color: #aaa;
        }

        .about-perks {
            flex: 1 1 55%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 30px;
            border-radius: 10px;
        }

        .perk-box {
            padding: 10px;
        }

        .perk-box h4 {
            margin-bottom: 8px;
            font-weight: 200;
            font-size: 16px;
            color: #e4002b;
        }

        .perk-box p {
            font-size: 14px;
            color: #aaa;
        }

        .our-story {
            text-align: center;
            margin-bottom: 60px;
        }

        .our-story .subtitle {
            color: #e4002b;
            font-size: 14px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .our-story p {
            color: #aaa;
            max-width: 800px;
            margin: auto;
            margin-bottom: 15px;
        }

        .why-choose {
            text-align: center;
            margin-top: 60px;
        }

        .why-choose .subtitle,
        .services-section .subtitle {
            color: #e4002b;
            font-size: 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .why-choose h2,
        .services-section h2 {
            font-size: 32px;
            color: #fff;
        }

        .choose-boxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .choose-box {
            width: 280px;
            padding: 20px;
            background-color: #111;
            color: #aaa;
            border: 1px solid #444;
            border-radius: 8px;
            font-size: 14px;
            position: relative;
        }

        .choose-box::before {
            content: "“";
            font-size: 40px;
            color: #fff;
            position: absolute;
            top: -10px;
            left: 15px;
        }

        .choose-box.red {
            border-color: #e4002b;
        }

        .choose-box.purple {
            border-color: #6e57ff;
        }

        /* Services Section */
        .services-section {
            background-color: rgb(0, 0, 0);
            padding: 60px 20px;
            margin-top: 3px;
            text-align: center;
        }

        .services-grid {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .service-card {
            background-color: #111111;
            color: #ddd;
            max-width: 300px;
            border-radius: 8px;
            overflow: hidden;
            text-align: left;
        }

        .service-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .service-content {
            padding: 20px;
        }

        .service-content h3 {
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #e0e0e0;
        }

        .service-content p {
            font-size: 13px;
            margin-bottom: 20px;
            color: #b0b0b0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .about-intro {
                flex-direction: column;
            }

            .about-perks {
                grid-template-columns: 1fr;
            }

            .choose-boxes {
                flex-direction: column;
                align-items: center;
            }

            .services-grid {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>

    <div class="preloader">
        <div class="spinner"></div>
    </div>

    <nav id="shownavbar"></nav>

<section class="hero" style="--hero-bg: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1920&q=80');">
  <div class="hero-content">
    <h1>About Us</h1>
    <p>
      We’re a team of thinkers, writers, and creators passionate about exploring ideas that matter.
      Our mission is to provide thoughtful, well-crafted content that inspires, informs, and ignites conversation. <br>
      Whether it's personal growth, culture, or creativity — we're here to share perspectives that resonate.
    </p>
  </div>
</section>



    <div class="container">
        <div class="about-intro">
            <div class="about-text">
                <div class="section-title">About Us</div>
                <div class="heading"><span>All the</span><br>Perks</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="about-perks">
                <div class="perk-box">
                    <h4>Amazing Theaters</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="perk-box">
                    <h4>Pre Order Food</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="perk-box">
                    <h4>Comfort Amenities</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="perk-box">
                    <h4>Movie Go’er Rewards</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
            </div>
        </div>

        <div class="our-story">
            <div class="subtitle">Our Story</div>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium...</p>
            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos...</p>
            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam...</p>
        </div>

        <div class="why-choose">
            <div class="subtitle">Happy Viewers</div>
            <h2>Why <strong>Choose Us</strong></h2>

            <div class="choose-boxes">
                <div class="choose-box">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </div>
                <div class="choose-box purple">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </div>
                <div class="choose-box red">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </div>
            </div>
        </div>
    </div>

    <div class="services-section">
        <div class="subtitle">With Our Whole Heartly</div>
        <h2>Our Services / <strong>How Its Work</strong></h2>
        <div class="services-grid">
            <div style="border: 1px solid #aaa;" class="service-card">
                <img src="https://via.placeholder.com/300x200" alt="Service 1">
                <div class="service-content">
                    <h3>Service / Step One</h3>
                    <p>Preliminary details about this service or step that is easy to read and understand. Provide necessary and compelling information.</p>
                </div>
            </div>
            <div style="border: 1px solid #6e57ff;" class="service-card">
                <img src="https://via.placeholder.com/300x200" alt="Service 2">
                <div class="service-content">
                    <h3>Service / Step Two</h3>
                    <p>Preliminary details about this service or step that is easy to read and understand. Provide necessary and compelling information.</p>
                </div>
            </div>
            <div style="border: 1px solid #e4002b;" class="service-card">
                <img src="https://via.placeholder.com/300x200" alt="Service 3">
                <div class="service-content">
                    <h3>Service / Step Three</h3>
                    <p>Preliminary details about this service or step that is easy to read and understand. Provide necessary and compelling information.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="./navbar.js"></script>
</body>

</html>