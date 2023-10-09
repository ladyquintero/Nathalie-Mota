<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nathalie Mota - Photographe Freelance</title>
    <meta name="description" content="Site Photographe Freelance">
    <meta name="keywords" content="Photo Event">
    <meta name="author" content="Lady Quintero">
    
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php wp_head(); ?>
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

        <!-- Agrega el botón de hamburguesa -->
        <div class="mobile-menu-button" id="open-fullscreen-menu-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        
        <nav class="header-menu">
            <div class="close-button-container">
            <div class="logo-container">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
                <a href="<?php echo home_url(); ?>">
                    <img src="http://localhost/nathalie-mota/wp-content/uploads/2023/09/logo-motaphoto.png" alt="Logo">
                </a>
            </div>
                <button id="close-fullscreen-menu-button" class="close-button">X</button>
            </div>
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false
            ]);
            ?>
            <?php include get_template_directory() . '/template-parts/contact-modal.php'; ?>
        </nav>
    </header>



