// Menu hamburger
const menuHamburger = document.querySelector("#menu-icon");
const navbar = document.querySelector(".side-nav");
const mainContent = document.querySelector(".main-content");
const globalContainer = document.querySelector('.global-container')

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
    
    if(navbar.classList.contains('closedNav')){
        mainContent.setAttribute("style", "animation: 0.7s closeNav forwards linear");

        setTimeout(() => {globalContainer.setAttribute('style', 'grid-template-columns: 100px 1fr;')
        mainContent.removeAttribute('style')}, 600)
    }
    else{
        mainContent.setAttribute("style", "animation: 0.7s openNav forwards linear");

        setTimeout(() => {globalContainer.setAttribute('style', 'grid-template-columns: 250px 1fr;')
        mainContent.removeAttribute('style')}, 600)
    }

}