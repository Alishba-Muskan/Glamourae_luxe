<?php
include_once "./header.php";
?>
<div class="app">
    <aside class="side_panel side_panel--expanded" id="sidePanel">
        <div class="sidebar__section">
            <h2 class="sidebar__title">
                Shop By Category
                <i class="fas fa-chevron-down sidebar__toggle" id="categoryToggle"></i>
            </h2>
            <ul class="sidebar__list" id="categoryList"></ul>
        </div>
        <div class="sidebar__section">
            <h2 class="sidebar__title">
                Product Tier
                <i class="fas fa-chevron-down sidebar__toggle" id="tierToggle"></i>
            </h2>
            <ul class="sidebar__list">
                <li class="sidebar__item sidebar__item--active" data-filter="all">
                    <div class="sidebar__icon"><i class="fas fa-star"></i></div>
                    <span class="sidebar__text">All Jewelry</span>
                    <span class="sidebar__count" id="allProductsCount">24</span>
                </li>
                <li class="sidebar__item" data-filter="premium">
                    <div class="sidebar__icon"><i class="fas fa-crown"></i></div>
                    <span class="sidebar__text">Premium</span>
                    <span class="sidebar__count">7</span>
                </li>
                <li class="sidebar__item" data-filter="standard">
                    <div class="sidebar__icon"><i class="fas fa-gem"></i></div>
                    <span class="sidebar__text">Standard</span>
                    <span class="sidebar__count">12</span>
                </li>
                <li class="sidebar__item" data-filter="budget">
                    <div class="sidebar__icon"><i class="fas fa-coins"></i></div>
                    <span class="sidebar__text">Budget</span>
                    <span class="sidebar__count">5</span>
                </li>
            </ul>
        </div>
    </aside>
    <main class="content">
        <div class="banner" id="categoryBanner">
            <img src="./Images/jewelleryProducts.png" alt="All Jewelry Collection" class="banner__image">
        </div>
        <div class="toolbar">
            <div class="toolbar__count" id="resultsCount">24 jewelry pieces found</div>
            <div class="toolbar__filters">
                <div class="toolbar__filter">
                    <i class="fas fa-sort-amount-down"></i>
                    <select id="sortPrice">
                        <option value="default">Sort by Price</option>
                        <option value="low-high">Price: Low to High</option>
                        <option value="high-low">Price: High to Low</option>
                    </select>
                </div>
                <div class="toolbar__filter">
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
        <div class="products" id="productGrid"></div>
    </main>
