<?php

namespace wpQssApp\api;

class AuthorsClient extends QSSApiClient {
	const URL = 'authors';

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

	public function find_by_id( int $id ): array {
		$url = self::URL . '/' . $id;

		$response = $this->get( $url );

		// DO something

		return ! empty( $response['items'] ) ? $response['items'] : array();
	}

	public function add_author( array $data ): array {
		$response = $this->post( self::URL, $data );

		// DO something
		return array();
	}

	public function delete_author( int $id ): array {
		$url = self::URL . '/' . $id;

		$response = $this->delete( $url );

		// Do something

		return array();
	}

	public function edit_author( int $id, array $data ): array {
		$url = self::URL . '/' . $id;

		$response = $this->put( $url, $data );

		// Do something

		return array();
	}
}