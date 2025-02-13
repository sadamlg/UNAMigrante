<?php
/**
 * Blogdash Admin class. Blogdash related pages in WP Dashboard.
 *
 * @package Blogdash
 * @author  Peregrine Themes <peregrinethemes@gmail.com>
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blogdash Admin Class.
 *
 * @since 1.0.0
 * @package Blogdash
 */
final class Blogdash_Customizer {

	/**
	 * Singleton instance of the class.
	 *
	 * @since 1.0.0
	 * @var object
	 */
	private static $instance;

	/**
	 * Main Blogdash Admin Instance.
	 *
	 * @since 1.0.0
	 * @return Blogdash_Customizer
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Blogdash_Customizer ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {

		// Init Blogdash admin.
		add_action( 'init', array( $this, 'includes' ) );

		// Blogdash Admin loaded.
		do_action( 'blogdash_customizer_loaded' );
	}

	/**
	 * Include files.
	 *
	 * @since 1.0.0
	 */
	public function includes() {

		require_once get_stylesheet_directory() . '/inc/customizer/settings/index.php';
		require_once get_stylesheet_directory() . '/inc/customizer/default.php';
	}

}

/**
 * The function which returns the one Blogdash_Customizer instance.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $Blogdash_Customizer = Blogdash_Customizer(); ?>
 *
 * @since 1.0.0
 * @return object
 */
function Blogdash_Customizer() {
	return Blogdash_Customizer::instance();
}

Blogdash_Customizer();