</div>
<?php
include("footer.php");
?>
<script src="./javas.js"></script>
<script src="./cart.js"></script>
<script>
    const products = {
        categories: [{
                id: "necklaces",
                name: "Necklaces",
                icon: "fa-gem",
                count: 6,
                banner: "./Images/Necklace.png"
            },
            {
                id: "rings",
                name: "Rings",
                icon: "fa-ring",
                count: 6,
                banner: "./Images/Rings.png"
            },
            {
                id: "bracelets",
                name: "Bracelets",
                icon: "fa-link",
                count: 6,
                banner: "./Images/Bracelets.png"
            },
            {
                id: "earrings",
                name: "Earrings",
                icon: "fa-heart",
                count: 6,
                banner: "./Images/Earings.png"
            }
        ],
        items: [{
                id: 1,
                name: "Diamond Solitaire Necklace",
                category: "necklaces",
                price: 1200.00,
                quality: "premium",
                badge: "bestseller"
            },
            {
                id: 2,
                name: "Pearl Drop Necklace",
                category: "necklaces",
                price: 350.00,
                quality: "standard",
                badge: "new"
            },
            {
                id: 3,
                name: "Gold Heart Pendant",
                category: "necklaces",
                price: 275.00,
                quality: "standard"
            },
            {
                id: 4,
                name: "Silver Tree of Life",
                category: "necklaces",
                price: 85.00,
                quality: "budget",
                badge: "sale"
            },
            {
                id: 5,
                name: "Sapphire Halo Necklace",
                category: "necklaces",
                price: 2200.00,
                quality: "premium"
            },
            {
                id: 6,
                name: "Initial Letter Necklace",
                category: "necklaces",
                price: 180.00,
                quality: "standard"
            },

            {
                id: 7,
                name: "Platinum Engagement Ring",
                category: "rings",
                price: 5000.00,
                quality: "premium",
                badge: "bestseller"
            },
            {
                id: 8,
                name: "Stackable Gold Bands",
                category: "rings",
                price: 450.00,
                quality: "standard"
            },
            {
                id: 9,
                name: "Birthstone Cocktail Ring",
                category: "rings",
                price: 220.00,
                quality: "standard",
                badge: "new"
            },
            {
                id: 10,
                name: "Silver Signet Ring",
                category: "rings",
                price: 95.00,
                quality: "budget"
            },
            {
                id: 11,
                name: "Eternity Diamond Band",
                category: "rings",
                price: 3800.00,
                quality: "premium"
            },
            {
                id: 12,
                name: "Art Deco Style Ring",
                category: "rings",
                price: 650.00,
                quality: "standard"
            },

            {
                id: 13,
                name: "Diamond Tennis Bracelet",
                category: "bracelets",
                price: 3200.00,
                quality: "premium"
            },
            {
                id: 14,
                name: "Charm Bracelet",
                category: "bracelets",
                price: 150.00,
                quality: "standard",
                badge: "new"
            },
            {
                id: 15,
                name: "Pearl Strand Bracelet",
                category: "bracelets",
                price: 180.00,
                quality: "standard"
            },
            {
                id: 16,
                name: "Bangle Set",
                category: "bracelets",
                price: 75.00,
                quality: "budget",
                badge: "sale"
            },
            {
                id: 17,
                name: "Diamond Hinged Bangle",
                category: "bracelets",
                price: 2800.00,
                quality: "premium"
            },
            {
                id: 18,
                name: "Leather Wrap Bracelet",
                category: "bracelets",
                price: 120.00,
                quality: "standard"
            },

            // Earrings
            {
                id: 19,
                name: "Diamond Stud Earrings",
                category: "earrings",
                price: 1500.00,
                quality: "premium",
                badge: "bestseller"
            },
            {
                id: 20,
                name: "Pearl Drop Earrings",
                category: "earrings",
                price: 320.00,
                quality: "standard"
            },
            {
                id: 21,
                name: "Gold Hoop Earrings",
                category: "earrings",
                price: 180.00,
                quality: "standard",
                badge: "new"
            },
            {
                id: 22,
                name: "Silver Stud Earrings",
                category: "earrings",
                price: 65.00,
                quality: "budget"
            },
            {
                id: 23,
                name: "Chandelier Earrings",
                category: "earrings",
                price: 420.00,
                quality: "standard"
            },
            {
                id: 24,
                name: "Huggie Hoop Earrings",
                category: "earrings",
                price: 290.00,
                quality: "standard"
            }
        ]
    };

    const DOM = {
        categoryList: document.getElementById('categoryList'),
        productGrid: document.getElementById('productGrid'),
        resultsCount: document.getElementById('resultsCount'),
        sortPrice: document.getElementById('sortPrice'),
        sortQuality: document.getElementById('sortQuality'),
        categoryBanner: document.getElementById('categoryBanner'),
        allProductsCount: document.getElementById('allProductsCount'),
        sidePanel: document.getElementById('sidePanel'),
        categoryToggle: document.getElementById('categoryToggle'),
        tierToggle: document.getElementById('tierToggle'),
        menuToggle: document.getElementById('menuToggle')
    };

    let currentFilters = {
        category: 'all',
        sort: 'default',
        quality: 'default'
    };

    function init() {
        renderCategories();
        renderProducts();
        setupEventListeners();
        handleMobileView();
    }

    function renderCategories() {
        DOM.categoryList.innerHTML = products.categories.map(category => `
            <li class="sidebar__item" data-category="${category.id}">
                <div class="sidebar__icon"><i class="fas ${category.icon}"></i></div>
                <span class="sidebar__text">${category.name}</span>
                <span class="sidebar__count">${category.count}</span>
            </li>
        `).join('');
    }

    function renderProducts() {
        let filteredProducts = filterProducts();

        DOM.resultsCount.textContent = `${filteredProducts.length} jewelry pieces found`;

        if (filteredProducts.length === 0) {
            DOM.productGrid.innerHTML = `
            <div class="products__empty">
                No jewelry matches your filters. Try adjusting your search criteria.
            </div>`;
        } else {
            DOM.productGrid.innerHTML = filteredProducts.map((product, index) =>
                createProductCard(product, index)
            ).join('');
        }

        updateCategoryBanner();
    }

    function filterProducts() {
        let productsList = [...products.items];

        if (currentFilters.category !== 'all') {
            productsList = productsList.filter(p => p.category === currentFilters.category);
        } else {
            productsList = getFeaturedProducts();
        }

        if (currentFilters.quality !== 'default') {
            productsList = productsList.filter(p => p.quality === currentFilters.quality);
        }
        if (currentFilters.sort === 'low-high') {
            productsList.sort((a, b) => a.price - b.price);
        } else if (currentFilters.sort === 'high-low') {
            productsList.sort((a, b) => b.price - a.price);
        }

        return productsList;
    }

    function getFeaturedProducts() {
        const featured = [];
        const categoryOrder = ["necklaces", "rings", "bracelets", "earrings"];

        categoryOrder.forEach(catId => {
            const catProducts = products.items.filter(p => p.category === catId);
            if (catProducts.length) featured.push(catProducts[0]);
        });

        const remaining = 8 - featured.length;
        if (remaining > 0) {
            const currentIds = new Set(featured.map(p => p.id));
            const otherProducts = products.items.filter(p => !currentIds.has(p.id));
            featured.push(...otherProducts.slice(0, remaining));
        }

        return featured;
    }

    function createProductCard(product, index) {
        const delay = index * 0.1;
        const badge = product.badge ?
            `<span class="product__badge product__badge--${product.badge}">${product.badge}</span>` : '';
        const isInCart = cart.isInCart(product.id);

        return `
        <div class="product" style="animation-delay: ${delay}s">
            ${badge}
            <div class="product__media">
                <img src="https://via.placeholder.com/300/1e1e1e/ffffff?text=${encodeURIComponent(product.name)}" 
                     alt="${product.name}" class="product__image">
            </div>
            <div class="product__details">
                <span class="product__category">${product.category}</span>
                <h3 class="product__title">${product.name}</h3>
                <p class="product__description">${product.description || 'Beautiful jewelry piece for any occasion'}</p>
                <div class="product__footer">
                    <div class="product__price">
                        $${product.price.toFixed(2)}
                    </div>
                    <button class="product__button ${isInCart ? 'added' : ''}" 
                            onclick="addToCart(${product.id})">
                        <i class="fas ${isInCart ? 'fa-check' : 'fa-shopping-bag'}"></i>
                        ${isInCart ? 'Added to Cart' : 'Add to Cart'}
                    </button>
                </div>
            </div>
        </div>
    `;
    }

    function updateCategoryBanner() {
        if (currentFilters.category === 'all') {
            DOM.categoryBanner.innerHTML = `
            <img src="./Images/jewelleryProducts.png" alt="All Jewelry" class="banner__image">`;
        } else {
            const category = products.categories.find(c => c.id === currentFilters.category);
            if (category) {
                DOM.categoryBanner.innerHTML = `
                <img src="${category.banner}" alt="${category.name}" class="banner__image">`;
            }
        }
    }

    function addToCart(productId) {
        const product = products.items.find(p => p.id === productId);
        if (!product) return;

        cart.addItem(product);
        updateCartButtons(productId);
        showCartNotification(product.name);
    }

    function updateCartButtons(productId) {
        const buttons = document.querySelectorAll(`button[onclick="addToCart(${productId})"]`);
        buttons.forEach(btn => {
            btn.classList.add('added');
            btn.innerHTML = `<i class="fas fa-check"></i> Added to Cart`;
        });
    }

    function showCartNotification(productName) {
        const notification = document.createElement('div');
        notification.className = 'cart-notification';
        notification.innerHTML = `
        <i class="fas fa-check-circle"></i>
        <span>${productName} added to cart</span>
    `;

        document.body.appendChild(notification);
        setTimeout(() => notification.classList.add('show'), 10);
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => document.body.removeChild(notification), 300);
        }, 3000);
    }

    function setupEventListeners() {
        DOM.categoryList.addEventListener('click', (e) => {
            const item = e.target.closest('.sidebar__item[data-category]');
            if (item) handleCategoryClick(item);
        });

        document.querySelectorAll('.sidebar__item[data-filter]').forEach(item => {
            item.addEventListener('click', () => handleFilterClick(item));
        });

        DOM.sortPrice.addEventListener('change', () => {
            currentFilters.sort = DOM.sortPrice.value;
            renderProducts();
        });
        DOM.sortQuality.addEventListener('change', () => {
            currentFilters.quality = DOM.sortQuality.value === 'default' ?
                'default' : DOM.sortQuality.value;
            renderProducts();
        });
        
        [DOM.categoryToggle, DOM.tierToggle].forEach(toggle => {
            toggle.addEventListener('click', () => toggleSection(toggle));
        });
        
        DOM.menuToggle.addEventListener('click', toggleSidePanel);
        window.addEventListener('resize', handleMobileView);
    }

    function handleCategoryClick(item) {
        document.querySelectorAll('.sidebar__item[data-category]').forEach(i =>
            i.classList.remove('sidebar__item--active'));
        document.querySelectorAll('.sidebar__item[data-filter]').forEach(i =>
            i.classList.remove('sidebar__item--active'));

        item.classList.add('sidebar__item--active');
        currentFilters.category = item.dataset.category;
        currentFilters.quality = 'default';
        DOM.sortQuality.value = 'default';
        renderProducts();
    }

    function handleFilterClick(item) {
        document.querySelectorAll('.sidebar__item[data-filter]').forEach(i =>
            i.classList.remove('sidebar__item--active'));
        document.querySelectorAll('.sidebar__item[data-category]').forEach(i =>
            i.classList.remove('sidebar__item--active'));

        item.classList.add('sidebar__item--active');
        currentFilters.quality = item.dataset.filter === 'all' ?
            'default' : item.dataset.filter;
        currentFilters.category = 'all';
        renderProducts();
    }

    function toggleSection(toggle) {
        const section = toggle.closest('.sidebar__section');
        const list = section.querySelector('.sidebar__list');
        const isExpanded = list.style.display !== 'none';
        list.style.display = isExpanded ? 'none' : 'flex';
        toggle.classList.toggle('fa-chevron-down', isExpanded);
        toggle.classList.toggle('fa-chevron-up', !isExpanded);
    }

    function toggleSidePanel() {
        DOM.sidePanel.classList.toggle('side_panel--expanded');
    }
    function handleMobileView() {
        const isMobile = window.innerWidth <= 768;
        document.querySelectorAll('.sidebar__list').forEach(list => {
            list.style.display = isMobile ? 'none' : 'flex';
        });
        document.querySelectorAll('.sidebar__toggle').forEach(toggle => {
            toggle.classList.toggle('fa-chevron-down', isMobile);
            toggle.classList.toggle('fa-chevron-up', !isMobile);
        });
        
        if (isMobile) {
            DOM.sidePanel.classList.remove('side_panel--expanded');
        } else {
            DOM.sidePanel.classList.add('side_panel--expanded');
        }
    }

    document.addEventListener('DOMContentLoaded', init);
</script>