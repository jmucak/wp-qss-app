<?php

namespace wpQssApp\api;

class TagsClient extends QSSApiClient {
	const URL = 'tags';

	public function find_by(): array {
		$url = self::URL . '?' . http_build_query( array(
				'orderBy'   => 'id',
				'direction' => 'ASC',
				'limit'     => 12,
				'page'      => 1,
			) );

		$response = $this->get( $url );

		// DO something

		return ! empty( $response['items'] ) ? $response['items'] : array();
	}

	public function add_book( array $data ): array {
		$response = $this->post( self::URL, $data );

		// DO something
		return array();
	}

	public function find_by_id( int $id ): array {
		$url = self::URL . '/' . $id;

		$response = $this->get( $url );

		// DO something

		return ! empty( $response['items'] ) ? $response['items'] : array();
	}

	public function update_book( int $id, array $data ): array {
		$url = self::URL . '/' . $id;

		$response = $this->put( $url, $data );

		// Do something

		return array();
	}

	public function delete_book( int $id ): array {
		$url = self::URL . '/' . $id;

		$response = $this->delete( $url );

		// Do something

		return array();
	}
}