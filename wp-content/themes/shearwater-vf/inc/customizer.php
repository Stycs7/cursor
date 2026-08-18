<?php
/**
 * Theme Customizer: contact details and promo bar.
 *
 * @package ShearwaterVF
 */

function shearwater_vf_customize_register($wp_customize) {
    $wp_customize->add_section('shearwater_contact', array(
        'title'    => __('Shearwater Contact', 'shearwater-vf'),
        'priority' => 30,
    ));

    $fields = array(
        'shearwater_phone'    => array('Phone', '+263 83 2844471'),
        'shearwater_mobile'   => array('Mobile', '+263 773 461716'),
        'shearwater_email'    => array('Email', 'online@shearwatervf.com'),
        'shearwater_whatsapp' => array('WhatsApp URL', 'https://wa.me/263773461716'),
        'shearwater_promo'    => array('Promo bar', 'Online offer: 10% off with code AUG10% · valid until 31 August 2026'),
    );

    foreach ($fields as $id => $field) {
        $wp_customize->add_setting($id, array(
            'default'           => $field[1],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $field[0],
            'section' => 'shearwater_contact',
            'type'    => 'text',
        ));
    }
}
add_action('customize_register', 'shearwater_vf_customize_register');
