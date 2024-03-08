<?php

namespace wpQssApp\blocks;

class Blocks {
	public function init(): void {
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	public function register_blocks(): void {
		$blocks = array(
			TextBlock::class
		);

		foreach ( $blocks as $block ) {
			acf_register_block_type((new $block())->get_settings());
		}
	}
}