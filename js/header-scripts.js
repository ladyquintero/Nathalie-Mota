// MENU BURGER
$('#open-fullscreen-menu-button').click(function(e) {
    e.stopPropagation(); // Stop event propagation to prevent the close event
    $('header').toggleClass('mobile-menu-opened');
    console.log('BOUTON CLIQUÉ!');
});

// FERMER MENU - CLICK BUTTON CLOSE
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
