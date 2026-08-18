<?php
/**
 * Template Name: Stay
 *
 * @package ShearwaterVF
 */

get_header();
?>
<section class="page-hero">
    <div class="wrap">
        <p class="eyebrow">Explorers Village</p>
        <h1>A lodge in the mist.</h1>
        <p class="lede">Four hundred metres from Victoria Falls — close enough that the spray sometimes visits at dawn. Bush and a waterhole in front; town, craft markets, and the evening’s plans a short walk away.</p>
    </div>
</section>
<section class="section" style="padding-top:0;">
    <div class="wrap split">
        <div class="frame">
            <img src="<?php echo esc_url(shearwater_vf_image('lodge')); ?>" alt="Explorers Village">
            <div class="frame-note">400m from the Falls · waterhole views</div>
        </div>
        <div>
            <p class="eyebrow">The rooms</p>
            <h2 style="font-size:clamp(2.2rem,4vw,3.4rem);margin:.4rem 0 1rem;">Stay the way the day asks.</h2>
            <p>54 deluxe four-star rooms, 42 standard three-star rooms, and serviced camping. Thatched roofs, outdoor seating, and a pool that earns its keep after a gorge day.</p>
            <div class="meta-row">
                <span class="chip">Check-in 14:00</span>
                <span class="chip">Check-out 10:00</span>
                <span class="chip">Restaurant & bar</span>
            </div>
            <a class="btn btn-gold" href="<?php echo esc_url(home_url('/contact/')); ?>">Check availability</a>
        </div>
    </div>
</section>
<section class="section stay">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow" style="color: var(--gold-soft);">On the property</p>
                <h2>Bush in front. Town behind.</h2>
            </div>
        </div>
        <div class="dining-grid">
            <article class="dine-card" style="background:transparent;border-color:var(--line-light);color:var(--cream);">
                <img src="<?php echo esc_url(shearwater_vf_image('room')); ?>" alt="Deluxe rooms">
                <div class="pad">
                    <h3>Deluxe rooms</h3>
                    <p>Air-conditioning, coffee station, and a quiet finish after the river.</p>
                </div>
            </article>
            <article class="dine-card" style="background:transparent;border-color:var(--line-light);color:var(--cream);">
                <img src="<?php echo esc_url(shearwater_vf_image('pool')); ?>" alt="Pool">
                <div class="pad">
                    <h3>Pool & gardens</h3>
                    <p>A place to sit between activities — close to the bar and restaurant.</p>
                </div>
            </article>
            <article class="dine-card" style="background:transparent;border-color:var(--line-light);color:var(--cream);">
                <img src="<?php echo esc_url(shearwater_vf_image('safari')); ?>" alt="Waterhole">
                <div class="pad">
                    <h3>Waterhole</h3>
                    <p>Elephant and buffalo still use the bush in front of the lodge.</p>
                </div>
            </article>
            <article class="dine-card" style="background:transparent;border-color:var(--line-light);color:var(--cream);">
                <img src="<?php echo esc_url(shearwater_vf_image('hike')); ?>" alt="Camping">
                <div class="pad">
                    <h3>Serviced camping</h3>
                    <p>For travellers who want the Falls close and the nights simpler.</p>
                </div>
            </article>
        </div>
    </div>
</section>
<?php get_footer(); ?>
