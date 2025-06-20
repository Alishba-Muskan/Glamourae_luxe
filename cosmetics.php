<?php
// include("header.php");

include("./Admin/conn.php");
$countQuery = "SELECT COUNT(*) as total FROM addjewellery";
$countResult = mysqli_query($connection, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalProducts = $countRow['total'];

?>
<!-- ... existing PHP code for totalProducts ... -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Éclat Cosmetics | Luxury Beauty</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./Cos&Jew.css" />
</head>

<body>
    <div class="main-container">
        <aside class="sidebar">
            <div class="category-section">
                <h2 class="section-title">Shop By Category</h2>
                <ul class="category-list" id="categoryList">
                    <li class="category-item active" data-category="all">
                        <div class="category-icon"><i class="fas fa-th-large"></i></div>
                        <span class="category-name">All Categories</span>
                        <span class="category-count">20</span>
                    </li>
                    <li class="category-item" data-category="lips">
                        <div class="category-icon"><i class="fas fa-kiss-wink-heart"></i></div>
                        <span class="category-name">Lips</span>
                        <span class="category-count">9</span>
                    </li>
                    <li class="category-item" data-category="face">
                        <div class="category-icon"><i class="fas fa-spa"></i></div>
                        <span class="category-name">Face</span>
                        <span class="category-count">9</span>
                    </li>
                    <li class="category-item" data-category="eyes">
                        <div class="category-icon"><i class="fas fa-eye"></i></div>
                        <span class="category-name">Eyes</span>
                        <span class="category-count">2</span>
                    </li>
                    <li class="category-item" data-category="palettes">
                        <div class="category-icon"><i class="fas fa-palette"></i></div>
                        <span class="category-name">Palettes</span>
                        <span class="category-count">0</span>
                    </li>
                    <li class="category-item" data-category="brushes">
                        <div class="category-icon"><i class="fas fa-paint-brush"></i></div>
                        <span class="category-name">Brushes</span>
                        <span class="category-count">0</span>
                    </li>
                </ul>
            </div>

            <div class="category-section">
                <h2 class="section-title">Product Tier</h2>
                <ul class="category-list" id="tierList">
                    <li class="category-item active" data-filter="all">
                        <div class="category-icon"><i class="fas fa-star"></i></div>
                        <span class="category-name">All Products</span>
                        <span class="category-count" id="allProductsCount"><?php echo $totalProducts; ?></span>
                    </li>
                    <li class="category-item" data-filter="premium">
                        <div class="category-icon"><i class="fas fa-crown"></i></div>
                        <span class="category-name">Premium</span>
                    </li>
                    <li class="category-item" data-filter="standard">
                        <div class="category-icon"><i class="fas fa-gem"></i></div>
                        <span class="category-name">Standard</span>
                    </li>
                    <li class="category-item" data-filter="budget">
                        <div class="category-icon"><i class="fas fa-coins"></i></div>
                        <span class="category-name">Budget</span>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="main-content">
            <div class="category-banner" id="categoryBanner">
                <img src="./Images/allProducts.png" alt="All Products" class="banner-image" />
            </div>

            <div class="toolbar">
                <div class="results-count" id="resultsCount">20 products found</div>
                <div class="sort-filter">
                    <div class="sort-option">
                        <i class="fas fa-sort-amount-down"></i>
                        <select id="sortPrice">
                            <option value="default">Sort by Price</option>
                            <option value="low-high">Price: Low to High</option>
                            <option value="high-low">Price: High to Low</option>
                        </select>
                    </div>
                    <div class="sort-option">
                        <i class="fas fa-filter"></i>
                        <select id="sortQuality">
                            <option value="all">All Qualities</option>
                            <option value="premium">Premium</option>
                            <option value="standard">Standard</option>
                            <option value="budget">Budget</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="product-grid" id="productGrid">
                <?php
                include("./Admin/conn.php");
                $showjewelleryQuery = "SELECT * FROM addjewellery";
                $result = mysqli_query($connection, $showjewelleryQuery);
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagepath = str_replace('../', '', $row['JewelleryImage']);
                    $tier = isset($row['JewelleryTier']) ? strtolower($row['JewelleryTier']) : 'standard';
                    $category = strtolower($row['JewelleryCategory']);
                    $price = floatval($row['JewelleryPrice']);
                ?>
                    <div class="product-card" data-category="<?php echo $category ?>" data-tier="<?php echo $tier ?>" data-price="<?php echo $price ?>">
                        <span class="product-badge">New</span>
                        <div class="product-media">
                            <img src="<?php echo $imagepath ?>" alt="<?php echo $row['JewelleryTitle']; ?>" class="product-image" />
                        </div>
                        <div class="product-details">
                            <span class="product-category"><?php echo ucfirst($category) ?></span>
                            <h3 class="product-title"><?php echo $row['JewelleryTitle'] ?></h3>
                            <p class="product-description"><?php echo $row['JewelleryDesc'] ?></p>
                            <div class="product-footer">
                                <div class="product-price"><?php echo $row['JewelleryPrice'] ?></div>
                                <button class="add-to-cart">
                                    <i class="fas fa-shopping-bag"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    </div>

    <script>
        const categoryItems = document.querySelectorAll('#categoryList .category-item');
        const tierItems = document.querySelectorAll('#tierList .category-item');
        const productGrid = document.getElementById('productGrid');
        const productCards = Array.from(document.querySelectorAll('.product-card'));
        const resultsCount = document.getElementById('resultsCount');
        const sortPrice = document.getElementById('sortPrice');
        const sortQuality = document.getElementById('sortQuality');

        let selectedCategory = 'all';
        let selectedTier = 'all';

        function updateBannerImage(category) {
            const bannerImage = document.querySelector('#categoryBanner img');

            const bannerImages = {
                all: './Images/allproducts.png',
                lips: './Images/lips.png',
                face: './Images/face.png',
                eyes: './Images/Eyes.png',
                palettes: './Images/palletes.png',
                brushes: './Images/Brushes.png'
            };

            const imagePath = bannerImages[category] || './Images/defaultBanner.png';
            bannerImage.src = imagePath;
            bannerImage.alt = `${category.charAt(0).toUpperCase() + category.slice(1)} Products`;
        }


        function filterProducts() {
            let visibleProducts = productCards.filter(card => {
                const cardCategory = card.getAttribute('data-category');
                const cardTier = card.getAttribute('data-tier');

                const categoryMatch = (selectedCategory === 'all' || cardCategory === selectedCategory);
                const tierMatch = (selectedTier === 'all' || cardTier === selectedTier);

                return categoryMatch && tierMatch;
            });

            productCards.forEach(card => card.style.display = 'none');
            visibleProducts.forEach(card => card.style.display = '');
            updateResultsCount(visibleProducts.length);
            sortVisibleProducts(visibleProducts);
        }

        function updateResultsCount(count) {
            resultsCount.textContent = `${count} product${count !== 1 ? 's' : ''} found`;
        }

        function sortVisibleProducts(visibleProducts) {
            const sortValue = sortPrice.value;
            if (sortValue === 'default') return;

            visibleProducts.sort((a, b) => {
                const priceA = parseFloat(a.getAttribute('data-price'));
                const priceB = parseFloat(b.getAttribute('data-price'));
                return sortValue === 'low-high' ? priceA - priceB : priceB - priceA;
            });

            visibleProducts.forEach(card => productGrid.appendChild(card));
        }

        categoryItems.forEach(item => {
            item.addEventListener('click', () => {
                categoryItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                selectedCategory = item.getAttribute('data-category');
                updateBannerImage(selectedCategory);
                filterProducts();
            });
        });

        tierItems.forEach(item => {
            item.addEventListener('click', () => {
                tierItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                selectedTier = item.getAttribute('data-filter');
                sortQuality.value = selectedTier;
                filterProducts();
            });
        });

        sortQuality.addEventListener('change', () => {
            selectedTier = sortQuality.value;
            tierItems.forEach(i => i.classList.remove('active'));
            const activeTierItem = Array.from(tierItems).find(i => i.getAttribute('data-filter') === selectedTier);
            if (activeTierItem) activeTierItem.classList.add('active');
            filterProducts();
        });

        sortPrice.addEventListener('change', () => {
            filterProducts();
        });

        filterProducts();
    </script>
</body>

</html>