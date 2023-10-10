<?php
/**
 * Modèle de page : Photo unique.
 * Description : Modèle de page pour une photo unique.
 */

get_header();
?>

<main id="main" class="content-area">
    <div class="zone-contenu mobile-first">
        <div class="left-container">
            <div class="left-contenu">
                <h1><?php the_title(); ?></h1>
                <?php
                // Référence de la photo
                $reference_photo = get_field('reference_photo');
                if ($reference_photo) {
                    echo '<p>Référence : ' . esc_html($reference_photo) . '</p>';
                }

                // Catégories de la photo
                $categories = get_the_terms(get_the_ID(), 'categorie');
                $current_category_slugs = array(); // Définissez la variable ici

                if ($categories) {
                    foreach ($categories as $category) {
                        $current_category_slugs[] = $category->slug;
                    }
                }

                if ($categories) {
                    echo '<p>Catégorie : ';
                    $category_names = array();
                    foreach ($categories as $category) {
                        $category_names[] = esc_html($category->name);
                    }
                    echo implode(', ', $category_names); // Utilise implode pour joindre les noms de catégorie avec une virgule
                    echo '</p>';
                }

                // Format de la photo
                $format_terms = get_the_terms(get_the_ID(), 'format');
                if ($format_terms) {
                    echo '<p>Format : ';
                    $format_names = array();
                    foreach ($format_terms as $format_term) {
                        $format_names[] = esc_html($format_term->name);
                    }
                    echo implode(', ', $format_names); // Utilise implode pour joindre les noms de format avec une virgule
                    echo '</p>';
                }

                // Type de la photo
                $type_de_photo = get_field('type_de_photo');
                if ($type_de_photo) {
                    echo '<p>Type : ' . esc_html($type_de_photo) . '</p>';
                }

                // L'année de capture
                $date_capture = get_the_date('Y'); 
                if ($date_capture) {
                    echo '<p>Année : ' . esc_html($date_capture) . '</p>';
                }
                ?>
            </div>
        </div>
        <div class="right-container">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>" data-lightbox="image-gallery" class="photo">
                    <?php the_post_thumbnail(); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="zone-contact">
        <div class="left-contact">
            <div class="texte-contact">
                <p>Cette photo vous intéresse ?</p>
            </div>
            <div class="bouton-contact">
                <?php include get_template_directory() . '/template-parts/contact-modal-photo.php'; ?>
                <?php
                $reference_photo = get_field('reference_photo');
                if ($reference_photo) {
                    echo '<script type="text/javascript">';
                    echo 'var acfReferencePhoto = "' . esc_js($reference_photo) . '";';
                    echo '</script>';
                }
                ?>
            </div>
        </div>
        <div class="right-contact">
            <?php
            // ID du post actuel
            $current_post_id = get_the_ID();

            // Obtenez tous les posts de type 'photo'
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => -1,
                'order' => 'ASC',
            );
            $all_photo_posts = get_posts($args);

            // Trouvez l'index du post actuel
            $current_post_index = array_search($current_post_id, array_column($all_photo_posts, 'ID'));

            // Calculez les index des posts précédent et suivant
            $prev_post_index = $current_post_index - 1;
            $next_post_index = $current_post_index + 1;

            // Obtenez les posts précédent et suivant
            $prev_post = ($prev_post_index >= 0) ? $all_photo_posts[$prev_post_index] : end($all_photo_posts);
            $next_post = ($next_post_index < count($all_photo_posts)) ? $all_photo_posts[$next_post_index] : reset($all_photo_posts);

            $prev_permalink = get_permalink($prev_post);
            $next_permalink = get_permalink($next_post);

            // Obtenez les miniatures (featured images) des posts précédent et suivant
            $prev_thumbnail = get_the_post_thumbnail($prev_post, 'thumbnail');
            $next_thumbnail = get_the_post_thumbnail($next_post, 'thumbnail');
            ?>

            <div class="prev-nav">
                <a href="<?php echo esc_url($prev_permalink); ?>" class="prev-photo">
                    <?php if ($prev_thumbnail) : ?>
                        <div class="thumbnail-container">
                            <?php echo $prev_thumbnail; ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-gauche.png" alt="Previous" class="arrow-img-gauche" />
                        </div>
                    <?php endif; ?>
                </a>
            </div>

            <div class="next-nav">
                <a href="<?php echo esc_url($next_permalink); ?>" class="next-photo">
                    <?php if ($next_thumbnail) : ?>
                        <div class="thumbnail-container">
                            <?php echo $next_thumbnail; ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-droite.png" alt="Next" class="arrow-img-droite" />
                        </div>
                    <?php endif; ?>
                </a>
            </div>

        </div>
    </div>
    <!-- Section Photos Apparentées -->
    <div class="related-images">
        <h3>VOUS AIMEREZ AUSSI</h3>
        <div class="image-container">
            <?php
            // Query two random photos from the same category
            $args_related_photos = array(
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $current_category_slugs, // Utilisez le slug de la catégorie actuelle de la photo
                    ),
                ),
            );

            $related_photos_query = new WP_Query($args_related_photos);

            while ($related_photos_query->have_posts()) :
                $related_photos_query->the_post();
            ?>
                <div class="related-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image-wrapper">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); // Restaurez les données de publication d'origine ?>
        </div>
        <!-- Ajoutez le bouton pour la page d'accueil -->
        <div class="home-button">
            <a href="<?php echo home_url(); ?>" class="button">Toutes les photos</a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
