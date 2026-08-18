<?php
/**
 * Template Name: Contact
 *
 * @package ShearwaterVF
 */

get_header();
$sent = isset($_GET['sent']) && $_GET['sent'] === '1';
?>
<section class="page-hero">
    <div class="wrap">
        <p class="eyebrow">Adventure awaits</p>
        <h1>Tell us the kind of day you want.</h1>
        <p class="lede">High energy or slow water, lodge luxury or a simpler night — we own the activities, the rooms, and the transfers, so a package can be cut to fit.</p>
    </div>
</section>
<section class="section" style="padding-top:0;">
    <div class="wrap contact-grid">
        <div>
            <h2 style="font-size:2rem;margin-bottom:1rem;">Enquiries</h2>
            <ul class="contact-list">
                <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', shearwater_vf_phone())); ?>"><?php echo esc_html(shearwater_vf_phone()); ?></a></li>
                <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', shearwater_vf_mobile())); ?>"><?php echo esc_html(shearwater_vf_mobile()); ?></a></li>
                <li><a href="mailto:<?php echo esc_attr(shearwater_vf_email()); ?>"><?php echo esc_html(shearwater_vf_email()); ?></a></li>
                <li><a href="<?php echo esc_url(shearwater_vf_whatsapp()); ?>">WhatsApp us</a></li>
            </ul>
            <p class="eyebrow">Stay notes</p>
            <p>Check-in from 14:00. Check-out by 10:00. Activity cancellations 24 hours prior are fully refunded; within 24 hours, 50%.</p>
        </div>
        <form class="form js-enquiry<?php echo $sent ? ' is-sent' : ''; ?>" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <div class="form-success">Thank you. A Shearwater host will reply to your enquiry.</div>
            <div class="form-fields">
                <input type="hidden" name="action" value="shearwater_enquiry">
                <?php wp_nonce_field('shearwater_enquiry', 'shearwater_enquiry_nonce'); ?>
                <div class="form-row">
                    <label>First name<input required name="first_name"></label>
                    <label>Last name<input required name="last_name"></label>
                </div>
                <div class="form-row">
                    <label>Email<input required type="email" name="email"></label>
                    <label>Phone<input required name="phone"></label>
                </div>
                <label>Where are you from?
                    <select name="origin" required>
                        <option value="">Please select</option>
                        <option>South Africa</option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>EU</option>
                        <option>Australia</option>
                        <option>Canada</option>
                        <option>Other</option>
                    </select>
                </label>
                <label>Activities of interest
                    <div class="checkboxes">
                        <?php foreach (array('Air', 'Water', 'Bridge', 'Safari', 'Elephant', 'Cruise', 'Hikes', 'Simunye') as $act) : ?>
                            <label><input type="checkbox" name="activities[]" value="<?php echo esc_attr($act); ?>"> <?php echo esc_html($act); ?></label>
                        <?php endforeach; ?>
                    </div>
                </label>
                <label>Notes<textarea name="notes" placeholder="Dates, group size, pace."></textarea></label>
                <button class="btn btn-gold" type="submit">Send message</button>
                <p class="form-note">We reply to <?php echo esc_html(shearwater_vf_email()); ?>.</p>
            </div>
        </form>
    </div>
</section>
<?php get_footer(); ?>
