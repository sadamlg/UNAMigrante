<?php

add_filter( 'bloghash_customizer_options', 'blogdash_customizer_blog_options', 11 );
function blogdash_customizer_blog_options( array $options ) {
	// Layout.
	$options['setting']['bloghash_blog_layout'] = array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'bloghash_sanitize_select',
		'control'           => array(
			'type'    => 'bloghash-select',
			'label'   => esc_html__( 'Layout', 'blogdash' ),
			'section' => 'bloghash_section_blog_page',
			'choices' => array(
				'blog-horizontal' => esc_html__( 'Horizontal', 'blogdash' ),
			),
		),
	);

	return $options;
}
