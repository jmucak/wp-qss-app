<?php

namespace wpQssApp\bundles;

class Bundle extends AssetBundle {
	public array $js;
	public array $css;

	public function __construct() {
		$this->set_js_data();
		$this->set_css_data();
	}

	public function set_js_data(): void {
		$this->js = array(
			'wpQssAppVendor' => array(
				'path'           => 'dist/vendor.js',
				'version'        => 1.1,
				'localize'       => array(
					'object' => 'frontend_rest_object',
					'data'   => array()
				),
				'timestamp_bust' => true
			),
			'wpQssAppBundle' => array(
				'path'           => 'dist/bundle.js',
				'version'        => 1.1,
				'timestamp_bust' => true
			),
		);
	}

	public function set_css_data(): void {
		$this->css = array(
			'perfectaDreamsWeb2022MainCSS' => array(
				'path'           => 'dist/style.css',
				'in_footer'      => false,
				'version'        => 1.1,
				'timestamp_bust' => true
			),
		);
	}

	public function get_localize_data() : array {
		return array(
			'rest_route' => get_rest_url(),
		);
	}
}