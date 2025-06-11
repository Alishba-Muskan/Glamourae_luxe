<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">

</head>


<body>
    <div class="preloader">
        <div class="spinner"></div>
    </div>

    <nav id="shownavbar">
        <div class="upper-navbar">
            <div class="upper-left">
                <div class="menu-icon" onclick="openSidebar()"><i class="fas fa-bars"></i></div>
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search..." />
                </div>
            </div>
            <div class="logo"><img src="./Images/gl logo-01-01.png" alt=""></div>
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
                <li><a href="./cosmetics.php">Cosmetics</a></li>
                <li><a href="./jewellery.php">Jewellery</a></li>
                <li><a href="./compare&choose.php">Compare & Choose</a></li>
                <li><a href="./blog.php">Blog</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>


    <div class="sidebar" id="sidebar">
        <div class="close-btn" onclick="closeSidebar()">×</div>
        <div class="sidebar-logo"><img src="./Images/gl logo-01-01.png" alt=""></div>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./blog.php">Cosmetics</a></li>
            <li><a href="./contact.php">Jewellery</a></li>
            <li><a href="./blog.php">Blog</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
    </div>
    </nav>