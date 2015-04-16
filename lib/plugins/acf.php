<?php

add_filter('acf/settings/save_json', 'sage_acf_json_save_point');

function sage_acf_json_save_point( $path ) {

	// update path
	$path = get_stylesheet_directory() . '/plugins/acf/acf-json';

	// return
	return $path;

}


add_filter('acf/settings/load_json', 'sage_acf_json_load_point');

function sage_acf_json_load_point( $paths ) {

	// remove original path (optional)
	unset($paths[0]);


	// append path
	$paths[] = get_stylesheet_directory() . '/plugins/acf/acf-json';


	// return
	return $paths;

}


// Hide ACF field group menu item
if(WP_ENV !== 'development'){
	add_filter('acf/settings/show_admin', '__return_false');
}

// Add an options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'fb-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General Settings',
		'parent_slug'	=> 'fb-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Homepage Settings',
		'menu_title'	=> 'Homepage Settings',
		'parent_slug'	=> 'fb-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'fb-settings',
	));

}