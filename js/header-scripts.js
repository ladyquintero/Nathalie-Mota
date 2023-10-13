// MENU BURGER
$('#open-fullscreen-menu-button').click(function(e) {
    e.stopPropagation(); // Empêche la propagation de l'événement pour éviter la fermeture
    $('header').toggleClass('mobile-menu-opened');
    console.log('BOUTON CLIQUÉ!');
});

// FERMER MENU - CLIQUER SUR LE BOUTON DE FERMETURE
$('#close-fullscreen-menu-button').click(function() {
    $('header').removeClass('mobile-menu-opened');
    console.log('MENU FERMÉ!');
});

$(document).click(function(event) {
    if (!$('header').has(event.target).length && !$('header').is(event.target)) {
        $('header').removeClass('mobile-menu-opened');
        console.log('MENU FERMÉ!');
    }
});

// SINGLE PHOTO - NAVIGATION PHOTOS (HVOVER)

function loadThumbnail(direction) {
    // Sélectionne l'élément HTML avec la classe 'thumbnail-wrapper'
    var wrapper = document.querySelector('.thumbnail-wrapper');

    // Crée un nouvel élément image (balise <img>)
    var thumbnail = document.createElement('img');

    // Sélectionne le lien de la flèche en fonction de la direction (précédent ou suivant)
    var arrowLink = (direction === 'prev') ? document.getElementById('prev-arrow-link') : document.getElementById('next-arrow-link');

    // Récupère l'URL de la miniature à partir de l'attribut 'data-thumbnail' du lien
    var thumbnailURL = arrowLink.getAttribute('data-thumbnail');

    // Définit l'URL de la miniature pour l'élément image créé
    thumbnail.src = thumbnailURL;

    // Affiche l'URL de la miniature dans la console (à des fins de débogage)
    console.log('URL de la miniature :', thumbnail.src);

    // Supprime tout contenu existant dans le conteneur 'wrapper'
    while (wrapper.firstChild) {
        wrapper.removeChild(wrapper.firstChild);
    }

    // Ajoute la nouvelle miniature à 'wrapper'
    wrapper.appendChild(thumbnail);
}

function hideThumbnail() {
    // Sélectionne l'élément HTML avec la classe 'thumbnail-wrapper'
    var wrapper = document.querySelector('.thumbnail-wrapper');

    // Supprime tout contenu existant dans le conteneur 'wrapper'
    while (wrapper.firstChild) {
        wrapper.removeChild(wrapper.firstChild);
    }
}

// Attache des écouteurs d'événements aux liens des flèches
var prevArrowLink = document.getElementById('prev-arrow-link');
var nextArrowLink = document.getElementById('next-arrow-link');

// Lorsque la souris survole le lien précédent, charge la miniature précédente
prevArrowLink.addEventListener('mouseover', function () {
    loadThumbnail('prev');
});

// Lorsque la souris quitte le lien précédent, masque la miniature
prevArrowLink.addEventListener('mouseout', function () {
    hideThumbnail();
});

// Lorsque la souris survole le lien suivant, charge la miniature suivante
nextArrowLink.addEventListener('mouseover', function () {
    loadThumbnail('next');
});

// Lorsque la souris quitte le lien suivant, masque la miniature
nextArrowLink.addEventListener('mouseout', function () {
    hideThumbnail();
});



