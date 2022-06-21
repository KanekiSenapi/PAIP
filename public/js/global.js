const navigationHamburgerButton = document.querySelector(".navigation-hamburger-button");
const navigationMenu = document.querySelector(".navigation-menu");


function handleHamburgerNavigation() {
    navigationMenu.style.display = navigationMenu.style.display === 'block' ? 'none' : 'block';
}


navigationHamburgerButton.addEventListener("click", handleHamburgerNavigation)


function checkSession() {
    fetch("/sessionValidity")
        .then(response => response.json())
        .then(response => {
                if (!response.valid && response.logged) {
                    window.location.href = '/logout'
                }
            }
        ).catch(err => console.log(err));
}

window.addEventListener("load", () => {
    setInterval(checkSession, 10000);
})
