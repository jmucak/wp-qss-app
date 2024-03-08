<?php

use wpQssApp\core\Core;

define( 'INCLUDE_PATH', get_template_directory() . '/inc/' );
define( 'TEMPLATE_PATH', get_template_directory() . '/' );
define( 'INCLUDE_URL', get_template_directory_uri() );

if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	add_action( 'admin_notices', function () {
		?>
        <div class="notice notice-error">
            <h2>Missing <i>vendor/autoloader.php</i></h2>
            <p>
                <strong>
                    You are missing composer autoload. Please run <i>composer install</i> in root of your project.
                </strong>
            </p>
        </div>
		<?php
	} );

	return;
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/global-theme-functions.php';

// Load classes
$core = new Core();
$core->load();

//add_filter('script_loader_tag', 'add_module_type_to_scripts', 10, 2);

function add_module_type_to_scripts($tag, $handle) {
	// Specify the handles of scripts you want to include type="module"
	$module_scripts = array(
		'my_custom_script',
		// Add more script handles as needed
	);

	// Check if the current script handle is in the array of module scripts
	if (in_array($handle, $module_scripts)) {
		// Append type="module" to the script tag
		$tag = str_replace('<script', '<script type="module"', $tag);
	}

	return $tag;
}

//add_action('enqueue_block_editor_assets', function() {
//	wp_enqueue_script('awp-gutenberg-filters', get_template_directory_uri() . '/assets/js/gutenberg-filters.js', ['wp-edit-post']);
//});