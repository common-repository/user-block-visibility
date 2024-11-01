<?php

require_once UBV_UTILITIES;

/**
 * Register this plugin's sidebar script
 */
function ubv_register_scripts() {

	wp_register_script(
		'ubv-sidebar-js',
		UBV_JS . 'block-visibility.js',
		array( 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-i18n', ),
		UBV_VERSION,
		true
	);

	wp_register_style(
		'ubv-sidebar-css',
		UBV_CSS . 'style.css',
		array(),
		UBV_VERSION,
		'all'
	);

	/**
	 * Localize user roles to the sidebar script
	 */
	wp_localize_script(
		'ubv-sidebar-js',
		'UBV_USER_ROLE_VISIBILITY',
		array(
			'roles' => UBV_Utilities::get_user_roles(),
		)
	);

}

add_action( 'init', 'ubv_register_scripts' );


/**
 * Enqueue the scripts for the block editor
 */
function ubv_enqueue_block_scripts() {

	// Use this filter to hide this functionality
	// from post types, users, etc.
	$do_enqueue = apply_filters( 'ubv_do_enqueue_sidebar', true );

	if ( ! $do_enqueue ) {
		return;
	}

	wp_enqueue_script( 'ubv-sidebar-js' );
	wp_enqueue_style( 'ubv-sidebar-css' );

}

add_action( 'enqueue_block_editor_assets', 'ubv_enqueue_block_scripts' );
