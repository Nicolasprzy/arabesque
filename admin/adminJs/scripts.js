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
//---------------------------------------------//

// Récupérer les éléments de la modal
var modal = document.getElementById("DeleteModal");
var span = document.getElementsByClassName("close")[0];
var confirmBtn = document.getElementById("confirmDeleteBtn");
var cancelBtn = document.getElementById("cancelDeleteBtn");
var logoutLink = document.getElementById("deleteLink");


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
    window.location.href = "index.php?page=delete_article";
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


//---------------------------------------- DELETE ARTICLES

document.addEventListener("DOMContentLoaded", function () {
  const deleteLinks = document.querySelectorAll(".deleteLink");
  const deleteModal = document.getElementById("deleteModal");
  const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
  const cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
  const closeSpan = deleteModal.querySelector(".close");
  let articleIdToDelete;

  deleteLinks.forEach(link => {
      link.addEventListener("click", function (event) {
          event.preventDefault();
          articleIdToDelete = this.getAttribute("data-id");
          deleteModal.style.display = "block";
      });
  });

  confirmDeleteBtn.addEventListener("click", function () {
      window.location.href = `delete_article.php?id=${articleIdToDelete}`;
  });

  cancelDeleteBtn.addEventListener("click", function () {
      deleteModal.style.display = "none";
  });

  closeSpan.addEventListener("click", function () {
      deleteModal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
      if (event.target == deleteModal) {
          deleteModal.style.display = "none";
      }
  });
});
