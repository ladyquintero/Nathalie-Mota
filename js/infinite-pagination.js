jQuery(function ($) {
    var page = 2; // Définit le numéro de page initial à 2
    var loading = false; // Indique si le chargement est en cours ou non
    var $loadMoreButton = $('#load-more-posts'); // Sélectionne le bouton 
    var $container = $('.thumbnail-container-accueil'); // Sélectionne le conteneur 

    $loadMoreButton.on('click', function () {
        if (!loading) {
            loading = true;
            $loadMoreButton.text('Chargement en cours...'); // Change le texte du bouton en "Chargement en cours..."

            $.ajax({
                type: 'POST',
                url: wp_data.ajax_url, // Ceci est défini dans functions.php
                data: {
                    action: 'load_more_posts',
                    page: page,
                },
                success: function (response) {
                    if (response) {
                        $container.append(response); // Ajoute la réponse (nouvelles publications) au conteneur
                        $loadMoreButton.text('Charger plus'); // Remet le texte du bouton à "Charger plus"
                        page++; // Incrémente le numéro de page
                        loading = false; // Indique que le chargement est terminé
                    } else {
                        $loadMoreButton.text('Fin des publications'); // Change le texte du bouton en "Fin des publications"
                    }
                },
            });
        }
    });
});
