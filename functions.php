<?php

// Enregistrer - Menu Principal
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

// Enregistrer - Menu pied de page
function register_footer_menu() {
    register_nav_menu( 'footer-menu', __( 'Menu du pied de page', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_footer_menu' );

// Ajouter - Styles (Theme - Single Photo)
function enqueue_custom_styles() {
    wp_enqueue_style('custom-theme-css', get_template_directory_uri() . '/css/theme.css', array(), '1.0', 'all');
    wp_enqueue_style('custom-single-photo-css', get_template_directory_uri() . '/css/single-photo.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

// Ajouter - Scripts (Modales - Menu burger)
function enqueue_custom_scripts() {
    wp_enqueue_script('header-scripts', get_template_directory_uri() . '/js/header-scripts.js', array('jquery'), '1.0', true);
    wp_enqueue_script('modal-scripts', get_template_directory_uri() . '/js/modal-scripts.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

?>

