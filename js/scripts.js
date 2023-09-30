// Obtenir le modal
var modal = document.getElementById('myModal');

// Obtenir le bouton qui ouvre le modal
var btn = document.getElementById("open-modal-button-header");

// Obtenir l'élément <span> qui ferme le modal
var span = document.getElementsByClassName("close")[0];

// Lorsque l'utilisateur clique sur le bouton, ouvrir le modal
btn.onclick = function() {
    modal.style.display = "block";
}

// Lorsque l'utilisateur clique sur <span> (x), fermer le modal
span.onclick = function() {
    modal.style.display = "none";
}

// Lorsque l'utilisateur clique n'importe où en dehors du modal, le fermer
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Cuando el usuario hace clic en el botón de hamburguesa, abrir el menú a pantalla completa
$('#open-fullscreen-menu-button').click(function(e) {
    e.stopPropagation(); // Detiene la propagación del evento para que no se dispare el evento de cierre
    $('header').toggleClass('mobile-menu-opened');
    console.log('BOUTON CLIQUÉ!');
});

// Cerrar el menú al hacer clic en el botón de cierre
$('#close-fullscreen-menu-button').click(function() {
    $('header').removeClass('mobile-menu-opened');
    console.log('MENU FERMÉ!');
});

// Cerrar el menú al hacer clic en cualquier lugar fuera del menú
$(document).click(function(event) {
    if (!$('header').has(event.target).length && !$('header').is(event.target)) {
        $('header').removeClass('mobile-menu-opened');
        console.log('MENU FERMÉ!');
    }
});




