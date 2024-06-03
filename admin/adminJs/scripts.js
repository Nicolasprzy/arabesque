// Récupérer les éléments de la modal
var modal = document.getElementById("logoutModal");
var span = document.getElementsByClassName("close")[0];
var confirmBtn = document.getElementById("confirmLogoutBtn");
var cancelBtn = document.getElementById("cancelLogoutBtn");
var logoutLink = document.getElementById("logoutLink");


// Quand l'utilisateur clique sur le bouton, ouvrir la modal 
logoutLink.onclick = function() {
    event.preventDefault();
    modal.style.display = "block";
}

// Quand l'utilisateur clique sur le span (x), fermer la modal
span.onclick = function() {
    modal.style.display = "none";
}

// Quand l'utilisateur clique sur le bouton "Non", fermer la modal
cancelBtn.onclick = function() {
    modal.style.display = "none";
}

// Quand l'utilisateur clique sur le bouton "Oui", rediriger vers logout.php
confirmBtn.onclick = function() {
    window.location.href = "index.php?page=logout";
}

// Quand l'utilisateur clique n'importe où en dehors de la modal, fermer la modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// ------------------------------

const navItems = document.querySelectorAll(".nav-item");

navItems.forEach((navItem, i) => {
  navItem.addEventListener("click", () => {
    navItems.forEach((item, j) => {
      item.className = "nav-item";
    });
    navItem.className = "nav-item active";
  });
});
