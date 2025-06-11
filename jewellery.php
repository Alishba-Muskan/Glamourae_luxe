<?php
$title = "Jewellery Page";
include("header.php");



$products = [
    [
        "title" => "Luminare Marine",
        "price" => 350,
        "image" => "https://images.pexels.com/photos/9897926/pexels-photo-9897926.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Elegant design blended with marine-grade durability for timeless style."
    ],
    [
        "title" => "Helux Nautica",
        "price" => 50,
        "image" => "https://images.pexels.com/photos/277319/pexels-photo-277319.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Lightweight and perfect for those who love classic timepieces."
    ],
    [
        "title" => "Exquisit Atros",
        "price" => 150,
        "image" => "https://images.pexels.com/photos/404181/pexels-photo-404181.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Modern aesthetics with a powerful presence for any occasion."
    ],
    [
        "title" => "Helux Spielberg",
        "price" => 250,
        "image" => "https://images.pexels.com/photos/3766111/pexels-photo-3766111.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Precision meets performance — inspired by a spirit of adventure."
    ],
    [
        "title" => "Regalli Claustroph",
        "price" => 450,
        "image" => "https://images.pexels.com/photos/9897857/pexels-photo-9897857.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Unmatched quality and luxury crafted into one iconic design."
    ],
    [
        "title" => "Luminare Luxus",
        "price" => 550,
        "image" => "https://images.pexels.com/photos/10436602/pexels-photo-10436602.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Luxury in its purest form — for those who accept nothing less."
    ],
    [
        "title" => "Regalli Hetchers",
        "price" => 650,
        "image" => "https://images.pexels.com/photos/10478973/pexels-photo-10478973.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Engineered for elegance with a bold signature statement."
    ],
    [
        "title" => "Helux MVII",
        "price" => 750,
        "image" => "https://images.pexels.com/photos/10414981/pexels-photo-10414981.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Minimalist masterpiece that redefines everyday wear."
    ],
    [
        "title" => "Exquisit Remos",
        "price" => 850,
        "image" => "https://images.pexels.com/photos/10443775/pexels-photo-10443775.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Every detail crafted to perfection for the elite connoisseur."
    ],
    [
        "title" => "Helux Hostenhof",
        "price" => 950,
        "image" => "https://images.pexels.com/photos/9423283/pexels-photo-9423283.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "description" => "Built for those who demand bold design and lasting performance."
    ]
];
?>

<section class="hero" style="--hero-bg: url('./Images/Jewellery\ banner.jpg');"></section>

    <div class="container">
      <div class="product-list">
        <?php foreach($products as $pro){ ?>
          <div class="product">
            <div class="img">
              <img src="<?php echo $pro["image"] ?>" alt="">
            </div>
            <div class="info">
              <h3><?php echo $pro["title"] ?></h3>
              <p>Rs: <?php echo $pro["price"] ?></p>
            </div>
            <p class="desc"><?php echo $pro["description"] ?></p>
            <button>Add to Cart</button>
            <a href="#" class="view-link">View Details.....</a>
          </div>
        <?php } ?>
      </div>
    </div>
<?php
include("footer.php");
?>