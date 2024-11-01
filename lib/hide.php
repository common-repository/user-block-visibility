<?php

/**
 * Do not print a block's content if a user role is restricted
 */
function ubv_hide_block( $block_content, $block ) {

	// The attribute must exist in order to be applied
	if ( ! isset( $block['attrs']['ubvUserRestriction'] ) ) {
		return $block_content;
	}

	foreach ( $block['attrs']['ubvUserRestriction'] as $user ) {

		if ( UBV_BUILT_IN_ROLE_PREFIX . 'not-logged-in' === $user && ! is_user_logged_in() ) {
			return;
		}

		if ( UBV_BUILT_IN_ROLE_PREFIX . 'logged-in' === $user && is_user_logged_in() ) {
			return;
		}

		// Built in roles start with a prefix
		$prefix = UBV_BUILT_IN_ROLE_PREFIX;
		if ( $prefix !== substr( $user, 0, strlen( $prefix ) ) ) {
			return $block_content;
		}

		$user = substr( $user, strlen( $prefix ) );

		if ( current_user_can( $user ) ) {
			return;
		}
	}

	return $block_content;

}

add_filter( 'render_block', 'ubv_hide_block', 10, 2 );
