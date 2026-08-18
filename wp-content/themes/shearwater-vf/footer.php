<?php
/**
 * Theme footer.
 *
 * @package ShearwaterVF
 */
?>
</main>
<section class="cta-band">
    <div class="wrap">
        <p class="eyebrow" style="color: var(--gold-soft); justify-content: center;">Victoria Falls · Zimbabwe</p>
        <h2>Arrive as a guest. Leave as a story.</h2>
        <a class="btn btn-gold" href="<?php echo esc_url(home_url('/contact/')); ?>">Create your itinerary</a>
    </div>
</section>
<footer class="site-footer">
    <div class="wrap footer-grid">
        <div>
            <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" style="color: var(--cream);">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/logo.svg'); ?>" alt="" width="42" height="42">
                <span class="brand-copy">
                    <strong>Shearwater</strong>
                    <span>Since 1984</span>
                </span>
            </a>
            <p style="margin-top:1rem;max-width:28rem;">Adventure, lodge, and table on the edge of Mosi-oa-Tunya — from arrival to the last spray on the bridge.</p>
        </div>
        <div>
            <h3>Visit</h3>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/experiences/')); ?>">Experiences</a></li>
                <li><a href="<?php echo esc_url(home_url('/stay/')); ?>">Explorers Village</a></li>
                <li><a href="<?php echo esc_url(home_url('/dine/')); ?>">Dining</a></li>
                <li><a href="<?php echo esc_url(home_url('/about/')); ?>">Our story</a></li>
            </ul>
        </div>
        <div>
            <h3>Enquiries</h3>
            <ul>
                <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', shearwater_vf_phone())); ?>"><?php echo esc_html(shearwater_vf_phone()); ?></a></li>
                <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', shearwater_vf_mobile())); ?>"><?php echo esc_html(shearwater_vf_mobile()); ?></a></li>
                <li><a href="mailto:<?php echo esc_attr(shearwater_vf_email()); ?>"><?php echo esc_html(shearwater_vf_email()); ?></a></li>
                <li><a href="<?php echo esc_url(shearwater_vf_whatsapp()); ?>">WhatsApp us</a></li>
            </ul>
        </div>
        <div>
            <h3>Stay notes</h3>
            <p>Check-in from 14:00 · Check-out by 10:00.<br>Explorers Village sits 400 metres from the Falls.</p>
        </div>
    </div>
    <div class="wrap legal">
        <span>© <?php echo esc_html(gmdate('Y')); ?> Shearwater Victoria Falls</span>
        <span>Price match on identical activities · Designed for WordPress</span>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
