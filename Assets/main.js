
//---------------------------------------Responsive navbar---------------------------------//
function openSidebar() {
  document.getElementById("sidebar").style.display = "block";
}

function closeSidebar() {
  document.getElementById("sidebar").style.display = "none";
}




//---------------------------------------Prelaoder ---------------------------------//


document.addEventListener('DOMContentLoaded', function () {
  setTimeout(() => {
    const preloader = document.querySelector('.preloader');
    preloader.style.opacity = '0';
    preloader.style.transform = 'scale(0.8)';

    setTimeout(() => {
      preloader.style.display = 'none';
    }, 1000);
  }, 1000);
});








let cartItems = document.getElementById("cartItems");
let cartItemsLocal = localStorage.getItem("cart");
let parseDataCArtItems = JSON.parse(cartItemsLocal);
let checkoutBtn = document.getElementById("checkoutBtn");
for (var i = 0; i < parseDataCArtItems.length; i++) {
  cartItems.innerHTML += `
  
  <tr>
  <td>${i + 1}</td>
  <td>${parseDataCArtItems[i].title}</td>
  <td>${parseDataCArtItems[i].price}</td>
  <td><input class="countProducts" type="number" min="1" value="1"/></td>
  <td><img height="100" width="100" src="${parseDataCArtItems[i].image}" /></td>
  <td><button onclick="removeFromCart(${i})">Remove from cart</button></td>
  </tr>
  `;
}

function removeFromCart(e) {
  let parseData = JSON.parse(cartItemsLocal);
  parseData.splice(e, 1);
  localStorage.setItem("cart", JSON.stringify(parseData));
  location.href = "./cart.html";
}
checkoutBtn.addEventListener("click", () => {
  var countProducts = document.getElementsByClassName("countProducts"); ///// GET ALL INPUT FIELDS
  let cartItemsLocal = localStorage.getItem("cart"); ///////////// GET LOCALSTORAGE ITEMS
  let parseDataCArtItems = JSON.parse(cartItemsLocal); //////////// PARSE INTO ARRAY OF OBJECTS
  let updatedArray = []; ///////////// CREATE EMPTY ARRAY OS WE CAN ADD UPDATED OBJECT WITH QUANTITY FIELD
  for (var i = 0; i < parseDataCArtItems.length; i++) {
    updatedArray.push({
      ...parseDataCArtItems[i], /////////////// GET ALL KEYS FROM THE CURRENT OBJECT like {title:"",image:""}
      qunatity: countProducts[i].value, /////////////////// CREATE NEW KEY IN OBJECT NAME QUANTITY WITH THE INPUT FIELD VALUE
    });
  } ////////////////////// LOOP HANDLE THE CURRENT LOCAL STORAGE VALUE AND ADD A QUANTITY FIELD IN EVERY OBJECT WITH VALUE
  localStorage.setItem("cart", JSON.stringify(updatedArray));
  location.href = "./checkout.html";
});










