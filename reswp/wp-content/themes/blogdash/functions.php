<?php //phpcs:ignore
/**
 * Theme functions and definitions.
 *
 * @package Blogdash
 * @author  Peregrine Themes
 * @since   1.0.0
 */

/**
 * Main Blogdash class.
 *
 * @since 1.0.0
 */
final class Blogdash {

	/**
	 * Singleton instance of the class.
	 *
	 * @since 1.0.0
	 * @var object
	 */
	private static $instance;

	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Blogdash ) ) {
			self::$instance = new Blogdash();
			self::$instance->includes();
			// Hook now that all of the Blogdash stuff is loaded.
			do_action( 'blogdash_loaded' );
		}
		return self::$instance;
	}

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'blogdash_styles' ) );
		add_filter( 'body_class', array( $this, 'blogdash_body_classes' ) );
	}

	/**
	 * Include files.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function includes() {
		require get_stylesheet_directory() . '/inc/customizer/dynamic-styles.php';
		require get_stylesheet_directory() . '/inc/customizer/default.php';
		require get_stylesheet_directory() . '/inc/customizer/customizer.php';
		require get_stylesheet_directory() . '/inc/common.php';
		require get_stylesheet_directory() . '/inc/template-parts.php';
	}

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @since 1.0.0
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function blogdash_body_classes( $classes ) {
		// Site layout.
		$classes[] = 'blogdash';

		return $classes;
	}

	/**
	 * Recommended way to include parent theme styles.
	 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
	 */
	function blogdash_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
	}
}

/**
 * The function which returns the one Blogdash instance.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $blogdash = blogdash(); ?>
 *
 * @since 1.0.0
 * @return object
 */
function blogdash() {
	return Blogdash::instance();
}

blogdash();
