<?php
/**
 * Create starter pages, menu, and sample experiences on first activation.
 *
 * @package ShearwaterVF
 */

function shearwater_vf_activate() {
    if (get_option('shearwater_vf_seeded')) {
        return;
    }

    $pages = array(
        'experiences' => array('Experiences', 'templates/experiences.php'),
        'stay'        => array('Stay', 'templates/stay.php'),
        'dine'        => array('Dine', 'templates/dine.php'),
        'about'       => array('About', 'templates/about.php'),
        'contact'     => array('Contact', 'templates/contact.php'),
    );

    $ids = array();
    foreach ($pages as $slug => $data) {
        $existing = get_page_by_path($slug);
        if ($existing) {
            $ids[$slug] = $existing->ID;
            continue;
        }
        $ids[$slug] = wp_insert_post(array(
            'post_title'   => $data[0],
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ));
        if (!is_wp_error($ids[$slug])) {
            update_post_meta($ids[$slug], '_wp_page_template', $data[1]);
        }
    }

    $home = get_page_by_path('home');
    if (!$home) {
        $home_id = wp_insert_post(array(
            'post_title'  => 'Home',
            'post_name'   => 'home',
            'post_status' => 'publish',
            'post_type'   => 'page',
        ));
    } else {
        $home_id = $home->ID;
    }

    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_id);

    $menu_name = 'Shearwater Primary';
    $menu = wp_get_nav_menu_object($menu_name);
    if (!$menu) {
        $menu_id = wp_create_nav_menu($menu_name);
        $items = array(
            home_url('/')           => 'Home',
            home_url('/experiences/') => 'Experiences',
            home_url('/stay/')      => 'Stay',
            home_url('/dine/')      => 'Dine',
            home_url('/about/')     => 'About',
            home_url('/contact/')   => 'Contact',
        );
        $order = 1;
        foreach ($items as $url => $title) {
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title'  => $title,
                'menu-item-url'    => $url,
                'menu-item-status' => 'publish',
                'menu-item-type'   => 'custom',
                'menu-item-position' => $order++,
            ));
        }
        $locations = get_theme_mod('nav_menu_locations', array());
        $locations['primary'] = $menu_id;
        $locations['footer'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    shearwater_vf_seed_experiences();
    update_option('shearwater_vf_seeded', 1);
}
add_action('after_switch_theme', 'shearwater_vf_activate');

function shearwater_vf_seed_experiences() {
    if (wp_count_posts('experience')->publish > 0) {
        return;
    }

    $groups = array('water', 'air', 'bridge', 'safari', 'culture');
    foreach ($groups as $group) {
        if (!term_exists($group, 'experience_group')) {
            wp_insert_term(ucfirst($group), 'experience_group', array('slug' => $group));
        }
    }

    $items = array(
        array('White Water Rafting', 'water', 'Adrenaline', 'Half or full day', 'Take on the Batoka Gorge with the original Zambezi rafting company.', 'raft'),
        array('Flight of Angels', 'air', 'Gentle', '12–15 minutes', 'See the full width of the Falls from the air — spray, gorge, and river as one.', 'heli'),
        array('Zambezi Sunset Cruise', 'water', 'Gentle', 'Afternoon', 'Gold light, hippo grunts, and a slow drift on the upper Zambezi.', 'cruise'),
        array('Bridge Adventures', 'bridge', 'Adrenaline', '2–3 hours', 'Bungee, bridge swing, and slide above the spray of Victoria Falls.', 'bridge'),
        array('Safari Experiences', 'safari', 'Moderate', 'Half day', 'Game drives and night drives on private reserve country near the Falls.', 'safari'),
        array('Through the Eyes of an Elephant', 'safari', 'Gentle', 'Morning', 'A respectful, guided encounter with elephants in their landscape.', 'elephant'),
        array('Hikes & Cultural Tours', 'culture', 'Moderate', 'Half day', 'Walk the gorge, visit the Falls, and spend time with local guides.', 'hike'),
        array('Simunye: The Spirit of Africa', 'culture', 'Gentle', 'Evening', 'An award-winning stage show of music, dance, and story at Victoria Falls Theatre.', 'theatre'),
    );

    foreach ($items as $item) {
        $id = wp_insert_post(array(
            'post_type'    => 'experience',
            'post_status'  => 'publish',
            'post_title'   => $item[0],
            'post_excerpt' => $item[4],
            'post_content' => $item[4],
        ));
        if (!is_wp_error($id)) {
            wp_set_object_terms($id, $item[1], 'experience_group');
            update_post_meta($id, '_intensity', $item[2]);
            update_post_meta($id, '_duration', $item[3]);
            update_post_meta($id, '_image_key', $item[5]);
        }
    }
}
