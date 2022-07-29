// Menu hamburger
// definition des variables 
const menuHamburger = document.querySelector("#menu-icon");
const navbar = document.querySelector("ul");

// lors d'un clic sur #menu-icon, on met navbar en active
menuHamburger.addEventListener("click",() => {
    navbar.classList.toggle("active-menu")
})

// Affiche les options utilisateurs lors du clic 
// definition des variables 
let profil = document.querySelector('.profil');
let toggle = document.querySelector("#user-profil");

// lors d'un clic sur #user-profil, on met profil en active
toggle.addEventListener("click", () => {
    profil.classList.toggle("active");
})

// Quitte le menu si + options utilisateur si scroll 
window.onscroll =() => {
    navbar.classList.remove("active-menu");
    profil.classList.remove("active");
}

