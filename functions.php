<?php

function custom_wp_setup()
{

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('nav-menus');

	// Gutenberg support
	add_theme_support('editor-styles');
	add_theme_support('wp-block-styles');
	add_theme_support('align-wide');
	add_theme_support('responsive-embeds');
}

add_action('after_setup_theme', 'custom_wp_setup');


function custom_wp_assets()
{
	wp_enqueue_style('custom-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'custom_wp_assets');

function my_custom_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu' )
        )
    );
}
add_action( 'init', 'my_custom_menus' );

function custom_wp_register_projects_cpt() {

    $labels = array(
        'name'               => __('Projects', 'custom-wp'),
        'singular_name'      => __('Project', 'custom-wp'),
        'menu_name'          => __('Projects', 'custom-wp'),
        'name_admin_bar'     => __('Project', 'custom-wp'),
        'add_new'            => __('Add New', 'custom-wp'),
        'add_new_item'       => __('Add New Project', 'custom-wp'),
        'new_item'           => __('New Project', 'custom-wp'),
        'edit_item'          => __('Edit Project', 'custom-wp'),
        'view_item'          => __('View Project', 'custom-wp'),
        'all_items'          => __('All Projects', 'custom-wp'),
        'search_items'       => __('Search Projects', 'custom-wp'),
        'not_found'          => __('No Projects Found', 'custom-wp'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields'
        ),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'projects'),
        'show_in_rest'       => true, // Gutenberg support
    );

    register_post_type('projects', $args);
}

add_action('init', 'custom_wp_register_projects_cpt');

function allow_custom_fonts($mimes) {
    $mimes['woff']  = 'font/woff';
    $mimes['woff2'] = 'font/woff2';
    $mimes['otf']   = 'font/otf';
    $mimes['ttf']   = 'font/ttf';
    return $mimes;
}
add_filter('upload_mimes', 'allow_custom_fonts');


function fix_font_mime_types($data, $file, $filename, $mimes) {

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($ext === 'woff') {
        $data['ext'] = 'woff';
        $data['type'] = 'font/woff';
    }

    if ($ext === 'woff2') {
        $data['ext'] = 'woff2';
        $data['type'] = 'font/woff2';
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'fix_font_mime_types', 10, 4);