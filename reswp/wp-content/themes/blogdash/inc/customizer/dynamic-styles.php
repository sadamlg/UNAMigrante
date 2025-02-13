<?php

/**
 * Dynamically generate CSS code.
 */
function blogdash_dynamic_styles( $css ) {

	return $css;
}

add_filter( 'bloghash_dynamic_styles', 'blogdash_dynamic_styles' );
