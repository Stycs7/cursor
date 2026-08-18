<?php
/**
 * Search results.
 *
 * @package ShearwaterVF
 */

get_header();
?>
<section class="page-hero">
    <div class="wrap">
        <p class="eyebrow"><?php esc_html_e('Search', 'shearwater-vf'); ?></p>
        <h1><?php printf(esc_html__('Results for “%s”', 'shearwater-vf'), esc_html(get_search_query())); ?></h1>
        <?php get_search_form(); ?>
    </div>
</section>
<section class="section">
    <div class="wrap catalog">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="catalog-card">
                <div class="pad">
                    <span class="intensity"><?php echo esc_html(get_post_type()); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo esc_html(get_the_excerpt()); ?></p>
                </div>
            </article>
        <?php endwhile; else : ?>
            <p><?php esc_html_e('No matches. Try another word from the river: raft, lodge, cruise.', 'shearwater-vf'); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
