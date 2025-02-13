<?php

add_filter( 'bloghash_customizer_options', 'blogdash_customizer_header_options', 11 );
function blogdash_customizer_header_options( array $options ) {
	// Header Layout.
	$options['setting']['bloghash_header_layout']['control']['choices'] = array(
		'layout-3' => array(
			'image' => get_stylesheet_directory_uri() . '/inc/customizer/assets/images/header-layout-3.svg',
			'title' => esc_html__( 'Header 3', 'blogdash' ),
		),
	);

	return $options;
}
