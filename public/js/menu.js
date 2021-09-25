const toggle = document.querySelector(".mobile-toggle");
const menu = document.querySelector(".mobile-menu");

toggle.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});

const dropdown_toggle = document.querySelector(".dropdown-toggle");
const dropdown_menu = document.querySelector(".dropdown-menu");

dropdown_toggle.addEventListener("click", () => {
    dropdown_menu.classList.toggle("hidden");
});
