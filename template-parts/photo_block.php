<!-- Section | Miniatures Personnalisées -->
<div class="custom-post-thumbnails">
    <div class="thumbnail-container-accueil">
        <?php
        // Arguments | Requête pour les publications personnalisées
        $args_custom_posts = array(
            'post_type' => 'photo', 
            'posts_per_page' => -1,
        );

        $custom_posts_query = new WP_Query($args_custom_posts);

        // Boucle | Parcourir les publications personnalisées
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post();
        ?>
            <div class="custom-post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="thumbnail-wrapper">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); // Restaurer les données de publication d'origine ?>
    </div>
    <!-- Ajouter un lien pour afficher toutes les publications personnalisées -->
    <div class="view-all-button">
        <a href="<?php echo home_url(); ?>" class="button">Toutes les photos</a>
    </div>
</div>

