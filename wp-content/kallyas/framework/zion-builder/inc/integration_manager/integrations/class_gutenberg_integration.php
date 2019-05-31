<?php
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Class Znb_Polylang_Integration
 */
class Znb_Gutenberg_Integration extends Znb_Integration {
	/**
	 * Check if we can load this integration or not
	 * @return boolean If true, the integration will be loaded
	 */
	public static function can_load() {
		return function_exists( 'register_block_type' );
	}


	/**
	 * Main class init
	 *
	 * @return void
	 */
	public function initialize() {
		add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts' ) );
		add_action( 'admin_footer', [ $this, 'print_admin_js_template' ] );
	}


	/**
	 * Load Guttenberg integration script
	 *
	 * @return void
	 */
	public function load_scripts( $hook ) {
		if( $this->is_gutenberg_editor_open( $hook ) ) {
			wp_enqueue_script(
				'zionbuilder-gutenberg-integration',
				ZNB()->getFwUrl( 'dist/gutenberg_integration.bundle.js' ),
				array( 'wp-plugins', 'wp-edit-post', 'wp-i18n' ),
				ZNB()->version,
				true
			);

			wp_enqueue_style('zionbuilder-gutenberg-integration-style', ZNB()->getFwUrl( 'assets/css/page-edit.css' ), array(), ZNB()->version );
		}
	}

	public function print_admin_js_template(){
		?>
		<script id="zionbuilder-gutenberg-panel" type="text/html">
			<?php echo ZionPageBuilderAdmin::get_buttons_html(); ?>
		</script>
		<?php
	}

	public function is_gutenberg_editor_open( $hook ) {
		if( ( $hook == 'post-new.php' || $hook == 'post.php' ) && ! isset( $_GET[ 'classic-editor' ] ) ) {
			return true;
		}
		return false;
	}

}
