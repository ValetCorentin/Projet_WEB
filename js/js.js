/* NAVBAR */

const toggle = document.querySelector(".navbar-toggle");
const menu = document.querySelector(".navbar-menu");
const items = document.querySelectorAll(".navbar-item");

/* Toggle mobile menu */
function toggleMenu() {
  if (menu.classList.contains("active")) {
    menu.classList.remove("active");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";
  } else {
    menu.classList.add("active");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
  }
}

/* Activate Submenu */
function toggleItem() {
  if (this.classList.contains("navbar-submenu-active")) {
    this.classList.remove("navbar-submenu-active");
  } else if (menu.querySelector(".navbar-submenu-active")) {
    menu.querySelector(".navbar-submenu-active").classList.remove("navbar-submenu-active");
    this.classList.add("navbar-submenu-active");
  } else {
    this.classList.add("navbar-submenu-active");
  }
}

/* Close Submenu From Anywhere */
function closeSubmenu(e) {
  if (menu.querySelector(".navbar-submenu-active")) {
    let isClickInside = menu
      .querySelector(".navbar-submenu-active")
      .contains(e.target);

    if (!isClickInside && menu.querySelector(".navbar-submenu-active")) {
      menu.querySelector(".navbar-submenu-active").classList.remove("navbar-ysubmenu-active");
    }
  }
}
/* Event Listeners */
toggle.addEventListener("click", toggleMenu, false);
for (let item of items) {
  if (item.querySelector(".navbar-submenu")) {
    item.addEventListener("click", toggleItem, false);
  }
  item.addEventListener("keypress", toggleItem, false);
}
document.addEventListener("click", closeSubmenu, false);