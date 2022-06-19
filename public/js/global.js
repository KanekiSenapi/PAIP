const navigationHamburgerButton = document.querySelector(".navigation-hamburger-button");
const navigationMenu = document.querySelector(".navigation-menu");


function handleHamburgerNavigation() {
    navigationMenu.style.display = navigationMenu.style.display === 'block' ? 'none' : 'block';
}


navigationHamburgerButton.addEventListener("click", handleHamburgerNavigation)


