<?php

namespace wpQssApp\api;

use WP_Error;

class QSSApiClient {
	const BASE_URL = 'https://symfony-skeleton.q-tests.com/api/v2/';

	protected function get( string $url ): array|WP_Error {
		return $this->api_call( $url, array(
			'method' => 'GET',
		) );
	}

	protected function post( string $url, array $data = array() ): array|WP_Error {
		$args = array(
			'method' => 'POST',
		);

		if ( ! empty( $data ) ) {
			$args['body'] = wp_json_encode( $data );
		}

		return $this->api_call( $url, $args );
	}

	protected function delete( string $url ): array|WP_Error {
		return $this->api_call( $url, array(
			'method' => 'DELETE',
		) );
	}

	protected function put( string $url, array $data ): array|WP_Error {
		return $this->api_call( $url, array(
			'method' => 'PUT',
			'body'   => wp_json_encode( $data ),
		) );
	}

	private function api_call( string $url, array $data ): array|WP_Error {
		$args = array(
			'sslverify' => false,
			'headers'   => array(
				'Authorization' => 'Bearer ' . $_COOKIE['qss_token'],
				'Accept'        => 'application/json',
				'Content-Type'  => 'application/json',
			),
		);

		$args = array_merge( $data, $args );

		return wp_remote_request( self::BASE_URL . $url, $args );
	}
}