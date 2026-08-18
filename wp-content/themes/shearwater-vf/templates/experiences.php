<?php
/**
 * Template Name: Experiences
 *
 * @package ShearwaterVF
 */

get_header();
$query = new WP_Query(array(
    'post_type'      => 'experience',
    'posts_per_page' => 20,
));
$defaults = array(
    array('raft', 'water', 'Adrenaline', 'Half or full day', 'White Water Rafting', 'The original Batoka Gorge rafting company — grade-five water, spray, and guides who know every tongue of the rapid.'),
    array('heli', 'air', 'Gentle', '12–15 minutes', 'Flight of Angels', 'Lift out of the gorge and see the full curtain of the Falls, the bridge, and the river’s long bend.'),
    array('cruise', 'water', 'Gentle', 'Afternoon', 'Zambezi Sunset Cruise', 'Hippo channels, a wide sky, and a slow drink as the upper Zambezi turns copper.'),
    array('bridge', 'bridge', 'Adrenaline', '2–3 hours', 'Bridge Adventures', 'Bungee, swing, and slide on the Victoria Falls Bridge — the gorge directly below.'),
    array('safari', 'safari', 'Moderate', 'Half day', 'Safari Experiences', 'Day and night drives on private reserve country near the Falls.'),
    array('elephant', 'safari', 'Gentle', 'Morning', 'Through the Eyes of an Elephant', 'A guided elephant encounter shaped around respect for the animals and the land.'),
    array('hike', 'culture', 'Moderate', 'Half day', 'Hikes & Cultural Tours', 'Walks through the rainforest, the gorge, and time with local guides and villages.'),
    array('theatre', 'culture', 'Gentle', 'Evening', 'Simunye: The Spirit of Africa', 'Music, dance, and story at Victoria Falls Theatre — an evening after the river.'),
);
?>
<section class="page-hero">
    <div class="wrap">
        <p class="eyebrow">Owned and operated</p>
        <h1>Experiences on the Zambezi.</h1>
        <p class="lede">From the Boiling Pot to a quiet cruise, Shearwater runs the adventures in-house — which is how combination days stay simple.</p>
    </div>
</section>
<section class="section" style="padding-top:0;">
    <div class="wrap">
        <div class="filters" role="tablist">
            <button class="filter-btn is-active" type="button" data-filter="all">All</button>
            <button class="filter-btn" type="button" data-filter="water">Water</button>
            <button class="filter-btn" type="button" data-filter="air">Air</button>
            <button class="filter-btn" type="button" data-filter="bridge">Bridge</button>
            <button class="filter-btn" type="button" data-filter="safari">Safari</button>
            <button class="filter-btn" type="button" data-filter="culture">Culture</button>
        </div>
        <div class="catalog">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'experience_group');
                    $group = ($terms && !is_wp_error($terms)) ? $terms[0]->slug : 'all';
                    $key   = get_post_meta(get_the_ID(), '_image_key', true) ?: 'falls';
                    $img   = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: shearwater_vf_image($key);
                    ?>
                    <article class="catalog-card" data-group="<?php echo esc_attr($group); ?>">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>">
                        <div class="pad">
                            <span class="intensity"><?php echo esc_html(get_post_meta(get_the_ID(), '_intensity', true)); ?> · <?php echo esc_html(get_post_meta(get_the_ID(), '_duration', true)); ?></span>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <?php foreach ($defaults as $item) : ?>
                    <article class="catalog-card" data-group="<?php echo esc_attr($item[1]); ?>">
                        <img src="<?php echo esc_url(shearwater_vf_image($item[0])); ?>" alt="">
                        <div class="pad">
                            <span class="intensity"><?php echo esc_html($item[2]); ?> · <?php echo esc_html($item[3]); ?></span>
                            <h3><?php echo esc_html($item[4]); ?></h3>
                            <p><?php echo esc_html($item[5]); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
