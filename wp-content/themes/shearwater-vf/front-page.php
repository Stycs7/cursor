<?php
/**
 * Front page.
 *
 * @package ShearwaterVF
 */

get_header();
$experiences = new WP_Query(array(
    'post_type'      => 'experience',
    'posts_per_page' => 8,
));
?>
<section class="hero">
    <div class="hero-media">
        <img src="<?php echo esc_url(shearwater_vf_image('falls')); ?>" alt="Victoria Falls, Zimbabwe">
    </div>
    <div class="hero-inner">
        <p class="eyebrow" style="color: var(--gold-soft);">Mosi-oa-Tunya · The smoke that thunders</p>
        <h1>Stand in the spray.</h1>
        <div class="hero-foot">
            <p class="hero-copy">Shearwater has hosted Victoria Falls since 1984 — rafting the Batoka, flying the gorge, and keeping a lodge close enough to feel the Falls at dawn.</p>
            <div class="hero-actions">
                <a class="btn btn-gold" href="<?php echo esc_url(home_url('/experiences/')); ?>">Browse experiences</a>
                <a class="btn btn-ghost" href="<?php echo esc_url(home_url('/stay/')); ?>">Stay 400m from the Falls</a>
            </div>
        </div>
    </div>
</section>

<div class="stats">
    <div class="stat"><b>1984</b><span>Pioneers on the Zambezi</span></div>
    <div class="stat"><b>2M+</b><span>Guests hosted</span></div>
    <div class="stat"><b>400m</b><span>From the Falls</span></div>
</div>

<section class="section">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">The collection</p>
                <h2>Eight ways to meet the river.</h2>
            </div>
            <a class="btn btn-ghost-dark" href="<?php echo esc_url(home_url('/experiences/')); ?>">All experiences</a>
        </div>
        <div class="exp-grid">
            <?php if ($experiences->have_posts()) : ?>
                <?php while ($experiences->have_posts()) : $experiences->the_post(); ?>
                    <?php
                    $key = get_post_meta(get_the_ID(), '_image_key', true) ?: 'falls';
                    $img = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: shearwater_vf_image($key);
                    ?>
                    <a class="exp-card" href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>">
                        <div class="exp-card-body">
                            <span><?php echo esc_html(get_post_meta(get_the_ID(), '_intensity', true)); ?></span>
                            <h3><?php the_title(); ?></h3>
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <?php
                $fallback = array(
                    array('raft', 'Adrenaline', 'White Water Rafting'),
                    array('heli', 'Gentle', 'Flight of Angels'),
                    array('cruise', 'Gentle', 'Zambezi Sunset Cruise'),
                    array('bridge', 'Adrenaline', 'Bridge Adventures'),
                    array('safari', 'Moderate', 'Safari Experiences'),
                    array('elephant', 'Gentle', 'Through the Eyes of an Elephant'),
                    array('hike', 'Moderate', 'Hikes & Cultural Tours'),
                    array('theatre', 'Gentle', 'Simunye: The Spirit of Africa'),
                );
                foreach ($fallback as $card) :
                ?>
                    <a class="exp-card" href="<?php echo esc_url(home_url('/experiences/')); ?>">
                        <img src="<?php echo esc_url(shearwater_vf_image($card[0])); ?>" alt="">
                        <div class="exp-card-body">
                            <span><?php echo esc_html($card[1]); ?></span>
                            <h3><?php echo esc_html($card[2]); ?></h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section stay">
    <div class="wrap split">
        <div class="gallery">
            <img src="<?php echo esc_url(shearwater_vf_image('lodge')); ?>" alt="Explorers Village lodge">
            <div class="gallery-stack">
                <img src="<?php echo esc_url(shearwater_vf_image('pool')); ?>" alt="Lodge pool">
                <img src="<?php echo esc_url(shearwater_vf_image('room')); ?>" alt="Deluxe room">
            </div>
        </div>
        <div class="split-copy">
            <p class="eyebrow" style="color: var(--gold-soft);">Explorers Village</p>
            <h2>Sleep in the spray line.</h2>
            <p>A lodge 400 metres from the Falls: 54 deluxe rooms, 42 standard rooms, and serviced camping. Bush and waterhole in front of you; craft markets and the town a short walk behind.</p>
            <div class="meta-row">
                <span class="chip">96 rooms</span>
                <span class="chip">4-star deluxe</span>
                <span class="chip">Serviced camping</span>
            </div>
            <a class="btn btn-gold" href="<?php echo esc_url(home_url('/stay/')); ?>">View the lodge</a>
        </div>
    </div>
</section>

<section class="section reviews">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">Guest notes</p>
                <h2>What stays with people.</h2>
            </div>
        </div>
        <div class="review-grid">
            <blockquote class="quote">
                <p>“A little paradise and a perfect base — pool, bar, and rooms that mix old lodge character with new comfort.”</p>
                <cite>Jeff · Trip sample</cite>
            </blockquote>
            <blockquote class="quote">
                <p>“Staff who treat arrivals like an occasion. Clean rooms, coffee in the morning, and the Falls a short walk away.”</p>
                <cite>Leah · Trip sample</cite>
            </blockquote>
            <blockquote class="quote">
                <p>“Location does the work: everything within walking distance, and a team that actually helps you plan the day.”</p>
                <cite>Michelle · Stay sample</cite>
            </blockquote>
        </div>
    </div>
</section>
<?php get_footer(); ?>
