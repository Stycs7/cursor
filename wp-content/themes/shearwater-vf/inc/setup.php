<?php
/**
 * Theme supports and menus.
 *
 * @package ShearwaterVF
 */

function shearwater_vf_setup_theme() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/main.css');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'shearwater-vf'),
        'footer'  => __('Footer Menu', 'shearwater-vf'),
    ));

    set_post_thumbnail_size(1600, 1000, true);
}
add_action('after_setup_theme', 'shearwater_vf_setup_theme');

function shearwater_vf_widgets() {
    register_sidebar(array(
        'name'          => __('Footer', 'shearwater-vf'),
        'id'            => 'footer-1',
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'shearwater_vf_widgets');

function shearwater_vf_excerpt_length() {
    return 22;
}
add_filter('excerpt_length', 'shearwater_vf_excerpt_length');

function shearwater_vf_fallback_menu() {
    $links = array(
        home_url('/')             => __('Home', 'shearwater-vf'),
        home_url('/experiences/') => __('Experiences', 'shearwater-vf'),
        home_url('/stay/')        => __('Stay', 'shearwater-vf'),
        home_url('/dine/')        => __('Dine', 'shearwater-vf'),
        home_url('/about/')       => __('About', 'shearwater-vf'),
        home_url('/contact/')     => __('Contact', 'shearwater-vf'),
    );
    $current = home_url(add_query_arg(array(), wp_unslash($_SERVER['REQUEST_URI'] ?? '/')));
    foreach ($links as $url => $label) {
        $active = untrailingslashit($url) === untrailingslashit($current);
        printf(
            '<a href="%s"%s>%s</a>',
            esc_url($url),
            $active ? ' aria-current="page"' : '',
            esc_html($label)
        );
    }
}
