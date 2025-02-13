<?php
/**
 * The template for displaying header layout 3.
 *
 * @package     Blogdash
 * @author      Peregrine Themes
 * @since       1.0.0
 */

?>

<div class="bloghash-header-container">
	<div class="bloghash-logo-container">
		<div class="bloghash-container">

			<?php
			do_action( 'bloghash_header_widget_location', 'left' );
			bloghash_header_logo_template();
			do_action( 'bloghash_header_widget_location', 'right' );
			?>

			<span class="bloghash-header-element bloghash-mobile-nav">
				<?php bloghash_hamburger( bloghash_option( 'main_nav_mobile_label' ), 'bloghash-primary-nav' ); ?>
			</span>

		</div><!-- END .bloghash-container -->
	</div><!-- END .bloghash-logo-container -->

	<div class="bloghash-nav-container">
		<div class="bloghash-container">

			<?php bloghash_main_navigation_template(); ?>

		</div><!-- END .bloghash-container -->
	</div><!-- END .bloghash-nav-container -->
</div><!-- END .bloghash-header-container -->
