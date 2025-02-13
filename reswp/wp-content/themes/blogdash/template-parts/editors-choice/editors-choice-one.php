<?php
/**
 * The template for displaying Editors Choice One.
 *
 * @package     Blogdash
 * @author      Peregrine Themes
 * @since       1.0.0
 */

$bloghash_editors_choice_html = '';

// Setup Post Items.
$bloghash_editors_choice_data_source = bloghash_option( 'editors_choice_data_source' );
$bloghash_editors_choice_categories  = bloghash_option( 'editors_choice_category' );
$bloghash_editors_choice_posts       = bloghash_option( 'editors_choice_post' );

$bloghash_editors_choice_orderby = bloghash_option( 'editors_choice_orderby' );
$bloghash_editors_choice_order   = explode( '-', $bloghash_editors_choice_orderby );

$bloghash_args = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => bloghash_option( 'editors_choice_number' ), // phpcs:ignore WordPress.WP.PostsPerPage.posts_per_page_posts_per_page
	'order'               => $bloghash_editors_choice_order[1],
	'orderby'             => $bloghash_editors_choice_order[0],
	'ignore_sticky_posts' => true,
	'tax_query'           => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
		array(
			'taxonomy' => 'post_format',
			'field'    => 'slug',
			'terms'    => array( 'post-format-quote' ),
			'operator' => 'NOT IN',
		),
	),
);

if ( ! empty( $bloghash_editors_choice_categories && $bloghash_editors_choice_data_source == 'category' ) ) {
	$bloghash_args['category_name'] = implode( ', ', $bloghash_editors_choice_categories );
} elseif ( ! empty( $bloghash_editors_choice_posts && $bloghash_editors_choice_data_source == 'post' ) ) {
	$bloghash_args['post_name__in'] = $bloghash_editors_choice_posts;
}

$bloghash_args = apply_filters( 'bloghash_editors_choice_query_args', $bloghash_args );

$bloghash_posts = new WP_Query( $bloghash_args );

// No posts found.
if ( ! $bloghash_posts->have_posts() ) {
	return;
}

$bloghash_editors_choice_elements = (array) bloghash_option( 'editors_choice_elements' );

$bloghash_posts_per_page = 'col-md-' . ceil( esc_attr( 12 / $bloghash_args['posts_per_page'] ) ) . ' col-sm-6 col-xs-12';
$count                   = 0; // Initialize counter
while ( $bloghash_posts->have_posts() ) :
	$bloghash_posts->the_post();
	$count++; // Increment counter
	// Post items HTML markup.
	ob_start();
	?>
	<div class="<?php echo esc_attr( $bloghash_posts_per_page ); ?>">
		<div class="bloghash-post-item <?php echo $count === 2 ? 'style-1 end center slider-overlay-1' : 'style-3'; ?>">
			<div class="bloghash-post-thumb">
				<a href="<?php echo esc_url( bloghash_entry_get_permalink() ); ?>" tabindex="0"></a>
				<div class="inner"><?php the_post_thumbnail( get_the_ID(), 'full' ); ?></div>
			</div><!-- END .bloghash-post-thumb -->
			<div class="bloghash-post-content">
							
				<?php if ( isset( $bloghash_editors_choice_elements['category'] ) && $bloghash_editors_choice_elements['category'] ) { ?>
					<div class="post-category">
						<?php bloghash_entry_meta_category( ' ', false, apply_filters( 'bloghash_editors_choice_category_limit', 3 ) ); ?>
					</div>
				<?php } ?>

				<?php get_template_part( 'template-parts/entry/entry-header' ); ?>

				<?php if ( isset( $bloghash_editors_choice_elements['meta'] ) && $bloghash_editors_choice_elements['meta'] ) { ?>
					<div class="entry-meta">
						<div class="entry-meta-elements">
							<?php
							bloghash_entry_meta_author();

							bloghash_entry_meta_date(
								array(
									'show_modified'   => false,
									'published_label' => '',
								)
							);
							?>
						</div>
					</div><!-- END .entry-meta -->
				<?php } ?>

			</div><!-- END .bloghash-post-content -->			
		</div><!-- END .bloghash-post-item -->
	</div>
	<?php
	$bloghash_editors_choice_html .= ob_get_clean();
endwhile;

// Restore original Post Data.
wp_reset_postdata();

// Title.
$bloghash_editors_choice_title = bloghash_option( 'editors_choice_title' );

// Classes.
$bloghash_classes  = '';
$bloghash_classes .= bloghash_option( 'editors_choice_card_border' ) ? ' bloghash-card__boxed' : '';
$bloghash_classes .= bloghash_option( 'editors_choice_card_shadow' ) ? ' bloghash-card-shadow' : '';

?>

<div class="bloghash-editors-choice <?php echo esc_attr( $bloghash_classes ); ?>">
	<div class="bloghash-editors-choice-container bloghash-container">
		<div class="bloghash-flex-row g-0">
			<div class="col-xs-12">
				<div class="bloghash-card-items">
					<?php if ( $bloghash_editors_choice_title ) : ?>
					<div class="h4 widget-title">							
						<span><?php echo esc_html( $bloghash_editors_choice_title ); ?></span>
					</div>
					<?php endif; ?>
					<?php if ( $bloghash_editors_choice_html !== '' ) : ?>
					<div class="bloghash-flex-row gy-4">
						<?php echo wp_kses_post( $bloghash_editors_choice_html ); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- END .bloghash-card-items -->
	</div>
</div><!-- END .bloghash-editors-choice -->
