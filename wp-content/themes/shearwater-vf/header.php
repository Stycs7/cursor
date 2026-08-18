<?php
/**
 * Theme header.
 *
 * @package ShearwaterVF
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="promo"><?php echo esc_html(shearwater_vf_mod('shearwater_promo', 'Online offer: 10% off with code AUG10% · valid until 31 August 2026')); ?></div>
<header class="site-header">
    <div class="header-inner">
        <div class="brand">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/logo.svg'); ?>" alt="" width="42" height="42">
                </a>
            <?php endif; ?>
            <a class="brand-copy" href="<?php echo esc_url(home_url('/')); ?>">
                <strong>Shearwater</strong>
                <span>Victoria Falls</span>
            </a>
        </div>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu">
            <span></span>
            <span class="screen-reader-text"><?php esc_html_e('Menu', 'shearwater-vf'); ?></span>
        </button>
        <nav id="primary-menu" class="nav-primary" aria-label="<?php esc_attr_e('Primary', 'shearwater-vf'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'    => 'shearwater_vf_fallback_menu',
                'items_wrap'     => '%3$s',
            ));
            ?>
        </nav>
        <div class="header-cta">
            <a class="btn btn-ghost-dark" href="<?php echo esc_url(shearwater_vf_whatsapp()); ?>">WhatsApp</a>
            <a class="btn btn-gold" href="<?php echo esc_url(home_url('/contact/')); ?>">Plan a stay</a>
        </div>
    </div>
</header>
<main id="content">
