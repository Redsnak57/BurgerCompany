// Menu hamburger
const menuHamburger = document.querySelector("#menu-icon");
const navbar = document.querySelector(".side-nav");

menuHamburger.addEventListener("click",() => {
    navbar.classList.toggle("active-menu");
})

// Quitte le menu si scroll 
window.onscroll =() => {
    navbar.classList.remove("active-menu");
}

function toggleNav(){
    toggle = document.querySelector('#navToggle');

    navbar.classList.toggle('closedNav');
    toggle.classList.toggle('active');
}