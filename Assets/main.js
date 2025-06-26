
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














