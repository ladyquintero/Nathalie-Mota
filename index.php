<?php
/**
 * Modèle de page : Accueil
 * Description : Modèle de page pour l'accueil du site.
 */

get_header();
?>

<!-- Section | Image d'en-tête (Hero Image) -->
<div class="hero">
    <?php
    // Interrogation | Sélection d'une photo aléatoire de la même catégorie
    $args_related_photos = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand', // Tri des résultats de manière aléatoire
    );

    $related_photos_query = new WP_Query($args_related_photos);

    // Boucle | Parcourir les résultats de la requête
    while ($related_photos_query->have_posts()) :
        $related_photos_query->the_post();
        $post_permalink = get_permalink(); // Lien permanent de la publication actuelle
    ?>
    <a href="<?php echo esc_url($post_permalink); ?>">
        <div class="hero-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/titre-accueil.png" alt="Titre Accueil">
        </div>
    </a>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); // Réinitialiser | Données de publication à leur état d'origine ?>
</div>

<!-- Section | Bloc de photos -->
<div>
    <?php include get_template_directory() . '/template-parts/photo_block.php'; ?>
</div>

<?php get_footer();



