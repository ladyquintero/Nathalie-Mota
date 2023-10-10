<?php get_header(); ?>

<div class="hero">
    <?php
    // Interroger | Photo aléatoire de la même catégorie
    $args_related_photos = array(
        'post_type' => 'photo', // Changer 'photos' par le slug de votre CPT (Type de Publication Personnalisé)
        'posts_per_page' => 1,
        'orderby' => 'rand', // Ordonner les résultats de manière aléatoire
    );

    $related_photos_query = new WP_Query($args_related_photos);

    // Boucle | Parcourir les résultats de la requête
    while ($related_photos_query->have_posts()) :
        $related_photos_query->the_post();
        $post_permalink = get_permalink(); // Obtenir le lien permanent de la publication actuelle
    ?>
    <a href="<?php echo esc_url($post_permalink); ?>">
        <div class="hero-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/titre-accueil.png" alt="Titre Accueil">
        </div>
    </a>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); // Restaurer les données de publication d'origine ?>
</div>

<div>
    <?php include get_template_directory() . '/template-parts/photo_block.php'; ?>
</div>

<?php get_footer(); ?>



