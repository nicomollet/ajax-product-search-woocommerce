<?php
/**
 * Ajax Product Search for WooCommerce - General Section Settings
 *
 * @version 1.0.4
 * @since   1.0.0
 * @author  Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_APS_Settings_General' ) ) {

	class Alg_WC_APS_Settings_General extends Alg_WC_APS_Settings_Section {

		const OPTION_ENABLE_PLUGIN = 'alg_wc_aps_enable';
		const OPTION_SELECT2_ENABLE = 'alg_wc_aps_select2_enable';
		const OPTION_METABOX_PRO   = 'alg_wc_aps_cmb_pro';

		protected $pro_version_url = 'https://wpcodefactory.com/item/ajax-product-search-woocommerce-algoritmika/';

		/**
		 * Constructor.
		 *
		 * @version 1.0.0
		 * @since   1.0.0
		 */
		function __construct( $handle_autoload = true ) {
			$this->id   = '';
			$this->desc = __( 'General', 'ajax-product-search-woocommerce' );
			parent::__construct( $handle_autoload );
		}

		/**
		 * get_settings.
		 *
		 * @version 1.0.4
		 * @since   1.0.0
		 */
		function get_settings( $settings = null ) {
			$new_settings = array(
				array(
					'title'    => __( 'General Options', 'ajax-product-search-woocommerce' ),
					'type'     => 'title',
					'id'       => 'alg_wc_aps_opt',
				),
				array(
					'title'          => 'Pro version',
					'enable'         => !class_exists('Alg_WC_APS_Pro_Core'),
					'type'           => 'wccso_metabox',
					'accordion'      => array(
						'title' => __( 'Take a look on some of its features:', 'ajax-product-search-woocommerce' ),
						'items' => array(
							array(
								'trigger' => __( 'Display product thumbnail, price and categories on search results', 'ajax-product-search-woocommerce'),
								'img_src' => plugin_dir_url( __FILE__ ) . '../../assets/dist/images/autocomplete.png',
							),
							array(
								'trigger'     => __( 'Option to select multiple results', 'ajax-product-search-woocommerce' ),
								'img_src'     => plugin_dir_url( __FILE__ ) . '../../assets/dist/images/multiple-selection.png',
							),
							array(
								'trigger' => __( 'Choose if you want to redirect on search result selection', 'ajax-product-search-woocommerce' ),
							),
							array(
								'trigger' => __( 'Support', 'ajax-product-search-woocommerce' ),
							),

						),
					),
					'call_to_action' => array(
						'href'  => $this->pro_version_url,
						'label' => 'Upgrade to Pro version now',
					),
					'description'    => __( 'Do you like the free version of this plugin? Imagine what the Pro version can do for you!', 'ajax-product-search-woocommerce' ) . '<br />' . sprintf( __( 'Check it out <a target="_blank" href="%1$s">here</a> or on this link: <a target="_blank" href="%1$s">%1$s</a>', 'ajax-product-search-woocommerce' ), esc_url( $this->pro_version_url ) ),
					'id'             => self::OPTION_METABOX_PRO,
				),
				array(
					'title'    => __( 'Enable Plugin', 'ajax-product-search-woocommerce' ),
					'desc'     => __( 'Enable "Ajax Product Search for WooCommerce" plugin', 'ajax-product-search-woocommerce' ),
					'id'       => self::OPTION_ENABLE_PLUGIN,
					'default'  => 'yes',
					'type'     => 'checkbox',
				),
				array(
					'title'    => __( 'Load Select2', 'ajax-product-search-woocommerce' ),
					'desc'     => sprintf( __( 'Loads most recent version of <a target="_blank" href="%s">Select2</a>', 'ajax-product-search-woocommerce' ), 'https://select2.github.io/' ),
					'desc_tip' => __( 'Mark this only if you are not loading Select2 nowhere else. Select2 is responsible for improving the html select element.', 'ajax-product-search-woocommerce' ).'<br />'.__( 'It is required for this plugin to work. If you are uncertain, please let it enabled.', 'ajax-product-search-woocommerce' ),
					'id'       => self::OPTION_SELECT2_ENABLE,
					'default'  => 'yes',
					'type'     => 'checkbox',
				),
				array(
					'type'     => 'sectionend',
					'id'       => 'alg_wc_aps_opt',
				),
			);

			return parent::get_settings( array_merge( $settings, $new_settings ) );
		}
	}
}