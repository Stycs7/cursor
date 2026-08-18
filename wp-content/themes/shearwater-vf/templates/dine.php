<?php
/**
 * Template Name: Dine
 *
 * @package ShearwaterVF
 */

get_header();
?>
<section class="page-hero">
    <div class="wrap">
        <p class="eyebrow">The home of taste</p>
        <h1>Tables after the river.</h1>
        <p class="lede">International cooking with local flavour — from the lodge restaurant to a café in the spray and a table on the bridge.</p>
    </div>
</section>
<section class="section" style="padding-top:0;">
    <div class="wrap dining-grid">
        <?php
        $places = array(
            array('dining', 'Explorers Village Restaurant', 'The lodge table — breakfasts that start early, dinners that do not rush.'),
            array('cruise', 'Shearwater Café', 'A lighter stop between activities, still on Shearwater ground.'),
            array('falls', 'Rainforest Café', 'Under the canopy, close to the park and the sound of the Falls.'),
            array('bridge', 'Bridge Café', 'High above the gorge — coffee and a view of the bridge and river.'),
        );
        foreach ($places as $place) :
        ?>
            <article class="dine-card">
                <img src="<?php echo esc_url(shearwater_vf_image($place[0])); ?>" alt="<?php echo esc_attr($place[1]); ?>">
                <div class="pad">
                    <h3><?php echo esc_html($place[1]); ?></h3>
                    <p><?php echo esc_html($place[2]); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php get_footer(); ?>
