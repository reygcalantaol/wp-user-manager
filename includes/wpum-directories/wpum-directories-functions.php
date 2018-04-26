<?php
/**
 * Functions collection to work with directories.
 *
 * @package     wp-user-manager
 * @copyright   Copyright (c) 2018, Alessandro Tesoro
 * @license     https://opensource.org/licenses/gpl-license GNU Public License
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Retrieve the list of options for the sort by dropdown on the user directory.
 *
 * @return array
 */
function wpum_get_directory_sort_by_methods() {

	$options = [
		'newest'    => esc_html__( 'Newest users first' ),
		'oldest'    => esc_html__( 'Oldest users first' ),
		'name'      => esc_html__( 'First name' ),
		'last_name' => esc_html__( 'Last Name' )
	];

	return apply_filters( 'wpum_get_directory_sort_by_methods', $options );

}

/**
 * Retrieve a list of options for the per page amount modifier for the directory.
 *
 * @return array
 */
function wpum_get_directory_amount_modifier() {

	$amounts = [
		''   => '',
		'10' => '10',
		'15' => '15',
		'20' => '20',
	];

	return apply_filters( 'wpum_get_directory_amount_modifier', $amounts );

}
