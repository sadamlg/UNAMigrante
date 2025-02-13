<?php

/**
 * Checks to see if Popular Post section is enabled.
 *
 * @since 1.0.0
 *
 * @param  int $post_id Optional. The post ID to check.
 * @return boolean True if Popular Post is enabled.
 */
function bloghash_is_popular_post_displayed( $post_id = 0 ) {

	$displayed = true;

	if ( ! bloghash_option( 'enable_popular_post' ) ) {
		$displayed = false;
	}

	if ( $displayed && ! bloghash_is_section_disabled( bloghash_option( 'popular_post_enable_on' ), $post_id ) ) {
		$displayed = false;
	}

	return apply_filters( 'bloghash_is_popular_post_displayed', $displayed, $post_id );
}

/**
 * Checks to see if Editors Choice section is enabled.
 *
 * @since 1.0.0
 *
 * @param  int $post_id Optional. The post ID to check.
 * @return boolean True if Editors Choice is enabled.
 */
function bloghash_is_editors_choice_displayed( $post_id = 0 ) {

	$displayed = true;

	if ( ! bloghash_option( 'enable_editors_choice' ) ) {
		$displayed = false;
	}

	if ( $displayed && ! bloghash_is_section_disabled( bloghash_option( 'editors_choice_enable_on' ), $post_id ) ) {
		$displayed = false;
	}

	return apply_filters( 'bloghash_is_editors_choice_displayed', $displayed, $post_id );
}


