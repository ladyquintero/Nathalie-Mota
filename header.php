<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nathalie Mota - Photographe Freelance</title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">


</head>
<body>

<header>
    <div class="header-logo">
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        ?>
        <a href="<?php echo home_url(); ?>">
            <img src="http://localhost/nathalie-mota/wp-content/uploads/2023/09/logo-motaphoto.png" alt="Logo">
        </a>
    </div>

    <nav class="header-menu">
        <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'container'      => false
        ]);
        ?>
        <button id="open-modal-button-header">CONTACT</button>
    </nav>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <!-- Modal Content -->
        <div class="modal-content">
            <span class="close">X</span>
            <img src="<?php echo wp_get_attachment_url(34); ?>" alt="Contact" />
            <!-- Contact Form 7 Shortcode -->
            <?php echo do_shortcode('[contact-form-7 id="39c84cd" title="Contact"]'); ?>
        </div>
    </div>
</header>
