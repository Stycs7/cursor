<?php
/**
 * Generic page.
 *
 * @package ShearwaterVF
 */

get_header();
?>
<article class="entry wrap">
    <?php while (have_posts()) : the_post(); ?>
        <header class="entry-header">
            <p class="eyebrow">Shearwater</p>
            <h1><?php the_title(); ?></h1>
        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</article>
<?php get_footer(); ?>
