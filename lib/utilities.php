<?php
/**
 * Static methods we (might) want to use more than once
 */

class UBV_Utilities {

	function __construct() {}

	/**
	 * Retrieve the user roles for this plugin
	 */
	public static function get_user_roles() {

		/**
		 * Make built in user roles nice and pretty
		 *
		 * Built in roles start with a prefix
		 * to make them easy to identify
		 */
		$built_in_roles_raw = wp_roles()->roles;
		$built_in_rules_clean = array(
			UBV_BUILT_IN_ROLE_PREFIX . 'not-logged-in' => esc_js( 'User Not Logged In', 'user-block-visibility' ),
			UBV_BUILT_IN_ROLE_PREFIX . 'logged-in' => esc_js( 'User Logged In', 'user-block-visibility' ),
		);

		foreach ( $built_in_roles_raw as $key => $value ) {
			$built_in_rules_clean[ UBV_BUILT_IN_ROLE_PREFIX . $key ] = esc_js( $value['name'] );
		}

		/**
		 * Adds ability to filter out built-in user role
		 *
		 * Use this filter to remove built-in roles from options
		 */
		$built_in_roles = apply_filters( 'ubv_built_in_user_roles', $built_in_rules_clean );

		/**
		 * Allows others to create custom roles
		 *
		 * Format:
		 * 'role-slug' => 'Custom User Role'
		 *
		 * You will also need to create a custom rule for front-end display.
		 * That filter is render_block (built-in WordPress)
		 */
		$additional_roles = apply_filters( 'ubv_additional_roles', array() );

		return array_merge( $built_in_roles, $additional_roles );

	}

}
