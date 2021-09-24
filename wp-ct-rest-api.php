<?php
/*
Plugin Name: Central Times REST API
Plugin URI: https://github.com/CentralTimes/wp_ct_rest_api
Description: A WordPress plugin designed to modify the REST API to include data present in the Central Times SNO FLEX installation. Used by Central Times for its mobile app.
Version: 0.5
Author: Central Times
Author URI: https://github.com/CentralTimes
License: MIT
*/
defined('ABSPATH') or die;

add_action('rest_api_init', function () {
    // Re
    register_rest_field(
        'post',
        'ct_raw',
        array(
            'get_callback' => function ($data) {
                return get_post($data['id'])->post_content;
            },
            'schema' => array(
                'description' => 'Raw un-rendered post data from database.',
                'type' => 'string',
                'context' => array('view'),
            ),
        )
    );

    // Register list of all shortcodes
    register_rest_route('centraltimes/v1', '/shortcodes', array(
        'methods' => 'GET',
        'callback' => function () {
            global $shortcode_tags;
            return $shortcode_tags;
        },
    ));

    // Register staff metadata
    register_rest_field('staff_profile', 'jobtitle', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'jobtitle', true);
    }));
    register_rest_field('staff_profile', 'name', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'name', true);
    }));
    register_rest_field('staff_profile', 'schoolyear', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'schoolyear', true);
    }));
    register_rest_field('staff_profile', 'sno_deck', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'sno_deck', true);
    }));
    register_rest_field('staff_profile', 'staffposition', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'staffposition', true);
    }));
    register_rest_field('staff_profile', 'writer', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'writer', true);
    }));
});

// Register staff profile custom post type
add_filter('register_post_type_args', function ($args, $post_type) {
    if ($post_type === 'staff_profile') {
        $args['show_in_rest'] = true;
    }
    return $args;
}, 10, 2);
// Register staff taxonomies (name & year)
add_filter('register_taxonomy_args', function ($args, $taxonomy_name) {
    if ($taxonomy_name === 'staff_year' || $taxonomy_name === 'staff_name') {
        $args['show_in_rest'] = true;
    }
    return $args;
}, 10, 2);