<!-- Section | Miniatures Personnalisées -->
<div class="custom-post-thumbnails">
    <div class="thumbnail-container-accueil">
        <?php
        // Arguments | Requête pour les publications personnalisées
        $args_custom_posts = array(
            'post_type' => 'photo',
            'posts_per_page' => 12,
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
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                            <!-- Section | Overlay Catalogue -->
                            <div class="thumbnail-overlay">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Eye Icon"> <!-- Eye icon | Information Photo -->
                                <i class="fas fa-expand-arrows-alt fullscreen-icon"></i><!-- Fullscreen icon -->
                                <?php
                                // Récupère la référence et la catégorie de l'image associée.
                                $related_reference_photo = get_field('reference_photo');
                                $related_categories = get_the_terms(get_the_ID(), 'categorie');
                                $related_category_names = array();

                                if ($related_categories) {
                                    foreach ($related_categories as $category) {
                                        $related_category_names[] = esc_html($category->name);
                                    }
                                }
                                ?>
                                <div class="photo-info">
                                    <div class="photo-info-left">
                                        <p><?php echo esc_html($related_reference_photo); ?></p>
                                    </div>
                                    <div class="photo-info-right">
                                        <p><?php echo implode(', ', $related_category_names); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); // Restaurer les données de publication d'origine ?>
    </div>
    <!-- Ajouter un lien pour afficher toutes les publications personnalisées -->
    <div class="view-all-button">
        <button id="load-more-posts">Charger plus</button>
    </div>
</div>

