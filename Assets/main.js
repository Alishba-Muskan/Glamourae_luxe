function openSidebar() {
  document.getElementById("sidebar").style.display = "block";
}

function closeSidebar() {
  document.getElementById("sidebar").style.display = "none";
}




document.addEventListener('DOMContentLoaded', () => {
  const chatBtn = document.getElementById("chatBtn"),
    chatBox = document.getElementById("chatBox"),
    closeBtn = document.getElementById("close-btn");

  const toggleChat = () => {
    const isVisible = chatBox.classList.toggle("visible");
    chatBtn.style.boxShadow = isVisible ? "0 0 15px #25D366" : "none";
  };

  setTimeout(toggleChat, 2000);
  chatBtn?.addEventListener("click", toggleChat);
  closeBtn?.addEventListener("click", () => {
    chatBox.classList.remove("visible");
    chatBtn.style.boxShadow = "none";
  });
});






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








