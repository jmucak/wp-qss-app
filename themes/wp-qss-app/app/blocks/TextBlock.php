<?php

namespace wpQssApp\blocks;

class TextBlock {
	public function get_settings(): array {
		return array(
			'name'            => 'text-block',
			'title'           => 'Text Block',
			'description'     => 'Text Block',
			'category'        => 'bornfight-blocks',
			'icon'            => null,
			'mode'            => 'edit',
			'keywords'        => array( 'text', 'messages' ),
			'post_types'      => array( 'page', 'post' ),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
				),
			),
			'render_callback' => array( $this, 'get_view' ),
		);
	}

	public function get_view( array $block ): void {
		get_partial( 'blocks/text', array(
			'block' => $block
		) );
	}
}