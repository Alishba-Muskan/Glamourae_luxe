<?php
$title = "Cosmetics Page";
include_once "header.php";
include_once "./Admin/conn.php";

$showquery = "SELECT * FROM addcos";
$result = mysqli_query($connection, $showquery);
$productArray = [];

while ($row = mysqli_fetch_assoc($result)) {
    $category = strtolower(trim($row['CosCategory']));
    if ($category === 'palletes') $category = 'palettes';

    $productArray[] = [
        'id' => (int)$row['CosId'],
        'name' => htmlspecialchars($row['CosTitle']),
        'description' => htmlspecialchars($row['CosDesc']),
        'price' => floatval($row['CosPrice']),
        'category' => $category,
        'quality' => strtolower(trim($row['CosTier'])),
        'image' => str_replace('../', '', $row['CosImage'])
    ];
}

$categoryArray = [
    ['id' => 'lips', 'name' => 'Lips', 'icon' => 'fa-kiss-wink-heart', 'banner' => './Images/lips.png'],
    ['id' => 'face', 'name' => 'Face', 'icon' => 'fa-sun', 'banner' => './Images/face.png'],
    ['id' => 'eyes', 'name' => 'Eyes', 'icon' => 'fa-eye', 'banner' => './Images/eyes.png'],
    ['id' => 'palettes', 'name' => 'Palettes', 'icon' => 'fa-palette', 'banner' => './Images/Palletes.png'],
    ['id' => 'brushes', 'name' => 'Brushes', 'icon' => 'fa-brush', 'banner' => './Images/brushes.png']
];
?>


<!-- UI Layout: Sidebar + Main Content -->
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
                    <span class="sidebar__text">All Products</span>
                    <span class="sidebar__count" id="allProductsCount"></span>
                </li>
                <li class="sidebar__item" data-filter="premium">
                    <div class="sidebar__icon"><i class="fas fa-crown"></i></div>
                    <span class="sidebar__text">Premium</span>
                </li>
                <li class="sidebar__item" data-filter="standard">
                    <div class="sidebar__icon"><i class="fas fa-gem"></i></div>
                    <span class="sidebar__text">Standard</span>
                </li>
                <li class="sidebar__item" data-filter="budget">
                    <div class="sidebar__icon"><i class="fas fa-coins"></i></div>
                    <span class="sidebar__text">Budget</span>
                </li>
            </ul>
        </div>
    </aside>

    <main class="content">
        <div class="banner" id="categoryBanner">
            <img src="./Images/allProducts.png" alt="All Products" class="banner__image">
        </div>

        <div class="toolbar">
            <div style="color: #e5233e; font-size:16px;" class="toolbar__count" id="resultsCount">Loading products...</div>
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

<div id="toast"></div>

