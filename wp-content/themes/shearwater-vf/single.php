<?php
/**
 * Single post or experience.
 *
 * @package ShearwaterVF
 */

get_header();
?>
<?php while (have_posts()) : the_post(); ?>
    <section class="hero" style="min-height: 68vh;">
        <div class="hero-media">
            <?php
            $key = get_post_meta(get_the_ID(), '_image_key', true);
            $img = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: shearwater_vf_image($key ?: 'falls');
            ?>
            <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>">
        </div>
        <div class="hero-inner">
            <p class="eyebrow" style="color: var(--gold-soft);">
                <?php echo esc_html(get_post_type() === 'experience' ? (get_post_meta(get_the_ID(), '_intensity', true) ?: 'Experience') : get_the_date()); ?>
            </p>
            <h1><?php the_title(); ?></h1>
        </div>
    </section>
    <article class="entry wrap">
        <div class="entry-content">
            <?php if (get_post_type() === 'experience') : ?>
                <p class="lede"><?php echo esc_html(get_post_meta(get_the_ID(), '_duration', true)); ?> · <?php echo esc_html(get_post_meta(get_the_ID(), '_intensity', true)); ?></p>
            <?php endif; ?>
            <?php the_content(); ?>
            <p style="margin-top:2rem;"><a class="btn btn-gold" href="<?php echo esc_url(home_url('/contact/')); ?>">Enquire about this</a></p>
        </div>
    </article>
<?php endwhile; ?>
<?php get_footer(); ?>
