hamburger = document.querySelector(".hamburger");
hamburger.onclick = function () {
  navBar = document.querySelector(".nav-bar");
  navBar.classList.toggle("active");
  console.log("clicked");
};

function openFullWindow() {
  window.open("main.php", "_blank", "fullscreen=yes");
}
