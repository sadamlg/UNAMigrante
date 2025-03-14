<?php
/**
 * Popup Templates
 *
 * @package   PopupMaker
 * @copyright Copyright (c) 2024, Code Atlantic LLC
 */

$has_title = pum_get_popup_title() !== '';

?>
<div 
	id="pum-<?php pum_popup_ID(); ?>" 
	role="dialog" 
	aria-modal="false"
<?php if ( $has_title ) : ?>
	aria-labelledby="pum_popup_title_<?php pum_popup_ID(); ?>"
<?php endif; ?>
	class="<?php pum_popup_classes(); ?>" 
	<?php pum_popup_data_attr(); ?>
>

	<div id="popmake-<?php pum_popup_ID(); ?>" class="<?php pum_popup_classes( null, 'container' ); ?>">

		<?php do_action( 'pum_popup_before_title' ); ?>
		<?php do_action( 'popmake_popup_before_inner' ); // Backward compatibility. ?>

		<?php
		/**
		 * Render the title if not empty.
		 */
		?>
		<?php if ( $has_title ) : ?>
			<div id="pum_popup_title_<?php pum_popup_ID(); ?>" class="<?php pum_popup_classes( null, 'title' ); ?>">
				<?php pum_popup_title(); ?>
			</div>
		<?php endif; ?>

		<?php do_action( 'pum_popup_before_content' ); ?>

		<?php
		/**
		 * Render the content.
		 */
		?>
		<div class="<?php pum_popup_classes( null, 'content' ); ?>" <?php pum_popup_content_tabindex_attr(); ?>>
			<?php pum_popup_content(); ?>
		</div>

		<?php do_action( 'pum_popup_after_content' ); ?>
		<?php do_action( 'popmake_popup_after_inner' ); // Backward compatibility. ?>

		<?php
		/**
		 * Render the close button if needed.
		 */
		?>
		<?php if ( pum_show_close_button() ) : ?>
			<button type="button" class="<?php pum_popup_classes( null, 'close' ); ?>" aria-label="<?php esc_attr_e( 'Close', 'popup-maker' ); ?>">
			<?php pum_popup_close_text(); ?>
			</button>
		<?php endif; ?>

	</div>

</div>
