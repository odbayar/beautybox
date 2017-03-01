<?php
/**
 * Front page Services Section
 *
 * @package WordPress
 * @subpackage Shop Isle
 */

$shop_isle_services_hide = get_theme_mod( 'shop_isle_services_hide', true );
if ( ! empty( $shop_isle_services_hide ) && (bool) $shop_isle_services_hide === true ) {
	return;
}
$shop_isle_services_title = get_theme_mod( 'shop_isle_services_title', esc_html__( 'Our Services','shop-isle' ) );
$shop_isle_services_subtitle = get_theme_mod( 'shop_isle_services_subtitle' );

$shop_isle_pro_services_boxes = get_theme_mod('shop_isle_service_box',
	json_encode(
		array(
			array(
				'icon_value' => 'icon_gift',
				'text'       => esc_html__( 'Social icons', 'shop-isle' ),
				'subtext'    => esc_html__( 'Ideas and concepts', 'shop-isle' ),
				'link'       => esc_url( '#' ),
			),
			array(
				'icon_value' => 'icon_pin',
				'text'       => esc_html__( 'WooCommerce', 'shop-isle' ),
				'subtext'    => esc_html__( 'Top Rated Products', 'shop-isle' ),
				'link'       => esc_url( '#' ),
			),
			array(
				'icon_value' => 'icon_star',
				'text'       => esc_html__( 'Highly customizable', 'shop-isle' ),
				'subtext'    => esc_html__( 'Easy to use', 'shop-isle' ),
				'link'       => esc_url( '#' ),
			),
		)
	)
);

if ( ( ! empty( $shop_isle_services_title ) || ! empty( $shop_isle_services_subtitle ) ) ) {
	?>
	<section class="module-small services" id="services" role="region" aria-label="<?php esc_html_e( 'Our Services','shop-isle' ) ?>">
		<div class="section-overlay-layer">
			<div class="container">

				<?php

				if ( ! empty( $shop_isle_services_title ) || ! empty( $shop_isle_services_subtitle ) ) :
					echo '<div class="row">';
						echo '<div class="col-sm-6 col-sm-offset-3">';
					if ( ! empty( $shop_isle_services_title ) ) {
						echo '<h2 class="module-title font-alt home-prod-title">' . $shop_isle_services_title . '</h2>';
					} elseif ( is_customize_preview() ) {
						echo '<h2 class="module-title font-alt home-prod-title shop_isle_only_customizer"></h2>';
					}

					if ( ! empty( $shop_isle_services_subtitle ) ) {
						echo '<div class="module-subtitle font-serif home-prod-subtitle">' . $shop_isle_services_subtitle . '</div>';
					} elseif ( is_customize_preview() ) {
						echo '<div class="module-subtitle font-serif home-prod-subtitle shop_isle_only_customizer"></div>';
					}

						echo '</div>';
					echo '</div><!-- .row -->';
				endif;

				if ( ! empty( $shop_isle_pro_services_boxes ) ) {
					$shop_isle_pro_services_boxes_decoded = json_decode( $shop_isle_pro_services_boxes );

					echo '<div id="our_services_wrap" class="sip-services-wrap">';
					foreach ( $shop_isle_pro_services_boxes_decoded as $shop_isle_pro_service_box ) {

						if ( ( ! empty( $shop_isle_pro_service_box->icon_value ) && $shop_isle_pro_service_box->icon_value != 'No Icon') || ! empty( $shop_isle_pro_service_box->title ) || ! empty( $shop_isle_pro_service_box->text ) ) {

							echo '<div class="col-xs-12 col-sm-4 sip-service-box">';
								echo '<div class="sip-single-service">';

							if ( ! empty( $shop_isle_pro_service_box->link ) ) {
								if ( function_exists( 'icl_t' ) ) {
									$shop_isle_pro_service_link = icl_t( 'Service',$shop_isle_pro_service_box->id . '_services_link',$shop_isle_pro_service_box->link );
									if ( ! empty( $shop_isle_pro_service_link ) ) {
										echo '<a href="' . esc_url( $shop_isle_pro_service_link ) . '" class="sip-single-service-a">';
									}
								} else {
									echo '<a href="' . esc_url( $shop_isle_pro_service_box->link ) . '" class="sip-single-service-a">';
								}
							}

							if ( ! empty( $shop_isle_pro_service_box->icon_value ) ) {
								if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_pro_service_box->id ) ) {
									$shop_isle_pro_service_icon_value = icl_t( 'Service',$shop_isle_pro_service_box->id . '_services_icon_value',$shop_isle_pro_service_box->icon_value );

									echo '<span class="' . esc_attr( $shop_isle_pro_service_icon_value ) . ' sip-single-icon"></span>';

								} else {
									echo '<span class="' . esc_attr( $shop_isle_pro_service_box->icon_value ) . ' sip-single-icon"></span>';
								}
							}
							if ( ! empty( $shop_isle_pro_service_box->text ) || ! empty( $shop_isle_pro_service_box->subtext ) ) {

								echo '<div class="sip-single-service-text">';

								if ( ! empty( $shop_isle_pro_service_box->text ) ) {

									if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_pro_service_box->id ) ) {
										$shop_isle_pro_service_text = icl_t( 'Service',$shop_isle_pro_service_box->id . '_services_text',$shop_isle_pro_service_box->text );
										if ( ! empty( $shop_isle_pro_service_text ) ) {
											echo '<h3 class="">' . esc_attr( $shop_isle_pro_service_text ) . '</h3>';
										}
									} else {
										echo '<h3 class="">' . esc_attr( $shop_isle_pro_service_box->text ) . '</h3>';
									}
								}

								if ( ! empty( $shop_isle_pro_service_box->subtext ) ) {

									if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_pro_service_box->id ) ) {
										$shop_isle_pro_service_subtext = icl_t( 'Service',$shop_isle_pro_service_box->id . '_services_subtext',$shop_isle_pro_service_box->subtext );
										if ( ! empty( $shop_isle_pro_service_subtext ) ) {
											echo '<p class="">' . esc_attr( $shop_isle_pro_service_subtext ) . '</p>';
										}
									} else {
										echo '<p class="">' . esc_attr( $shop_isle_pro_service_box->subtext ) . '</p>';
									}
								}

								echo '</div>';
							}

							if ( ! empty( $shop_isle_pro_service_box->link ) ) {
								echo '</a>';
							}

							echo '</div></div>';
						}
					}
					echo '</div>';
				}
				?>
			</div>
		</div>
	</section>
	<?php
} else {
	if ( is_customize_preview() ) {
		?>
		<section class="services shop_isle_only_customizer" id="services" role="region" aria-label="<?php esc_html_e( 'Our Services','shop-isle' ) ?>">
			<div class="section-overlay-layer">
				<div class="container">
					<div class="section-header">
						<h2 class="dark-text shop_isle_only_customizer"></h2><div class="colored-line shop_isle_only_customizer"></div>
						<div class="sub-heading shop_isle_only_customizer"></div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
?>
