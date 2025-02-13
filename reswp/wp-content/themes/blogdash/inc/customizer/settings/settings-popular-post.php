<?php
/**
 * Blogdash Popular Post Section Settings section in Customizer.
 *
 * @package     Blogdash
 * @author      Peregrine Themes
 * @since       1.0.0
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Blogdash_Customizer_Popular_Post' ) ) :
	/**
	 * Bloghash Page Title Settings section in Customizer.
	 */
	class Blogdash_Customizer_Popular_Post {

		/**
		 * Primary class constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			/**
			 * Registers our custom options in Customizer.
			 */
			add_filter( 'bloghash_customizer_options', array( $this, 'register_options' ) );
		}

		/**
		 * Registers our custom options in Customizer.
		 *
		 * @since 1.0.0
		 * @param array $options Array of customizer options.
		 */
		public function register_options( $options ) {

			// Popular Post Section.
			$options['section']['bloghash_section_popular_post'] = array(
				'title'    => esc_html__( 'Popular Post', 'blogdash' ),
				'priority' => 4,
			);

			// Popular Post enable.
			$options['setting']['bloghash_enable_popular_post'] = array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'bloghash_sanitize_toggle',
				'control'           => array(
					'type'    => 'bloghash-toggle',
					'section' => 'bloghash_section_popular_post',
					'label'   => esc_html__( 'Enable editors choice section', 'blogdash' ),
				),
			);

			// Title.
			$options['setting']['bloghash_popular_post_title'] = array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
				'control'           => array(
					'type'     => 'bloghash-text',
					'section'  => 'bloghash_section_popular_post',
					'label'    => esc_html__( 'Title', 'blogdash' ),
					'required' => array(
						array(
							'control'  => 'bloghash_enable_popular_post',
							'value'    => true,
							'operator' => '==',
						),
					),
				),
			);

			// Popular Post Data Source
			$options['setting']['bloghash_popular_post_data_source'] = array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'bloghash_sanitize_select',
				'control'           => array(
					'type'        => 'bloghash-select',
					'section'     => 'bloghash_section_popular_post',
					'label'       => esc_html__( 'Choose Data Source', 'blogdash' ),
					'description' => esc_html__( 'Choose Option Of Posts Data Source.', 'blogdash' ),
					'choices'     => array(
						'post'     => esc_html__( 'Post Item', 'blogdash' ),
						'category' => esc_html__( 'Category', 'blogdash' ),
					),
					'required'    => array(
						array(
							'control'  => 'bloghash_enable_popular_post',
							'value'    => true,
							'operator' => '==',
						),
					),
				),
			);

			// Popular Post category.
			$options['setting']['bloghash_popular_post_category'] = array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'bloghash_sanitize_select',
				'control'           => array(
					'type'        => 'bloghash-select',
					'section'     => 'bloghash_section_popular_post',
					'label'       => esc_html__( 'Category', 'blogdash' ),
					'description' => esc_html__( 'Display posts from selected category only. Leave empty to include all.', 'blogdash' ),
					'is_select2'  => true,
					'data_source' => 'category',
					'multiple'    => true,
					'required'    => array(
						array(
							'control'  => 'bloghash_enable_popular_post',
							'value'    => true,
							'operator' => '==',
						),
						array(
							'control'  => 'bloghash_popular_post_data_source',
							'value'    => 'category',
							'operator' => '==',
						),
					),
				),
			);

			// Popular Post post item.
			$options['setting']['bloghash_popular_post_post'] = array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'bloghash_sanitize_select',
				'control'           => array(
					'type'        => 'bloghash-select',
					'section'     => 'bloghash_section_popular_post',
					'label'       => esc_html__( 'Post Item', 'blogdash' ),
					'description' => esc_html__( 'Display posts item only. Leave empty to include all.', 'blogdash' ),
					'is_select2'  => true,
					'data_source' => 'post',
					'multiple'    => true,
					'required'    => array(
						array(
							'control'  => 'bloghash_enable_popular_post',
							'value'    => true,
							'operator' => '==',
						),
						array(
							'control'  => 'bloghash_popular_post_data_source',
							'value'    => 'post',
							'operator' => '==',
						),
					),
				),
			);

			// Popular Post count.
			$options['setting']['bloghash_popular_post_number'] = array(
				'transport'         => 'postMessage',
				'sanitize_callback' => 'bloghash_sanitize_range',
				'control'           => array(
					'type'        => 'bloghash-range',
					'section'     => 'bloghash_section_popular_post',
					'label'       => esc_html__( 'Post Number', 'blogdash' ),
					'description' => esc_html__( 'Set the number of visible posts.', 'blogdash' ),
					'min'         => 1,
					'max'         => 4,
					'step'        => 1,
					'unit'        => '',
					'required'    => array(
						array(
							'control'  => 'bloghash_enable_popular_post',
							'value'    => true,
							'operator' => '==',
						),
						array(
							'control'  => 'bloghash_popular_post_heading_post_items',
							'value'    => true,
							'operator' => '==',
						),
					),
				),
				'partial'           => array(
					'selector'            => '#popular_post',
					'render_callback'     => 'bloghash_blog_popular_post',
					'container_inclusive' => true,
					'fallback_refresh'    => true,
				),
			);

			// Popular Post display on.
			$options['setting']['bloghash_popular_post_enable_on'] = array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'bloghash_no_sanitize',
				'control'           => array(
					'type'        => 'bloghash-checkbox-group',
					'label'       => esc_html__( 'Enable On: ', 'blogdash' ),
					'description' => esc_html__( 'Choose on which pages you want to enable Popular Post. ', 'blogdash' ),
					'section'     => 'bloghash_section_popular_post',
					'choices'     => array(
						'home'       => array(
							'title' => esc_html__( 'Home Page', 'blogdash' ),
						),
						'posts_page' => array(
							'title' => esc_html__( 'Blog / Posts Page', 'blogdash' ),
						),
					),
					'required'    => array(
						array(
							'control'  => 'bloghash_enable_popular_post',
							'value'    => true,
							'operator' => '==',
						),
					),
				),
			);

			return $options;
		}
	}
endif;
new Blogdash_Customizer_Popular_Post();
