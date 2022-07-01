// Add active class to the current button (highlight it)
// var header = document.getElementById("nav");
// var menu = header.getElementsByClassName("menu");

// for (var i = 0; i < menu.length; i++) {
//   menu[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("active");
//   current[0].className = current[0].className.replace("active", "");
//   this.className += "active";
//   });
// }

// Menu hamburger
const menuHamburger = document.querySelector("#menu-icon");
const navbar = document.querySelector("ul");

menuHamburger.addEventListener("click",() => {
    navbar.classList.toggle("active-menu")
})

// Quitte le menu si scroll 
window.onscroll =() => {
    navbar.classList.remove("active-menu");
}
