<?php
/**
 * 404.
 *
 * @package ShearwaterVF
 */

get_header();
?>
<section class="error-page">
    <div>
        <p class="eyebrow" style="justify-content:center;">Lost in the gorge</p>
        <h1>This path has gone quiet.</h1>
        <p class="lede" style="margin:1rem auto 1.5rem;">The page you wanted is not here. Return to the Falls, or start an enquiry.</p>
        <a class="btn btn-gold" href="<?php echo esc_url(home_url('/')); ?>">Back to Shearwater</a>
    </div>
</section>
<?php get_footer(); ?>
