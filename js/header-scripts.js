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
        // console.log('MENU FERMÉ!');
    }
});

// SINGLE PHOTO - NAVIGATION PHOTOS (HOVER)
if( $('.right-container').length ){
    // Mise en cache des éléments fréquemment utilisés
    const wrapper = document.querySelector('.thumbnail-wrapper');
    const prevArrowLink = document.getElementById('prev-arrow-link');
    const nextArrowLink = document.getElementById('next-arrow-link');

    // Créez un objet Image pour précharger la vignette actuelle
    const currentThumbnailPreloader = new Image();
    const currentThumbnailURL = document.querySelector('.right-container a.photo img').getAttribute('src');
    currentThumbnailPreloader.src = currentThumbnailURL;
    currentThumbnailPreloader.onload = function () {
        preloadCurrentThumbnail(); // Déclenche le chargement initial après la précharge
    };

    // Chargez et affichez une vignette
    function loadThumbnail(thumbnailURL) {
        const thumbnail = document.createElement('img');
        thumbnail.src = thumbnailURL;
        
        // Effacez le contenu existant dans le 'container'
        while (wrapper.firstChild) {
            wrapper.removeChild(wrapper.firstChild);
        }
        
        // Ajoutez la vignette au 'container'
        wrapper.appendChild(thumbnail);
    }

    // Préchargez et affichez la vignette de l'article actuel
    function preloadCurrentThumbnail() {
        loadThumbnail(currentThumbnailURL);
    }

    // Gestion des événements pour le survol de la souris
    function handleMouseover(direction) {
        const arrowLink = (direction === 'prev') ? prevArrowLink : nextArrowLink;
        const thumbnailURL = arrowLink.getAttribute('data-thumbnail');
        loadThumbnail(thumbnailURL);
    }

    // Gestion des événements pour le départ de la souris
    function handleMouseout() {
        preloadCurrentThumbnail();
    }

    // Déclenchez la précharge de la vignette de l'article actuel lorsque la page se charge
    window.addEventListener('load', preloadCurrentThumbnail);

    // Attachez des écouteurs d'événements en utilisant la délégation d'événements
    prevArrowLink.addEventListener('mouseover', () => handleMouseover('prev'));
    nextArrowLink.addEventListener('mouseover', () => handleMouseover('next'));
    prevArrowLink.addEventListener('mouseout', handleMouseout);
    nextArrowLink.addEventListener('mouseout', handleMouseout);
}