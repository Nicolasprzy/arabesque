document.addEventListener("DOMContentLoaded", function() {
    var logoutModal = document.getElementById("logoutModal");
    var deleteModal = document.getElementById("deleteModal");
    var logoutSpan = logoutModal.getElementsByClassName("close")[0];
    var deleteSpan = deleteModal.getElementsByClassName("close")[0];
    var confirmLogoutBtn = document.getElementById("confirmLogoutBtn");
    var cancelLogoutBtn = document.getElementById("cancelLogoutBtn");
    var logoutLink = document.getElementById("logoutLink");
    var deleteLinks = document.querySelectorAll("#deleteLink");
    var confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
    var cancelDeleteBtn = document.getElementById("cancelDeleteBtn");

    // Quand l'utilisateur clique sur le lien de déconnexion, ouvrir la modal
    logoutLink.onclick = function(event) {
        event.preventDefault();
        logoutModal.style.display = "block";
    }

    // Quand l'utilisateur clique sur le span (x), fermer la modal de déconnexion
    logoutSpan.onclick = function() {
        logoutModal.style.display = "none";
    }

    // Quand l'utilisateur clique sur le bouton "Non" dans la modal de déconnexion, fermer la modal
    cancelLogoutBtn.onclick = function() {
        logoutModal.style.display = "none";
    }

    // Quand l'utilisateur clique sur le bouton "Oui" dans la modal de déconnexion, rediriger vers logout.php
    confirmLogoutBtn.onclick = function() {
        window.location.href = "index.php?page=logout";
    }

    // Quand l'utilisateur clique n'importe où en dehors de la modal, fermer la modal de déconnexion
    window.onclick = function(event) {
        if (event.target == logoutModal) {
            logoutModal.style.display = "none";
        }
    }

    // Ajouter des événements pour tous les liens de suppression d'article
    deleteLinks.forEach(function(link) {
        link.onclick = function(event) {
            event.preventDefault();
            deleteModal.style.display = "block";
            confirmDeleteBtn.onclick = function() {
                window.location.href = link.href;
            }
        }
    });

    confirmDeleteBtn.addEventListener("click", function () {
        window.location.href = `delete_article.php?id=${articleIdToDelete}`;
    });

    // Quand l'utilisateur clique sur le span (x), fermer la modal de suppression
    deleteSpan.onclick = function() {
        deleteModal.style.display = "none";
    }

    // Quand l'utilisateur clique sur le bouton "Non" dans la modal de suppression, fermer la modal
    cancelDeleteBtn.onclick = function() {
        deleteModal.style.display = "none";
    }

    // Quand l'utilisateur clique n'importe où en dehors de la modal, fermer la modal de suppression
    window.onclick = function(event) {
        if (event.target == deleteModal) {
            deleteModal.style.display = "none";
        }
    }
});

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




// ------------Search articles--------------------

document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("searchInput");
    var articlesContainer = document.getElementById("articles");

    if (!searchInput || !articlesContainer) {
        console.error('Les éléments requis ne sont pas trouvés dans le DOM.');
        return;
    }

    searchInput.addEventListener("keyup", function(event) {
        var query = searchInput.value;
        console.log('Recherche en cours pour:', query);

        if (event.key === "Enter" || query.length > 2) {
            fetch(`controllers/search_articles.php?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    articlesContainer.innerHTML = "";
                    if (data.error) {
                        articlesContainer.innerHTML = `<p>Erreur: ${data.error}</p>`;
                    } else if (data.length > 0) {
                        data.forEach(article => {
                            var articleDiv = document.createElement("div");
                            articleDiv.className = "article";
                            
                            var title = document.createElement("h2");
                            title.textContent = article.title;
                            articleDiv.appendChild(title);
                            
                            var excerpt = document.createElement("p");
                            excerpt.textContent = article.excerpt;
                            articleDiv.appendChild(excerpt);
                            
                            var link = document.createElement("a");
                            link.href = `article_detail.php?id=${article.id}`;
                            link.textContent = "Lire la suite";
                            articleDiv.appendChild(link);
                            
                            articlesContainer.appendChild(articleDiv);
                        });
                    } else {
                        articlesContainer.innerHTML = "<p>Aucun article trouvé pour votre recherche.</p>";
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    articlesContainer.innerHTML = `<p>Erreur: ${error.message}</p>`;
                });
        }
    });
});
