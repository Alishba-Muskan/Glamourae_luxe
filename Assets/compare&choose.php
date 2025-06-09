<?php
$title = "Cosmetics Page";
include("header.php");
?>


<section class="hero" style="--hero-bg: url('./Images/cosmetics\ banner.jpg');">
</section>


<h1 class="compare-h1">Compare Products by Category</h1>

<div style="text-align:center;">
  <label>Select Category:
    <select id="categorySelect" onchange="populateDropdowns()">
      <option value="">-- Select Category --</option>
      <option value="Cosmetics">Cosmetics</option>
      <option value="Jewelry">Jewelry</option>
    </select>
  </label>
  <br/>
  <label>Product 1:
    <select id="product1" onchange="populateDropdown2(); updateComparison()">
      <option value="">-- Select Product --</option>
    </select>
  </label>
  <label>Product 2:
    <select id="product2" onchange="updateComparison()">
      <option value="">-- Select Product --</option>
    </select>
  </label>
</div>

<table>
  <thead>
    <tr>
      <th>Feature</th>
      <th id="name1">Product 1</th>
      <th id="name2">Product 2</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>Image</td><td id="img1">-</td><td id="img2">-</td></tr>
    <tr><td>Category</td><td id="category1">-</td><td id="category2">-</td></tr>
    <tr><td>Price</td><td id="price1">-</td><td id="price2">-</td></tr>
    <tr><td>Brand</td><td id="brand1">-</td><td id="brand2">-</td></tr>
    <tr><td>Description</td><td id="desc1">-</td><td id="desc2">-</td></tr>
  </tbody>
</table>

<script>
  const products = [
    { id: 1, name: "Matte Lipstick", category: "Cosmetics", price: 499, brand: "GlamBeauty", image: "https://via.placeholder.com/100?text=Matte+GB", description: "Matte finish, long-lasting." },
    { id: 2, name: "Matte Lipstick", category: "Cosmetics", price: 525, brand: "StayPerfect", image: "https://via.placeholder.com/100?text=Matte+SP", description: "Smudge-proof matte." },
    { id: 3, name: "Liquid Lipstick", category: "Cosmetics", price: 599, brand: "ColorBliss", image: "https://via.placeholder.com/100?text=Liquid+CB", description: "Bold liquid color." },
    { id: 4, name: "Creamy Lipstick", category: "Cosmetics", price: 399, brand: "BeautyBox", image: "https://via.placeholder.com/100?text=Creamy+BB", description: "Moisturizing creamy lipstick." },
    { id: 5, name: "Gold-Plated Earrings", category: "Jewelry", price: 799, brand: "SparkleCraft", image: "https://via.placeholder.com/100?text=Gold+SC", description: "Floral design, elegant." },
    { id: 6, name: "Gold-Plated Earrings", category: "Jewelry", price: 850, brand: "RoyalStyle", image: "https://via.placeholder.com/100?text=Gold+RS", description: "Traditional jhumka style." },
    { id: 7, name: "Silver Studs", category: "Jewelry", price: 499, brand: "ShinyThings", image: "https://via.placeholder.com/100?text=Silver+ST", description: "Simple daily-wear studs." },
    { id: 8, name: "Hoop Earrings", category: "Jewelry", price: 599, brand: "FashionRing", image: "https://via.placeholder.com/100?text=Hoop+FR", description: "Trendy hoop design." }
  ];

  function populateDropdowns() {
    const category = document.getElementById('categorySelect').value;
    const product1 = document.getElementById('product1');
    const product2 = document.getElementById('product2');

    const filtered = products.filter(p => p.category === category);

    product1.innerHTML = '<option value="">-- Select Product --</option>';
    product2.innerHTML = '<option value="">-- Select Product --</option>';

    filtered.forEach(p => {
      product1.add(new Option(`${p.name} (${p.brand})`, p.id));
    });

    clearComparison();
  }

  function populateDropdown2() {
    const category = document.getElementById('categorySelect').value;
    const product1 = document.getElementById('product1');
    const product2 = document.getElementById('product2');

    const selected1 = product1.value;

    const filtered = products.filter(p => p.category === category);

    product2.innerHTML = '<option value="">-- Select Product --</option>';

    filtered.forEach(p => {
      if (String(p.id) !== selected1) {
        product2.add(new Option(`${p.name} (${p.brand})`, p.id));
      }
    });

    product2.value = "";
    clearComparison();
  }

  function clearComparison() {
    document.getElementById("name1").innerText = "Product 1";
    document.getElementById("name2").innerText = "Product 2";
    document.getElementById("img1").innerHTML = "-";
    document.getElementById("img2").innerHTML = "-";
    document.getElementById("category1").innerText = "-";
    document.getElementById("category2").innerText = "-";
    document.getElementById("price1").innerText = "-";
    document.getElementById("price2").innerText = "-";
    document.getElementById("brand1").innerText = "-";
    document.getElementById("brand2").innerText = "-";
    document.getElementById("desc1").innerText = "-";
    document.getElementById("desc2").innerText = "-";
  }

  function updateComparison() {
    const id1 = document.getElementById('product1').value;
    const id2 = document.getElementById('product2').value;

    if(!id1 || !id2) {
      clearComparison();
      return;
    }

    const p1 = products.find(p => p.id == id1);
    const p2 = products.find(p => p.id == id2);
    document.getElementById("name1").innerText = `${p1.name} (${p1.brand})`;
    document.getElementById("name2").innerText = `${p2.name} (${p2.brand})`;
    document.getElementById("img1").innerHTML = `<img class='compare-img' src="${p1.image}" alt="${p1.name}" />`;
    document.getElementById("img2").innerHTML = `<img class='compare-img' src="${p2.image}" alt="${p2.name}" />`;
    document.getElementById("category1").innerText = p1.category;
    document.getElementById("category2").innerText = p2.category;
    document.getElementById("price1").innerText = `₹${p1.price}`;
    document.getElementById("price2").innerText = `₹${p2.price}`;
    document.getElementById("brand1").innerText = p1.brand;
    document.getElementById("brand2").innerText = p2.brand;
    document.getElementById("desc1").innerText = p1.description;
    document.getElementById("desc2").innerText = p2.description;
  }
</script>




<?php
include("footer.php");
?>

