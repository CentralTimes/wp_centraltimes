<?php
/*
Plugin Name: Central Times REST API
Plugin URI: https://github.com/CentralTimes/wp_ct_rest_api
Description: A WordPress plugin designed to modify the REST API to include data present in the Central Times SNO FLEX installation. Used by Central Times for its mobile app.
Version: 0.5.1
Author: Central Times
Author URI: https://github.com/CentralTimes
License: MIT
*/
defined('ABSPATH') or die;

add_action('rest_api_init', function () {
    // Register list of all shortcodes
    register_rest_route('centraltimes/v1', '/shortcodes', array(
        'methods' => 'GET',
        'callback' => function () {
            global $shortcode_tags;
            return $shortcode_tags;
        },
    ));

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

    register_rest_field('post', 'ct_writer', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'writer');
    }));
    register_rest_field('post', 'ct_subtitle', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'sno_deck');
    }));
    register_rest_field('post', 'ct_jobtitle', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'jobtitle');
    }));
    register_rest_field('post', 'ct_video', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'video');
    }));
    register_rest_field('post', 'ct_videographer', array('get_callback' => function ($data) {
        return get_post_meta($data['id'], 'videographer');
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