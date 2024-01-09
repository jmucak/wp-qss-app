<?php
if ( ! function_exists( 'get_partial' ) ) {
	function get_partial( string $path, array $data = array() ): void {
		$file_path = TEMPLATE_PATH . 'partials/' . $path . '.php';
		load_template( $file_path, true, $data );
	}
}