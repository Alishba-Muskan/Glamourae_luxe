<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éclat Jewelry | Luxury Collection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./Cos&Jew.css">
</head>

<body>
    <div class="main-container">
        <aside class="sidebar">
            <div class="category-section">
                <h2 class="section-title">Shop By Category</h2>
                <ul class="category-list" id="categoryList"></ul>
            </div>
            <div class="category-section">
                <h2 class="section-title">Product Tier</h2>
                <ul class="category-list">
                    <li class="category-item active" data-filter="all">
                        <div class="category-icon"><i class="fas fa-star"></i></div>
                        <span class="category-name">All Jewelry</span>
                        <span class="category-count" id="allProductsCount"></span>
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
                <div class="banner-content">
                    <h2>All Jewelry</h2>
                    <p>Discover our complete collection of luxury jewelry pieces</p>
                </div>
                <img src="https://via.placeholder.com/150" alt="Category Banner" class="banner-image">
            </div>
            <div class="toolbar">
                <div class="results-count" id="resultsCount">Loading jewelry...</div>
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
                            <option value="default">All Qualities</option>
                            <option value="premium">Premium</option>
                            <option value="standard">Standard</option>
                            <option value="budget">Budget</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="product-grid" id="productGrid"></div>
        </main>
    </div>

    <script>
        const products = {
            categories: [{
                    id: "necklaces",
                    name: "Necklaces",
                    icon: "fa-gem",
                    count: 0,
                    description: "Exquisite necklaces for every occasion",
                    banner: "./Images/Necklace.png"
                },
                {
                    id: "rings",
                    name: "Rings",
                    icon: "fa-ring",
                    count: 0,
                    description: "Stunning rings to adorn your fingers",
                    banner: "./Images/Rings.png"
                },
                {
                    id: "bracelets",
                    name: "Bracelets",
                    icon: "fa-link",
                    count: 0,
                    description: "Beautiful bracelets for wrist adornment",
                    banner: "./Images/bracelets.png"
                },
                {
                    id: "earrings",
                    name: "Earrings",
                    icon: "fa-heart",
                    count: 0,
                    description: "Elegant earrings to complete your look",
                    banner: "./Images/Earings.png"
                }
            ],
            items: [{
                    id: 1,
                    name: "Diamond Solitaire Necklace",
                    category: "necklaces",
                    type: "necklace",
                    description: "18K white gold necklace with brilliant-cut diamond",
                    price: 1200.00,
                    originalPrice: 1500.00,
                    quality: "premium",
                    badge: "bestseller"
                },
                {
                    id: 2,
                    name: "Pearl Drop Necklace",
                    category: "necklaces",
                    type: "necklace",
                    description: "Elegant freshwater pearl pendant on delicate chain",
                    price: 350.00,
                    quality: "standard",
                    badge: "new"
                },
                {
                    id: 3,
                    name: "Gold Heart Pendant",
                    category: "necklaces",
                    type: "necklace",
                    description: "14K yellow gold heart-shaped pendant",
                    price: 275.00,
                    quality: "standard"
                },
                {
                    id: 4,
                    name: "Silver Tree of Life",
                    category: "necklaces",
                    type: "necklace",
                    description: "Sterling silver pendant with intricate tree design",
                    price: 85.00,
                    quality: "budget",
                    badge: "sale"
                },
                {
                    id: 5,
                    name: "Sapphire Halo Necklace",
                    category: "necklaces",
                    type: "necklace",
                    description: "Blue sapphire surrounded by diamond accents in platinum",
                    price: 2200.00,
                    quality: "premium"
                },
                {
                    id: 6,
                    name: "Initial Letter Necklace",
                    category: "necklaces",
                    type: "necklace",
                    description: "Personalized initial pendant in rose gold",
                    price: 180.00,
                    quality: "standard"
                },

                {
                    id: 7,
                    name: "Platinum Engagement Ring",
                    category: "rings",
                    type: "ring",
                    description: "Classic solitaire engagement ring with 1ct diamond",
                    price: 5000.00,
                    quality: "premium",
                    badge: "bestseller"
                },
                {
                    id: 8,
                    name: "Stackable Gold Bands",
                    category: "rings",
                    type: "ring",
                    description: "Set of three thin 14K gold bands for stacking",
                    price: 450.00,
                    quality: "standard"
                },
                {
                    id: 9,
                    name: "Birthstone Cocktail Ring",
                    category: "rings",
                    type: "ring",
                    description: "Statement ring featuring your birthstone",
                    price: 220.00,
                    quality: "standard",
                    badge: "new"
                },
                {
                    id: 10,
                    name: "Silver Signet Ring",
                    category: "rings",
                    type: "ring",
                    description: "Classic sterling silver signet ring",
                    price: 95.00,
                    quality: "budget"
                },
                {
                    id: 11,
                    name: "Eternity Diamond Band",
                    category: "rings",
                    type: "ring",
                    description: "Full circle of brilliant-cut diamonds in platinum",
                    price: 3800.00,
                    quality: "premium"
                },
                {
                    id: 12,
                    name: "Art Deco Style Ring",
                    category: "rings",
                    type: "ring",
                    description: "Vintage-inspired geometric design with sapphires",
                    price: 650.00,
                    quality: "standard"
                },

                {
                    id: 13,
                    name: "Diamond Tennis Bracelet",
                    category: "bracelets",
                    type: "bracelet",
                    description: "Elegant line of diamonds in white gold setting",
                    price: 3200.00,
                    quality: "premium"
                },
                {
                    id: 14,
                    name: "Charm Bracelet",
                    category: "bracelets",
                    type: "bracelet",
                    description: "Customizable sterling silver charm bracelet",
                    price: 150.00,
                    quality: "standard",
                    badge: "new"
                },
                {
                    id: 15,
                    name: "Pearl Strand Bracelet",
                    category: "bracelets",
                    type: "bracelet",
                    description: "Lustrous freshwater pearls on silk thread",
                    price: 180.00,
                    quality: "standard"
                },
                {
                    id: 16,
                    name: "Bangle Set",
                    category: "bracelets",
                    type: "bracelet",
                    description: "Set of three gold-plated bangles",
                    price: 75.00,
                    quality: "budget",
                    badge: "sale"
                },
                {
                    id: 17,
                    name: "Diamond Hinged Bangle",
                    category: "bracelets",
                    type: "bracelet",
                    description: "Solid gold bangle with diamond accents",
                    price: 2800.00,
                    quality: "premium"
                },
                {
                    id: 18,
                    name: "Leather Wrap Bracelet",
                    category: "bracelets",
                    type: "bracelet",
                    description: "Italian leather with gold-plated accents",
                    price: 120.00,
                    quality: "standard"
                },

                {
                    id: 19,
                    name: "Diamond Stud Earrings",
                    category: "earrings",
                    type: "earrings",
                    description: "Classic round brilliant diamond studs in platinum",
                    price: 1500.00,
                    quality: "premium",
                    badge: "bestseller"
                },
                {
                    id: 20,
                    name: "Pearl Drop Earrings",
                    category: "earrings",
                    type: "earrings",
                    description: "Elegant freshwater pearl drops with diamond accents",
                    price: 320.00,
                    quality: "standard"
                },
                {
                    id: 21,
                    name: "Gold Hoop Earrings",
                    category: "earrings",
                    type: "earrings",
                    description: "14K yellow gold classic hoop earrings",
                    price: 180.00,
                    quality: "standard",
                    badge: "new"
                },
                {
                    id: 22,
                    name: "Silver Stud Earrings",
                    category: "earrings",
                    type: "earrings",
                    description: "Sterling silver geometric design studs",
                    price: 65.00,
                    quality: "budget"
                },
                {
                    id: 23,
                    name: "Chandelier Earrings",
                    category: "earrings",
                    type: "earrings",
                    description: "Dramatic gold chandelier earrings with crystals",
                    price: 420.00,
                    quality: "standard"
                },
                {
                    id: 24,
                    name: "Huggie Hoop Earrings",
                    category: "earrings",
                    type: "earrings",
                    description: "Small gold huggie hoops with diamond accents",
                    price: 290.00,
                    quality: "standard"
                }
            ]
        };

        const categoryList = document.getElementById('categoryList'),
            productGrid = document.getElementById('productGrid'),
            resultsCount = document.getElementById('resultsCount'),
            sortPrice = document.getElementById('sortPrice'),
            sortQuality = document.getElementById('sortQuality'),
            searchInput = document.getElementById('searchInput'),
            categoryBanner = document.getElementById('categoryBanner'),
            allProductsCountElement = document.getElementById('allProductsCount');
        let currentCategory = 'all',
            currentSort = 'default',
            currentQuality = 'default',
            currentSearch = '';

        function init() {
            updateCategoryCounts();
            renderCategories();
            renderProducts();
            setupEventListeners()
        }

        function updateCategoryCounts() {
            products.categories.forEach(category => {
                category.count = products.items.filter(item => item.category === category.id).length
            });
            allProductsCountElement.textContent = products.items.length
        }

        function renderCategories() {
            categoryList.innerHTML = products.categories.map(category => `<li class="category-item" data-category="${category.id}"><div class="category-icon"><i class="fas ${category.icon}"></i></div><span class="category-name">${category.name}</span><span class="category-count">${category.count}</span></li>`).join('')
        }

        function renderProducts() {
            let filteredProducts = [...products.items];
            if (currentCategory !== 'all') {
                filteredProducts = filteredProducts.filter(product => product.category === currentCategory);
            } else {
                let selectedAllProducts = [];
                const categoryOrder = ["necklaces", "rings", "bracelets", "earrings"];
                categoryOrder.forEach(catId => {
                    const productsInCategory = products.items.filter(product => product.category === catId);
                    if (productsInCategory.length > 0) selectedAllProducts.push(productsInCategory[0]);
                });
                let remainingNeeded = 9 - selectedAllProducts.length;
                if (remainingNeeded > 0) {
                    const currentProductIds = new Set(selectedAllProducts.map(p => p.id));
                    const otherProducts = products.items.filter(p => !currentProductIds.has(p.id));
                    selectedAllProducts.push(...otherProducts.slice(0, remainingNeeded));
                }
                filteredProducts = selectedAllProducts;
            }
            if (currentQuality !== 'default') filteredProducts = filteredProducts.filter(product => product.quality === currentQuality);
            if (currentSearch) {
                const searchTerm = currentSearch.toLowerCase();
                filteredProducts = filteredProducts.filter(product =>
                    product.name.toLowerCase().includes(searchTerm) || product.description.toLowerCase().includes(searchTerm)
                )
            }
            if (currentSort === 'low-high') filteredProducts.sort((a, b) => a.price - b.price);
            else if (currentSort === 'high-low') filteredProducts.sort((a, b) => b.price - a.price);
            filteredProducts = filteredProducts.slice(0, 9);
            resultsCount.textContent = `${filteredProducts.length} jewelry pieces found`;
            productGrid.innerHTML = filteredProducts.length === 0 ?
                `<div class="no-results">No jewelry matches your filters. Try adjusting your search criteria.</div>` :
                filteredProducts.map((product, index) => {
                    const delay = index * 0.1;
                    let badgeHtml = '';
                    if (product.badge) {
                        badgeHtml = `<span class="product-badge">${product.badge}</span>`;
                    }
                    const originalPriceHtml = product.originalPrice ?
                        `<span class="original">$${product.originalPrice.toFixed(2)}</span>` : '';
                    return `
            <div class="product-card" style="animation-delay: ${delay}s">
              ${badgeHtml}
              <div class="product-media">
                <img src="https://via.placeholder.com/300/1e1e1e/ffffff?text=${product.name.split(' ').join('+')}" alt="${product.name}" class="product-image">
              </div>
              <div class="product-details">
                <span class="product-category">${product.category}</span>
                <h3 class="product-title">${product.name}</h3>
                <p class="product-description">${product.description}</p>
                <div class="product-footer">
                  <div class="product-price">
                    ${originalPriceHtml}
                    $${product.price.toFixed(2)}
                  </div>
                  <button class="add-to-cart">
                    <i class="fas fa-shopping-bag"></i> Add to Cart
                  </button>
                </div>
              </div>
            </div>
          `;
                }).join('');
            updateCategoryBanner();
        }

       function updateCategoryBanner() {
            if (currentFilters.category === 'all') {
                D.categoryBanner.innerHTML = `
            <img src="./all-products-banner.png" alt="All Products" class="banner-image">
        `;
            } else {
                const category = productsData.categories.find(cat => cat.id === currentFilters.category);
                if (category) {
                    D.categoryBanner.innerHTML = `
                <img src="${category.banner}" alt="${category.name}" class="banner-image">
            `;
                }
            }
        }

        function setupEventListeners() {
            document.querySelectorAll('.category-item[data-category]').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.category-item').forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                    currentCategory = this.dataset.category;
                    renderProducts();
                });
            });
            document.querySelectorAll('.category-item[data-filter]').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.category-item[data-filter]').forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                    currentQuality = this.dataset.filter === 'all' ? 'default' : this.dataset.filter;
                    renderProducts();
                });
            });
            sortPrice.addEventListener('change', () => {
                currentSort = sortPrice.value;
                renderProducts()
            });
            sortQuality.addEventListener('change', () => {
                currentQuality = sortQuality.value === 'default' ? 'default' : sortQuality.value;
                renderProducts()
            });
            searchInput.addEventListener('input', () => {
                currentSearch = searchInput.value;
                renderProducts()
            });
        }
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>

</html>