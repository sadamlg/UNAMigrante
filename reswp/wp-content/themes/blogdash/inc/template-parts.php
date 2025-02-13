<?php

/**
 * Outputs the theme Blog Popular Post content.
 *
 * @since 1.0.0
 */
function blogdash_blog_popular_post() {

	if ( ! bloghash_is_popular_post_displayed() ) {
		return;
	}

	$bloghash_enable_popular_post = bloghash_option( 'enable_popular_post' );

	if ( ! $bloghash_enable_popular_post ) {
		return;
	}

	do_action( 'bloghash_before_popular_post' );

	?>
	<div id="popular_post">
		<?php get_template_part( 'template-parts/popular-post/popular-post', 'one' ); ?>
	</div><!-- END #popular_post -->
	<?php

	do_action( 'bloghash_after_popular_post' );
}
add_action( 'bloghash_after_masthead', 'blogdash_blog_popular_post', 32 );

/**
 * Outputs the theme Blog Editors Choice content.
 *
 * @since 1.0.0
 */
function blogdash_blog_editors_choice() {

	if ( ! bloghash_is_editors_choice_displayed() ) {
		return;
	}

	$bloghash_enable_editors_choice = bloghash_option( 'enable_editors_choice' );

	if ( ! $bloghash_enable_editors_choice ) {
		return;
	}

	do_action( 'bloghash_before_editors_choice' );

	?>
	<div id="editors_choice">
		<?php get_template_part( 'template-parts/editors-choice/editors-choice', 'one' ); ?>
	</div><!-- END #editors_choice -->
	<?php

	do_action( 'bloghash_after_editors_choice' );
}
add_action( 'bloghash_after_masthead', 'blogdash_blog_editors_choice', 32 );

?>
