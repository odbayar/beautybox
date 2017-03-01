<?php
/**
 * Front page Short Codes Section
 *
 * @package WordPress
 * @subpackage Shop Isle
 */

$shop_isle_shortcodes_hide = get_theme_mod( 'shop_isle_shortcodes_hide', true );
if ( ! empty( $shop_isle_shortcodes_hide ) && (bool) $shop_isle_shortcodes_hide === true ) {
	return;
}
$shop_isle_shortcodes_section = get_theme_mod( 'shop_isle_shortcodes_settings' );
$shop_isle_shortcodes_section_decoded = json_decode( $shop_isle_shortcodes_section );
if ( ! empty( $shop_isle_shortcodes_section ) && ( ! empty( $shop_isle_shortcodes_section_decoded[0]->text ) || ! empty( $shop_isle_shortcodes_section_decoded[0]->subtitle ) || ! empty( $shop_isle_shortcodes_section_decoded[0]->shortcode )) ) {
	foreach ( $shop_isle_shortcodes_section_decoded as $section ) {
		$pos = strlen( strstr( $section->shortcode,'pirate_forms' ) ); ?>
		<?php if ( function_exists( 'shop_isle_shortcode_top' ) ) {
			shop_isle_shortcode_top(); } ?>
		<section class="shortcodes" id="<?php if ( $pos > 0 ) { echo 'contact'; } else { if ( ! empty( $section->title ) ) { echo preg_replace( '/[^a-zA-Z0-9]/','', strtolower( $section->title ) ); }
}?>" role="region" aria-label="<?php esc_html_e( 'Shortcode','shop-isle' ); ?>">
			<?php if ( function_exists( 'shop_isle_shortcode_before' ) ) {
				shop_isle_shortcode_before(); } ?>
				<div class="container">
					<div class="row">

						<div class="col-sm-6 col-sm-offset-3">
							<?php
							if ( ! empty( $section->text ) ) {
								echo '<h2 class="module-title font-alt home-prod-title">' . esc_attr( $section->text ) . '</h2>';
							}

							if ( ! empty( $section->subtext ) ) {
								echo '<div class="module-subtitle font-serif home-prod-subtitle">' . esc_attr( $section->subtext ) . '</div>';
							} ?>
						</div>

					</div><!-- .row -->
					<div class="row">

						<?php
						if ( ! empty( $section->shortcode ) ) {
							$scd = html_entity_decode( $section->shortcode );
							echo do_shortcode( $scd );
						} ?>

					</div>

				</div>
			<?php if ( function_exists( 'shop_isle_shortcode_after' ) ) {
				shop_isle_shortcode_after(); } ?>
		</section>
		<?php if ( function_exists( 'shop_isle_shortcode_bottom' ) ) {
			shop_isle_shortcode_bottom(); } ?>
	<?php
	}
}

?>
