<?php
/**
 * Experience custom post type.
 *
 * @package ShearwaterVF
 */

function shearwater_vf_register_cpt() {
    register_post_type('experience', array(
        'labels' => array(
            'name'          => __('Experiences', 'shearwater-vf'),
            'singular_name' => __('Experience', 'shearwater-vf'),
            'add_new_item'  => __('Add Experience', 'shearwater-vf'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'experience'),
        'menu_icon'    => 'dashicons-location-alt',
        'supports'     => array('title', 'editor', 'excerpt', 'thumbnail'),
        'show_in_rest' => true,
    ));

    register_taxonomy('experience_group', 'experience', array(
        'label'        => __('Experience groups', 'shearwater-vf'),
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => array('slug' => 'experience-group'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'shearwater_vf_register_cpt');

function shearwater_vf_experience_meta_boxes() {
    add_meta_box('shearwater_vf_exp_meta', __('Experience details', 'shearwater-vf'), 'shearwater_vf_experience_meta_box', 'experience', 'side');
}
add_action('add_meta_boxes', 'shearwater_vf_experience_meta_boxes');

function shearwater_vf_experience_meta_box($post) {
    wp_nonce_field('shearwater_vf_exp_meta', 'shearwater_vf_exp_nonce');
    $intensity = get_post_meta($post->ID, '_intensity', true);
    $duration  = get_post_meta($post->ID, '_duration', true);
    ?>
    <p>
        <label for="shearwater_intensity"><?php esc_html_e('Intensity', 'shearwater-vf'); ?></label>
        <select id="shearwater_intensity" name="shearwater_intensity" class="widefat">
            <?php foreach (array('Gentle', 'Moderate', 'Adrenaline') as $option) : ?>
                <option value="<?php echo esc_attr($option); ?>" <?php selected($intensity, $option); ?>><?php echo esc_html($option); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="shearwater_duration"><?php esc_html_e('Duration', 'shearwater-vf'); ?></label>
        <input type="text" class="widefat" id="shearwater_duration" name="shearwater_duration" value="<?php echo esc_attr($duration); ?>">
    </p>
    <?php
}

function shearwater_vf_save_experience_meta($post_id) {
    if (!isset($_POST['shearwater_vf_exp_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['shearwater_vf_exp_nonce'])), 'shearwater_vf_exp_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['shearwater_intensity'])) {
        update_post_meta($post_id, '_intensity', sanitize_text_field(wp_unslash($_POST['shearwater_intensity'])));
    }
    if (isset($_POST['shearwater_duration'])) {
        update_post_meta($post_id, '_duration', sanitize_text_field(wp_unslash($_POST['shearwater_duration'])));
    }
}
add_action('save_post_experience', 'shearwater_vf_save_experience_meta');
