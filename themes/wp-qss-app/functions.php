<?php

use wpQssApp\core\Core;

define( 'TEMPLATE_PATH', get_template_directory() . '/' );

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