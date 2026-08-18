<?php
/**
 * Archives.
 *
 * @package ShearwaterVF
 */

get_header();
?>
<section class="page-hero">
    <div class="wrap">
        <p class="eyebrow"><?php esc_html_e('Archive', 'shearwater-vf'); ?></p>
        <h1><?php echo esc_html(wp_strip_all_tags(get_the_archive_title())); ?></h1>
    </div>
</section>
<section class="section">
    <div class="wrap catalog">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="catalog-card">
                <?php
                $key = get_post_meta(get_the_ID(), '_image_key', true);
                $img = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: shearwater_vf_image($key ?: 'safari');
                ?>
                <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>">
                <div class="pad">
                    <span class="intensity"><?php echo esc_html(get_post_meta(get_the_ID(), '_intensity', true) ?: get_the_date()); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo esc_html(get_the_excerpt()); ?></p>
                </div>
            </article>
        <?php endwhile; else : ?>
            <p><?php esc_html_e('No entries found.', 'shearwater-vf'); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
