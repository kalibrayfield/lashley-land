<?php

/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */

if (!function_exists('houzez_taxonomy_simple_class')) {



    function houzez_taxonomy_simple_class($tax_name) {

        $terms = wp_get_post_terms(get_the_ID(), $tax_name, array("fields" => "names"));

        $t = '';

        if (!empty($terms)):

            foreach ($terms as $term):

                $t .= '<span class="' . $term . ' term-img"></span>';

            endforeach;

            $trimed = rtrim($t, ' ');

            return $trimed;

        endif;

        return '';

    }



}



add_action('wp_enqueue_scripts', 'custom_script');



function custom_script() {

    if (!is_admin() && is_single()) {

        wp_enqueue_script('custom_script', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), NULL, TRUE);

    }

}


add_filter('upload_mimes', 'allowed_upload_file_types', 1, 1);

function allowed_upload_file_types($mime_types) {
    $mime_types['kml'] = 'application/vnd.google-earth.kml+xml'; //Adding kml extension
    return $mime_types;
}

add_filter('houzez_theme_meta', 'custom_metabox_property', 10, 1);

function custom_metabox_property($meta_boxes) {
    $meta_boxes[0]['fields'][] = array(
        'id' => "property_kml_file",
        'name' => esc_html__('Property KML file', 'houzez'),
        'desc' => esc_html__('Upload kml file for property', 'houzez'),
        'type' => 'file_advanced',
        'max_file_uploads' => 1,
        'columns' => 12,
        'tab' => 'property_map',
    );
   
    return $meta_boxes;
}

require_once( get_stylesheet_directory() . '/framework/metaboxes/houzez-meta-boxes.php' );

require_once( get_stylesheet_directory() . '/framework/functions/houzez-localization.php' );