<script>
    const productsData = <?= json_encode([
                                'items' => $productArray,
                                'categories' => $categoryArray
                            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
</script>

<script>
    const DOM = {
        categoryList: document.getElementById('categoryList'),
        productGrid: document.getElementById('productGrid'),
        resultsCount: document.getElementById('resultsCount'),
        sortPrice: document.getElementById('sortPrice'),
        sortQuality: document.getElementById('sortQuality'),
        categoryBanner: document.getElementById('categoryBanner'),
        allProductsCount: document.getElementById('allProductsCount'),
        categoryToggle: document.getElementById('categoryToggle'),
        tierToggle: document.getElementById('tierToggle'),
        toast: document.getElementById('toast')
    };

    let currentFilters = {
        category: 'all',
        sort: 'default',
        quality: 'default',
        searchQuery: ''
    };

    function init() {
        renderSidebar();
        renderProducts();
        setupEventListeners();
        handleMobileView();
    }

    function renderSidebar() {
        DOM.allProductsCount.textContent = productsData.items.length;
        productsData.categories.forEach(c => {
            c.count = productsData.items.filter(i => i.category === c.id).length;
        });
        DOM.categoryList.innerHTML = productsData.categories.map(c => `
            <li class="sidebar__item" data-category="${c.id}">
                <div class="sidebar__icon"><i class="fas ${c.icon}"></i></div>
                <span class="sidebar__text">${c.name}</span>
                <span class="sidebar__count">${c.count}</span>
            </li>
        `).join('');
    }

    function renderProducts() {
        let list = productsData.items.filter(p => {
            if (currentFilters.category !== 'all' && p.category !== currentFilters.category) return false;
            if (currentFilters.quality !== 'default' && p.quality !== currentFilters.quality) return false;
            if (currentFilters.searchQuery) {
                const q = currentFilters.searchQuery;
                return p.name.toLowerCase().includes(q) || p.description.toLowerCase().includes(q);
            }

            return true;
        });

        if (currentFilters.sort === 'low-high') list.sort((a, b) => a.price - b.price);
        else if (currentFilters.sort === 'high-low') list.sort((a, b) => b.price - a.price);

        DOM.resultsCount.textContent = `${list.length} products found`;
        DOM.productGrid.innerHTML = list.length ? list.map(createProductCard).join('') :
            `<div class="products__empty">No products match your filters. Try adjusting your search criteria.</div>`;
        updateCategoryBanner();
    }

    function createProductCard(p) {
        const shortDesc = p.description.length > 30 ? p.description.substring(0, 30) + "..." : p.description;
        return `
        <div class="product">
            <div class="product__media">
                <img src="${p.image}" alt="${p.name}" class="product__image">
            </div>
            <div class="product__details">
                <span class="product__category">${p.category}</span>
                <h3 class="product__title">${p.name}</h3>
                <p class="product__description">${shortDesc}</p>
                <div class="product__footer">
                    <div class="product__price">$${p.price.toFixed(2)}</div>
                   <button type="button" class="product__button" data-id="${p.id}" data-name="${p.name}" data-price="${p.price}" data-image="${p.image}">
                       <i class="fas fa-shopping-bag"></i> ADD TO CART
                   </button>
                </div>
                <p class="productcard_viewdetail"><a href="cosmetic_detail.php?id=${encodeURIComponent(p.id)}">View Details</a></p>
            </div>
        </div>`;
    }

    function updateCategoryBanner() {
        const cat = currentFilters.category;
        if (cat === 'all') {
            DOM.categoryBanner.innerHTML = `<img src="./Images/allProducts.png" alt="All Products" class="banner__image">`;
        } else {
            const c = productsData.categories.find(x => x.id === cat);
            if (c) {
                DOM.categoryBanner.innerHTML = `<img src="${c.banner}" alt="${c.name}" class="banner__image">`;
            }
        }
    }

    function setupEventListeners() {
        DOM.categoryList.addEventListener('click', e => {
            const li = e.target.closest('li[data-category]');
            if (!li) return;
            document.querySelectorAll('li[data-category], li[data-filter]').forEach(el => el.classList.remove('sidebar__item--active'));
            li.classList.add('sidebar__item--active');
            currentFilters.category = li.dataset.category;
            currentFilters.quality = 'default';
            DOM.sortQuality.value = 'default';
            renderProducts();
        });

        document.querySelectorAll('li[data-filter]').forEach(li => {
            li.addEventListener('click', () => {
                document.querySelectorAll('li[data-filter], li[data-category]').forEach(el => el.classList.remove('sidebar__item--active'));
                li.classList.add('sidebar__item--active');
                currentFilters.quality = li.dataset.filter === 'all' ? 'default' : li.dataset.filter;
                currentFilters.category = 'all';
                renderProducts();
            });
        });

        DOM.sortPrice.addEventListener('change', () => {
            currentFilters.sort = DOM.sortPrice.value;
            renderProducts();
        });

        DOM.sortQuality.addEventListener('change', () => {
            currentFilters.quality = DOM.sortQuality.value;
            renderProducts();
        });

        [DOM.categoryToggle, DOM.tierToggle].forEach(toggle => {
            toggle.addEventListener('click', () => {
                const list = toggle.closest('.sidebar__section').querySelector('.sidebar__list');
                const visible = getComputedStyle(list).display !== 'none';
                list.style.display = visible ? 'none' : 'flex';
                toggle.classList.toggle('fa-chevron-down', visible);
                toggle.classList.toggle('fa-chevron-up', !visible);
            });
        });

        // ✅ Add to cart button listener with event delegation
        DOM.productGrid.addEventListener('click', e => {
            const btn = e.target.closest('.product__button');
            if (!btn) return;
            const {
                id,
                name,
                price,
                image
            } = btn.dataset;
            addToCart(id, name, price, image);
        });

        window.addEventListener('resize', handleMobileView);
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
    }



    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('input', (e) => {
        currentFilters.searchQuery = e.target.value.trim().toLowerCase();
        renderProducts();
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
                showToast(data.success ? `${name} added to cart!` : `Error: ${data.message || 'Could not add to cart'}`);
            })
            .catch(err => {
                console.error(err);
                showToast('Network error. Please try again.');
            });
    }

    function showToast(message) {
        DOM.toast.textContent = message;
        DOM.toast.className = "show";
        setTimeout(() => {
            DOM.toast.className = DOM.toast.className.replace("show", "");
        }, 3000);
    }

    document.addEventListener('DOMContentLoaded', init);
</script>

<?php include_once "footer.php"; ?>