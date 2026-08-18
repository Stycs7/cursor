<?php
/**
 * Shearwater Victoria Falls theme bootstrap.
 *
 * @package ShearwaterVF
 */

if (!defined('ABSPATH')) {
    exit;
}

define('SHEARWATER_VF_VERSION', '1.0.0');

require_once get_template_directory() . '/inc/images.php';
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/cpt.php';
require_once get_template_directory() . '/inc/demo.php';

function shearwater_vf_enqueue() {
    wp_enqueue_style(
        'shearwater-vf-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Outfit:wght@300;400;500;600&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'shearwater-vf-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('shearwater-vf-fonts'),
        SHEARWATER_VF_VERSION
    );
    wp_enqueue_script(
        'shearwater-vf-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        SHEARWATER_VF_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'shearwater_vf_enqueue');

function shearwater_vf_mod($key, $default = '') {
    return get_theme_mod($key, $default);
}

function shearwater_vf_phone() {
    return shearwater_vf_mod('shearwater_phone', '+263 83 2844471');
}

function shearwater_vf_mobile() {
    return shearwater_vf_mod('shearwater_mobile', '+263 773 461716');
}

function shearwater_vf_email() {
    return shearwater_vf_mod('shearwater_email', 'online@shearwatervf.com');
}

function shearwater_vf_whatsapp() {
    return shearwater_vf_mod('shearwater_whatsapp', 'https://wa.me/263773461716');
}

function shearwater_vf_handle_enquiry() {
    if (!isset($_POST['shearwater_enquiry_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['shearwater_enquiry_nonce'])), 'shearwater_enquiry')) {
        wp_safe_redirect(home_url('/contact/?sent=0'));
        exit;
    }

    $first = sanitize_text_field(wp_unslash($_POST['first_name'] ?? ''));
    $last  = sanitize_text_field(wp_unslash($_POST['last_name'] ?? ''));
    $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $phone = sanitize_text_field(wp_unslash($_POST['phone'] ?? ''));
    $from  = sanitize_text_field(wp_unslash($_POST['origin'] ?? ''));
    $notes = sanitize_textarea_field(wp_unslash($_POST['notes'] ?? ''));
    $acts  = isset($_POST['activities']) ? array_map('sanitize_text_field', (array) wp_unslash($_POST['activities'])) : array();

    $subject = sprintf('Website enquiry from %s %s', $first, $last);
    $body    = "Name: {$first} {$last}\nEmail: {$email}\nPhone: {$phone}\nFrom: {$from}\nActivities: " . implode(', ', $acts) . "\n\n{$notes}";

    wp_mail(shearwater_vf_email(), $subject, $body, array('Content-Type: text/plain; charset=UTF-8', "Reply-To: {$email}"));
    wp_safe_redirect(home_url('/contact/?sent=1'));
    exit;
}
add_action('admin_post_nopriv_shearwater_enquiry', 'shearwater_vf_handle_enquiry');
add_action('admin_post_shearwater_enquiry', 'shearwater_vf_handle_enquiry');
