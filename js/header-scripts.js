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
