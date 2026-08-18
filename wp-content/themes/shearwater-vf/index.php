<?php
/**
 * Default index.
 *
 * @package ShearwaterVF
 */

get_header();
?>
<section class="page-hero">
    <div class="wrap">
        <p class="eyebrow">Journal</p>
        <h1><?php echo is_home() ? esc_html__('Stories from the gorge', 'shearwater-vf') : esc_html(wp_get_document_title()); ?></h1>
    </div>
</section>
<section class="section">
    <div class="wrap catalog">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="catalog-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url(shearwater_vf_image('sunset')); ?>" alt="">
                    <?php endif; ?>
                    <div class="pad">
                        <span class="intensity"><?php echo esc_html(get_the_date()); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e('Nothing published yet.', 'shearwater-vf'); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
