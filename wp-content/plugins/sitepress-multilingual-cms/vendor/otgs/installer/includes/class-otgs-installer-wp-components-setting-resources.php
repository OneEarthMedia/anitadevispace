<?php

class OTGS_Installer_WP_Components_Setting_Resources {

	/**
	 * @var WP_Installer
	 */
	private $installer;

	public function __construct( WP_Installer $installer ) {
		$this->installer = $installer;
	}

	public function add_hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_resources' ) );
	}

	public function enqueue_resources() {
		wp_enqueue_style( 'otgs-installer-tooltip', $this->installer->res_url() . '/res/css/tooltip/tooltip.css', array( 'wp-pointer' ), WP_INSTALLER_VERSION );
		wp_enqueue_script( 'otgs-installer-tooltip', $this->installer->res_url() . '/res/js/tooltip/tooltip.js', array(
			'wp-pointer',
			'jquery'
		), WP_INSTALLER_VERSION );
		wp_enqueue_script(
			'otgs-installer-components-save-setting',
			$this->installer->res_url() . '/res/js/save-components-setting.js',
			array(),
			WP_INSTALLER_VERSION
		);
	}
}