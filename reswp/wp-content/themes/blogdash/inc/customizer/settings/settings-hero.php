<?php

add_filter( 'bloghash_customizer_options', 'blogdash_customizer_hero_options', 11 );
function blogdash_customizer_hero_options( array $options ) {
	// Header Layout.
	$options['setting']['bloghash_hero_type']['control']['choices'] = array(
		'horizontal-slider' => esc_html__( 'Slider Horizontal', 'blogdash' ),
		'seven-slider'      => esc_html__( 'Slider Blogdash', 'blogdash' ),
	);

	return $options;
}
